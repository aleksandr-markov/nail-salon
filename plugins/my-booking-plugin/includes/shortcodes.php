<?php
if (! defined('ABSPATH')) exit;

add_shortcode('my_booking_form', function () {

    $saved_slots = get_option('my_booking_time_slots', '09:00, 10:30, 12:00, 14:00, 15:30, 17:00');
    $slots_array = array_map('trim', explode(',', $saved_slots));

    // Use the URL and PATH constants from the main file 
    wp_enqueue_style('my-booking-css', MCB_PLUGIN_URL . 'assets/styles/main.css', array(), '2.1');
    wp_enqueue_script('my-booking-js', MCB_PLUGIN_URL . 'assets/scripts/BookingForm.js', array(), '2.1', true);

    wp_localize_script('my-booking-js', 'wpApiSettings', array(
        'root' => esc_url_raw(rest_url()),
        'daysOff' => get_option('my_booking_days_off', array()),
        'timeSlots' => $slots_array // Новое свойство, которое мы забираем в TimeSlots.js

    ));

    add_filter('script_loader_tag', function ($tag, $handle, $src) {
        if ('my-booking-js' !== $handle) {
            return $tag;
        }
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }, 10, 3);

    $services_posts = get_posts(array(
        'post_type' => 'booking_service',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));

    $args = array('services' => $services_posts);

    ob_start();
    include MCB_PLUGIN_DIR . 'templates/booking-form-tpl.php';
    return ob_get_clean();
});
