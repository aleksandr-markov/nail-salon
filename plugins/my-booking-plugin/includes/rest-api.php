<?php
if (! defined('ABSPATH')) exit;

add_action('rest_api_init', function () {
    register_rest_route('mybooking/v1', '/get-occupied-slots/', array('methods' => 'GET', 'callback' => 'my_booking_get_slots', 'permission_callback' => '__return_true'));
    register_rest_route('mybooking/v1', '/create-booking/', array('methods' => 'POST', 'callback' => 'my_booking_create', 'permission_callback' => '__return_true'));
});

function my_booking_get_slots($request)
{
    $date = sanitize_text_field($request->get_param('date'));
    $bookings = get_posts(array('post_type' => 'booking', 'post_status' => 'publish', 'posts_per_page' => -1, 'meta_query' => array(array('key' => '_booking_date', 'value' => $date))));
    $occupied = array();
    foreach ($bookings as $b) {
        $occupied[] = get_post_meta($b->ID, '_booking_time', true);
    }
    return rest_ensure_response($occupied);
}

function my_booking_create($request)
{
    $name = sanitize_text_field($request->get_param('client_name'));
    $phone = sanitize_text_field($request->get_param('client_phone'));
    $date = sanitize_text_field($request->get_param('booking_date'));
    $time = sanitize_text_field($request->get_param('booking_time'));
    $service = sanitize_text_field($request->get_param('booking_service'));

    if (empty($name) || empty($phone) || empty($date) || empty($time) || empty($service)) {
        return new WP_Error('error', 'Заповніть усі поля', array('status' => 400));
    }

    $existing_bookings = get_posts(array(
        'post_type'   => 'booking',
        'post_status' => 'publish',
        'numberposts' => 1,
        'meta_query'  => array(
            'relation' => 'AND',
            array(
                'key'     => '_booking_date',
                'value'   => $date,
                'compare' => '='
            ),
            array(
                'key'     => '_booking_time',
                'value'   => $time,
                'compare' => '='
            ),
        )
    ));

    if (!empty($existing_bookings)) {
        return new WP_Error('booking_conflict', 'Цей час уже зайнятий. Будь ласка, оберіть інший.', array('status' => 409));
    }

    $id = wp_insert_post(array(
        'post_title'  => $name . ' — ' . get_the_title($service),
        'post_type'   => 'booking',
        'post_status' => 'publish'
    ));

    if (is_wp_error($id)) {
        return new WP_Error('server_error', 'Не вдалося зберегти запис', array('status' => 500));
    }

    update_post_meta($id, '_booking_service', $service);
    update_post_meta($id, '_booking_phone', $phone);
    update_post_meta($id, '_booking_date', $date);
    update_post_meta($id, '_booking_time', $time);

    $service_title = get_the_title($service);

    my_booking_add_to_google_calendar($name, $phone, $date, $time, $service_title);

    return rest_ensure_response(array('success' => true, 'message' => 'Ваш запис успішно створено!'));
}
