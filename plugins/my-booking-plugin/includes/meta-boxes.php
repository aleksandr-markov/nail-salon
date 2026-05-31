<?php
if (! defined('ABSPATH')) exit;

add_action('add_meta_boxes', function () {
    add_meta_box('service_details', 'Деталі послуги', 'my_booking_service_fields_html', 'booking_service', 'normal', 'high');
});

function my_booking_service_fields_html($post)
{
    $time  = get_post_meta($post->ID, '_service_time', true);
    $price = get_post_meta($post->ID, '_service_price', true);
    $badge = get_post_meta($post->ID, '_service_badge', true);
?>
    <p>
        <label style="display:block; margin-bottom:5px; font-weight:bold;">Тривалість (наприклад: 45 хв):</label>
        <input type="text" name="service_time" value="<?php echo esc_attr($time); ?>" class="widefat">
    </p>
    <p>
        <label style="display:block; margin-bottom:5px; font-weight:bold;">Ціна (наприклад: 400 ₴):</label>
        <input type="text" name="service_price" value="<?php echo esc_attr($price); ?>" class="widefat">
    </p>
    <p>
        <label style="display:block; margin-bottom:5px; font-weight:bold;">Бейдж (наприклад: Хіт, -10%):</label>
        <input type="text" name="service_badge" value="<?php echo esc_attr($badge); ?>" class="widefat">
    </p>
<?php
}

add_action('save_post_booking_service', function ($post_id) {
    if (isset($_POST['service_time']))
        update_post_meta($post_id, '_service_time', sanitize_text_field($_POST['service_time']));
    if (isset($_POST['service_price']))
        update_post_meta($post_id, '_service_price', sanitize_text_field($_POST['service_price']));
    if (isset($_POST['service_badge']))
        update_post_meta($post_id, '_service_badge', sanitize_text_field($_POST['service_badge']));
});
