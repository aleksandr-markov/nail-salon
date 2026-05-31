<!-- templates/booking-form-tpl.php -->
<div class="booking-wizard-card">

    <div class="wizard-step active" id="step1">
        <h2 class="wizard-title">Оберіть послугу</h2>
        <div class="wizard-promo">🎁 -15% для першого візиту</div>

        <div class="services-grid">
            <?php foreach ($args['services'] as $service): ?>
                <?php
                $time = get_post_meta($service->ID, '_service_time', true);
                $price = get_post_meta($service->ID, '_service_price', true);
                $badge = get_post_meta($service->ID, '_service_badge', true);
                ?>
                <div class="service-card" data-slug="<?php echo esc_attr($service->ID); ?>">
                    <div class="service-title">
                        <?php echo esc_html($service->post_title); ?>
                        <?php if ($badge): ?>
                            <span class="service-badge"><?php echo esc_html($badge); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="service-meta">
                        <span class="service-time"><?php echo esc_html($time); ?></span>
                        <span class="service-price"><?php echo esc_html($price); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="button" class="wizard-next-btn" id="toStep2" disabled>Далі</button>
    </div>

    <div class="wizard-step" id="step2">
        <h2 class="wizard-title">Оберіть дату та час</h2>

        <div class="custom-calendar">
            <div class="calendar-header">
                <button type="button" id="prevMonthBtn" class="calendar-nav-btn">&larr;</button>
                <h3 id="calendarMonthTitle" class="calendar-month-title">Май 2026</h3>
                <button type="button" id="nextMonthBtn" class="calendar-nav-btn">&rarr;</button>
            </div>
            <div class="calendar-weekdays">
                <div>Пн</div>
                <div>Вт</div>
                <div>Ср</div>
                <div>Чт</div>
                <div>Пт</div>
                <div>Сб</div>
                <div>Вн</div>
            </div>
            <div id="calendarDaysGrid" class="calendar-days-grid"></div>
        </div>

        <div class="slots-wrapper" id="slotsWrapper" style="display:none;">
            <div class="slots-grid" id="slotsGrid"></div>
        </div>

        <div class="wizard-nav-buttons">
            <button type="button" class="wizard-back-btn" data-to="1">Назад</button>
            <button type="button" class="wizard-next-btn" id="toStep3" disabled>Далі</button>
        </div>
    </div>

    <div class="wizard-step" id="step3">
        <h2 class="wizard-title">Ваші контакти</h2>
        <form id="bookingForm">
            <div class="form-group">
                <input type="text" id="client_name" placeholder="Ваше ім'я" required>
            </div>
            <div class="form-group">
                <input type="tel" id="client_phone" placeholder="Телефон" required>
            </div>
            <div class="wizard-nav-buttons">
                <button type="button" class="wizard-back-btn" data-to="2">Назад</button>
                <button type="submit" class="wizard-submit-btn">Підтвердити запис</button>
            </div>
        </form>
    </div>

    <input type="hidden" id="booking_date">
    <input type="hidden" id="booking_service">
    <input type="hidden" id="booking_time">
    <div id="bookingMessage" class="booking-message"></div>
</div>