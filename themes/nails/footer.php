<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nails
 */

?>

	<!-- Contact / Visit -->
<section class="py-20 md:py-24 px-5 md:px-8">
    <div class="max-w-[1400px] mx-auto grid md:grid-cols-2 gap-12 items-start">
        <div>
            <div class="text-xs tracking-[0.25em] uppercase text-wine mb-4">
                — Контакти
            </div>
            <h2 class="display text-4xl md:text-5xl mb-8">Завітайте до нас</h2>

            <div class="space-y-6">
                <div>
                    <div class="text-xs uppercase tracking-wider text-soft mb-2">
                        Адреса
                    </div>
                    <p class="text-lg">вул. Хрещатик 22, оф. 5<br />Київ, 01001</p>
                    <a href="#" class="btn-ghost mt-2">Прокласти маршрут →</a>
                </div>

                <div>
                    <div class="text-xs uppercase tracking-wider text-soft mb-2">
                        Графік
                    </div>
                    <div class="grid grid-cols-2 gap-1 max-w-xs">
                        <span>Пн — Пт</span><span class="text-right">10:00 — 20:00</span>
                        <span>Субота</span><span class="text-right">10:00 — 18:00</span>
                        <span class="text-soft">Неділя</span><span class="text-right text-soft">вихідний</span>
                    </div>
                </div>

                <div>
                    <div class="text-xs uppercase tracking-wider text-soft mb-2">
                        Зв'язок
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="tel:+380000000000" class="btn-secondary"
                            style="padding: 0.7rem 1.2rem; font-size: 0.85rem">📞 Телефон</a>
                        <a href="https://t.me/" class="btn-secondary"
                            style="padding: 0.7rem 1.2rem; font-size: 0.85rem">✈ Telegram</a>
                        <a href="https://wa.me/" class="btn-secondary"
                            style="padding: 0.7rem 1.2rem; font-size: 0.85rem">📱 WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="aspect-square md:aspect-auto md:h-full md:min-h-[450px] rounded-3xl bg-soft relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center">
                    <div class="text-5xl mb-3">📍</div>
                    <p class="display text-3xl mb-2">Київ, Хрещатик</p>
                    <!-- <p class="text-soft text-sm">Тут буде Google Maps</p> -->
                </div>
            </div>
        </div>
    </div>
</section>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
