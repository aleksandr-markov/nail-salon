<?php
if (! defined('ABSPATH')) exit;

// Columns
add_filter('manage_booking_posts_columns', function ($columns) {
    unset($columns['date']);
    $columns['booking_service'] = 'Послуга';
    $columns['booking_phone'] = 'Телефон';
    $columns['booking_date'] = 'Дата візиту';
    $columns['booking_time'] = 'Час';
    return $columns;
});

add_action('manage_booking_posts_custom_column', function ($column, $post_id) {
    if ($column === 'booking_service') {
        $service_id = get_post_meta($post_id, '_booking_service', true);
        echo esc_html($service_id ? get_the_title($service_id) : '—');
    } else {
        echo esc_html(get_post_meta($post_id, '_' . $column, true));
    }
}, 10, 2);

// Filters
add_action('restrict_manage_posts', function ($post_type) {
    if ('booking' !== $post_type) return;

    $services = get_posts(array('post_type' => 'booking_service', 'posts_per_page' => -1));
    $current = isset($_GET['filter_service']) ? $_GET['filter_service'] : '';

    echo '<select name="filter_service"><option value="">Всі послуги</option>';
    foreach ($services as $s) {
        printf('<option value="%d" %s>%s</option>', $s->ID, selected($current, $s->ID, false), $s->post_title);
    }
    echo '</select>';
});

add_filter('parse_query', function ($query) {
    global $pagenow;
    if (is_admin() && $pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'booking' && isset($_GET['filter_service']) && !empty($_GET['filter_service'])) {
        $query->query_vars['meta_query'] = array(array('key' => '_booking_service', 'value' => sanitize_text_field($_GET['filter_service'])));
    }
});

// Settings page
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=booking',
        'Налаштування графіка',
        'Налаштування',
        'manage_options',
        'booking-settings',
        'my_booking_settings_html'
    );
});

function my_booking_settings_html()
{
    $days_off = get_option('my_booking_days_off', array());
    $time_slots = get_option('my_booking_time_slots', '09:00, 10:30, 12:00, 14:00, 15:30, 17:00');

    if (isset($_POST['my_booking_save_settings'])) {
        check_admin_referer('my_booking_settings_nonce');

        $days_off = isset($_POST['days_off']) ? array_map('intval', $_POST['days_off']) : array();
        update_option('my_booking_days_off', $days_off);

        $time_slots = isset($_POST['my_booking_time_slots']) ? sanitize_text_field($_POST['my_booking_time_slots']) : '';
        update_option('my_booking_time_slots', $time_slots);

        echo '<div class="updated"><p>Налаштування збережено!</p></div>';
    }

    $weekdays = array(
        1 => 'Понеділок',
        2 => 'Вівторок',
        3 => 'Середа',
        4 => 'Четвер',
        5 => 'П' . "''" . 'ятниця',
        6 => 'Субота',
        0 => 'Неділя'
    );
?>
    <div class="wrap">
        <h1>Налаштування робочого графіка</h1>
        <form method="post" style="background:#fff; padding:20px; margin-top:20px; max-width:600px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.1);">
            <?php wp_nonce_field('my_booking_settings_nonce'); ?>

            <h2>Постійні вихідні дні</h2>
            <table class="form-table">
                <?php foreach ($weekdays as $index => $name): ?>
                    <tr>
                        <th scope="row" style="width: 35%;"><?php echo esc_html($name); ?></th>
                        <td>
                            <input type="checkbox" name="days_off[]" value="<?php echo $index; ?>" <?php checked(in_array($index, $days_off)); ?>>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <hr style="border:0; border-top:1px solid #eee; margin:20px 0;">

            <h2>Доступні тайм-слоти</h2>
            <table class="form-table">
                <tr>
                    <th scope="row" style="width: 35%;"><label for="my_booking_time_slots">Час сеансів</label></th>
                    <td>
                        <input type="text" id="my_booking_time_slots" name="my_booking_time_slots" value="<?php echo esc_attr($time_slots); ?>" class="large-text" placeholder="09:00, 10:30, 12:00" style="width:100%;">
                        <p class="description" style="margin-top:5px;">Укажіть час через кому. Наприклад: <code>09:00, 11:00, 13:30</code></p>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="my_booking_save_settings" class="button button-primary" value="Зберегти зміни">
            </p>
        </form>
    </div>
<?php
}
