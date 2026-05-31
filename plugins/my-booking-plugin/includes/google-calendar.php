<?php
if (! defined('ABSPATH')) exit;

function my_booking_add_to_google_calendar($name, $phone, $date, $time, $service_title)
{
    error_log("=== TEST: We are trying to send a reservation to Google for $name ===");

    $key_file = MCB_PLUGIN_DIR . 'google-credentials.json';
    if (!file_exists($key_file)) {
        error_log("ERROR: File google-credentials.json not found along the path: " . $key_file);
        return false;
    }

    $config = json_decode(file_get_contents($key_file), true);
    $service_account_email = $config['client_email'];
    $private_key = $config['private_key'];

    $header = base64UrlEncode(json_encode(['alg' => 'RS256', 'typ' => 'JWT']));
    $time_now = time();
    $payload = base64UrlEncode(json_encode([
        'iss' => $service_account_email,
        'scope' => 'https://www.googleapis.com/auth/calendar.events',
        'aud' => 'https://oauth2.googleapis.com/token',
        'exp' => $time_now + 3600,
        'iat' => $time_now
    ]));

    $signature = '';
    openssl_sign("$header.$payload", $signature, $private_key, 'SHA256');
    $signed_jwt = "$header.$payload." . base64UrlEncode($signature);

    $response = wp_remote_post('https://oauth2.googleapis.com/token', array(
        'body' => array(
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $signed_jwt
        )
    ));

    if (is_wp_error($response)) return false;
    $auth_data = json_decode(wp_remote_retrieve_body($response), true);
    $access_token = isset($auth_data['access_token']) ? $auth_data['access_token'] : false;

    if (!$access_token) return false;


    $start_datetime = date('Y-m-d\TH:i:s', strtotime("$date $time"));
    $end_datetime = date('Y-m-d\TH:i:s', strtotime("$date $time +1 hour"));
    $timezone = 'Europe/Kyiv';

    $event_data = array(
        'summary' => "Запис: $name — $service_title",
        'description' => "Telephone: $phone\nПослуга: $service_title",
        'start' => array('dateTime' => $start_datetime, 'timeZone' => $timezone),
        'end' => array('dateTime' => $end_datetime, 'timeZone' => $timezone),
    );

    $calendar_id = 'email@gmail.com';

    $response = wp_remote_post("https://www.googleapis.com/calendar/v3/calendars/$calendar_id/events", array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode($event_data)
    ));

    if (is_wp_error($response)) {
        error_log("System error WP_Error: " . $response->get_error_message());
        return false;
    }

    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);

    error_log("Google API Response Code: " . $response_code);

    if ($response_code !== 200 && $response_code !== 201) {
        error_log("Error from Google API: " . $response_body);
        return false;
    }

    error_log("The event has been successfully created in Google Calendar.");
    return true;
}

function base64UrlEncode($data)
{
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
}
