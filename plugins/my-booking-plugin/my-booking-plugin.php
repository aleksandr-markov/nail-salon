<?php

/**
 * Plugin Name: My Custom Booking Plugin
 * Description: Полностью динамическое бронирование: кастомные услуги + записи (Модульная версия).
 * Version: 2.0
 * Author: Your Name
 */

if (! defined('ABSPATH')) {
    exit;
}

define('MCB_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MCB_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once MCB_PLUGIN_DIR . 'includes/post-types.php';

require_once MCB_PLUGIN_DIR . 'includes/meta-boxes.php';

require_once MCB_PLUGIN_DIR . 'includes/shortcodes.php';

require_once MCB_PLUGIN_DIR . 'includes/admin-modifications.php';

require_once MCB_PLUGIN_DIR . 'includes/rest-api.php';

require_once MCB_PLUGIN_DIR . 'includes/google-calendar.php';
