<?php
if (! defined('ABSPATH')) exit;

add_action('init', function () {
    register_post_type('booking_service', array(
        'labels' => array('name' => 'Послуги', 'singular_name' => 'Послуга', 'add_new' => 'Додати послугу'),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-scissors',
        'supports' => array('title'),
    ));

    register_post_type('booking', array(
        'labels' => array('name' => 'Бронирования', 'singular_name' => 'Бронирование'),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title'),
    ));
});
