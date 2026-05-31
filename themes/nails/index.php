<?php
/*
Template Name: Шаблон Лендинга
*/
get_header();
?>

<!-- Hero -->
<section class="relative overflow-hidden pt-12 md:pt-20 pb-20 md:pb-28 px-5 md:px-8">
    <div class="blob" style="background: var(--rose); width: 500px; height: 500px; top: -100px; right: -100px;"></div>
    <div class="blob" style="background: var(--wine); width: 400px; height: 400px; bottom: -150px; left: -100px; opacity: 0.1;"></div>

    <div class="max-w-[1400px] mx-auto relative">
        <div class="grid md:grid-cols-2 gap-10 md:gap-16 items-center">
            <div>
                <div class="pill rise rise-1 mb-6">
                    <span class="pill-dot"></span>
                    <span>Студія манікюру у Києві</span>
                </div>
                <h1 class="display hero-h1 text-6xl md:text-7xl lg:text-[5.5rem] mb-6 rise rise-2">
                    Бездоганний манікюр.<br>
                    <span class="display-italic text-wine">Без поспіху.</span>
                </h1>
                <p class="text-lg md:text-xl text-soft mb-8 max-w-lg leading-relaxed rise rise-3">
                    Авторська студія в центрі міста. Один клієнт за раз, безпечні матеріали, гель-лак що тримається <strong class="text-ink">3-4 тижні</strong>.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 mb-10 rise rise-4">
                    <a href="#zapys" class="btn-primary">
                        Записатись онлайн
                        <span>→</span>
                    </a>
                    <a href="#roboty" class="btn-secondary">Дивитись роботи</a>
                </div>

                <!-- Trust row -->
                <div class="flex flex-wrap items-center gap-x-8 gap-y-3 rise rise-5">
                    <div class="flex items-center gap-2">
                        <div class="flex text-base star">★★★★★</div>
                        <span class="text-sm"><strong>4.9</strong> · 287 відгуків</span>
                    </div>
                    <div class="w-px h-5 bg-soft hidden sm:block" style="background: var(--border);"></div>
                    <div class="text-sm text-soft">
                        <strong class="text-ink">2 400+</strong> задоволених клієнтів
                    </div>
                    <div class="w-px h-5 hidden sm:block" style="background: var(--border);"></div>
                    <div class="text-sm text-soft">
                        <strong class="text-ink">6 років</strong> досвіду
                    </div>
                </div>
            </div>

            <!-- Hero image -->
            <div class="relative rise rise-3">
                <div class="aspect-[4/5] rounded-3xl overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?w=900&q=80&auto=format&fit=crop" alt="Манікюр" class="w-full h-full object-cover">
                </div>
                <!-- Floating card -->
                <div class="absolute -bottom-6 -left-4 md:-left-8 bg-white rounded-2xl p-4 md:p-5 shadow-xl max-w-[240px]">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-2xl">🌿</span>
                        <span class="font-semibold text-sm">10-free лаки</span>
                    </div>
                    <p class="text-xs text-soft leading-relaxed">Без формальдегіду, толуолу та інших шкідливих речовин</p>
                </div>
                <div class="absolute -top-4 -right-4 md:-right-6 bg-rose-soft rounded-2xl p-4 shadow-lg max-w-[200px]">
                    <div class="text-2xl mb-1">✓</div>
                    <p class="text-xs leading-snug"><strong>Стерилізація</strong><br>інструментів після кожного клієнта</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Logos / Trust marquee -->
<section class="border-y bg-soft py-5 overflow-hidden" style="border-color: var(--border)">
    <div class="marquee flex gap-12 whitespace-nowrap text-soft text-sm">
        <span>✦ Сертифікований майстер</span>
        <span>✦ Європейські матеріали OPI · CND · Kodi</span>
        <span>✦ Sterilizers Class B</span>
        <span>✦ Знижка −15% першим клієнтам</span>
        <span>✦ Подарункові сертифікати</span>
        <span>✦ Сертифікований майстер</span>
        <span>✦ Європейські матеріали OPI · CND · Kodi</span>
        <span>✦ Sterilizers Class B</span>
        <span>✦ Знижка −15% першим клієнтам</span>
        <span>✦ Подарункові сертифікати</span>
    </div>
</section>

<!-- Why us -->
<section class="py-20 md:py-28 px-5 md:px-8">
    <div class="max-w-[1400px] mx-auto">
        <div class="text-center mb-14">
            <div class="text-xs tracking-[0.25em] uppercase text-wine mb-4">
                — Чому BLOOM
            </div>
            <h2 class="display text-4xl md:text-6xl mb-4">
                Не просто <span class="display-italic text-wine">манікюр</span> —
                досвід
            </h2>
            <p class="text-soft max-w-xl mx-auto">
                Те, заради чого до нас повертаються знову і знову.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-5">
            <div class="card">
                <div class="w-12 h-12 rounded-full bg-rose-soft flex items-center justify-center text-xl mb-5">
                    ⏱
                </div>
                <h3 class="display text-2xl mb-3">Один клієнт за раз</h3>
                <p class="text-soft leading-relaxed text-sm">
                    Ви приходите — і весь час майстер тільки для вас. Без черг, без
                    поспіху, без «поряд гудить ще одна процедура».
                </p>
            </div>
            <div class="card">
                <div class="w-12 h-12 rounded-full bg-rose-soft flex items-center justify-center text-xl mb-5">
                    ✨
                </div>
                <h3 class="display text-2xl mb-3">Тримається до 4 тижнів</h3>
                <p class="text-soft leading-relaxed text-sm">
                    Якісна підготовка пластини + преміум гель-лаки = покриття без
                    сколювань 21-28 днів. Гарантовано.
                </p>
            </div>
            <div class="card">
                <div class="w-12 h-12 rounded-full bg-rose-soft flex items-center justify-center text-xl mb-5">
                    🛡
                </div>
                <h3 class="display text-2xl mb-3">Безпека на першому місці</h3>
                <p class="text-soft leading-relaxed text-sm">
                    Стерилізатор сухожаровий, одноразові пилки, перчатки, маски.
                    Стандарт медичного кабінету.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section id="poslugy" class="py-20 md:py-28 px-5 md:px-8 bg-soft">
    <div class="max-w-[1400px] mx-auto">
        <div class="flex flex-col md:flex-row justify-between md:items-end mb-12 gap-4">
            <div>
                <div class="text-xs tracking-[0.25em] uppercase text-wine mb-4">
                    — Послуги та ціни
                </div>
                <h2 class="display text-5xl md:text-7xl">
                    Прозоро.
                    <span class="display-italic text-wine">Без сюрпризів.</span>
                </h2>
            </div>
            <p class="text-soft text-sm max-w-xs">
                Ціни вказані в гривнях. Включено усі матеріали та зняття
                попереднього покриття.
            </p>
        </div>

        <div class="bg-white rounded-3xl p-6 md:p-10">
            <div class="space-y-0">
                <div class="service-row grid grid-cols-12 gap-3 md:gap-4 py-5 items-center">
                    <div class="col-span-12 md:col-span-6">
                        <div class="display text-xl md:text-2xl mb-1">
                            Класичний манікюр
                        </div>
                        <div class="text-xs text-soft">
                            Зняття · кутикула · форма · полірування · крем
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 text-soft text-sm">
                        45 хв
                    </div>
                    <div class="col-span-4 md:col-span-2 display text-xl text-right md:text-left">
                        400 ₴
                    </div>
                    <div class="col-span-4 md:col-span-2 text-right">
                        <a href="#zapys" class="btn-ghost">Записатись →</a>
                    </div>
                </div>

                <div class="service-row grid grid-cols-12 gap-3 md:gap-4 py-5 items-center">
                    <div class="col-span-12 md:col-span-6">
                        <div class="display text-xl md:text-2xl mb-1">
                            Манікюр + гель-лак
                            <span class="pill" style="padding: 0.2rem 0.6rem; font-size: 0.65rem">Хіт</span>
                        </div>
                        <div class="text-xs text-soft">
                            Класична обробка з покриттям, тримається 3-4 тижні
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 text-soft text-sm">
                        75 хв
                    </div>
                    <div class="col-span-4 md:col-span-2 display text-xl text-right md:text-left">
                        700 ₴
                    </div>
                    <div class="col-span-4 md:col-span-2 text-right">
                        <a href="#zapys" class="btn-ghost">Записатись →</a>
                    </div>
                </div>

                <div class="service-row grid grid-cols-12 gap-3 md:gap-4 py-5 items-center">
                    <div class="col-span-12 md:col-span-6">
                        <div class="display text-xl md:text-2xl mb-1">
                            Педикюр класичний
                        </div>
                        <div class="text-xs text-soft">
                            Ванночка · оброблення стопи · форма · полірування
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 text-soft text-sm">
                        60 хв
                    </div>
                    <div class="col-span-4 md:col-span-2 display text-xl text-right md:text-left">
                        750 ₴
                    </div>
                    <div class="col-span-4 md:col-span-2 text-right">
                        <a href="#zapys" class="btn-ghost">Записатись →</a>
                    </div>
                </div>

                <div class="service-row grid grid-cols-12 gap-3 md:gap-4 py-5 items-center">
                    <div class="col-span-12 md:col-span-6">
                        <div class="display text-xl md:text-2xl mb-1">
                            Педикюр + гель-лак
                        </div>
                        <div class="text-xs text-soft">
                            Повноцінний спа-педикюр із гель-покриттям
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 text-soft text-sm">
                        90 хв
                    </div>
                    <div class="col-span-4 md:col-span-2 display text-xl text-right md:text-left">
                        1 100 ₴
                    </div>
                    <div class="col-span-4 md:col-span-2 text-right">
                        <a href="#zapys" class="btn-ghost">Записатись →</a>
                    </div>
                </div>

                <div class="service-row grid grid-cols-12 gap-3 md:gap-4 py-5 items-center">
                    <div class="col-span-12 md:col-span-6">
                        <div class="display text-xl md:text-2xl mb-1">
                            Нарощування нігтів
                        </div>
                        <div class="text-xs text-soft">
                            Гель або акрил · будь-яка форма · корекція кожні 3-4 тижні
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 text-soft text-sm">
                        120 хв
                    </div>
                    <div class="col-span-4 md:col-span-2 display text-xl text-right md:text-left">
                        1 300 ₴
                    </div>
                    <div class="col-span-4 md:col-span-2 text-right">
                        <a href="#zapys" class="btn-ghost">Записатись →</a>
                    </div>
                </div>

                <div class="service-row grid grid-cols-12 gap-3 md:gap-4 py-5 items-center">
                    <div class="col-span-12 md:col-span-6">
                        <div class="display text-xl md:text-2xl mb-1">
                            Дизайн / нейл-арт
                        </div>
                        <div class="text-xs text-soft">
                            Малюнки, стрази, втирки, фольга — за нігтиком
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 text-soft text-sm">
                        + час
                    </div>
                    <div class="col-span-4 md:col-span-2 display text-xl text-right md:text-left">
                        від 60 ₴
                    </div>
                    <div class="col-span-4 md:col-span-2 text-right">
                        <a href="#zapys" class="btn-ghost">Записатись →</a>
                    </div>
                </div>
            </div>

            <div class="mt-8 p-5 bg-rose-soft rounded-2xl flex flex-col md:flex-row items-center justify-between gap-4">
                <div>
                    <div class="font-semibold text-wine mb-1">
                        🎁 Перший візит — знижка 15%
                    </div>
                    <div class="text-sm text-soft">
                        Діє на будь-яку послугу при онлайн-записі
                    </div>
                </div>
                <a href="#zapys" class="btn-primary">Скористатись знижкою</a>
            </div>
        </div>
    </div>
</section>

<!-- Gallery -->
<section id="roboty" class="py-20 md:py-28 px-5 md:px-8">
    <div class="max-w-[1400px] mx-auto">
        <div class="text-center mb-14">
            <div class="text-xs tracking-[0.25em] uppercase text-wine mb-4">
                — Наші роботи
            </div>
            <h2 class="display text-5xl md:text-7xl mb-4">
                Те, що ми <span class="display-italic text-wine">робимо</span>
            </h2>
            <p class="text-soft max-w-md mx-auto">
                Понад 200 робіт в нашому Instagram. Це — лише деякі з них.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
            <div class="gallery-item aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1632345031435-8727f6897d53?w=600&q=80&auto=format&fit=crop"
                    alt="Робота 1" loading="lazy" />
            </div>
            <div class="gallery-item aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1607779097040-26e80aa78e66?w=600&q=80&auto=format&fit=crop"
                    alt="Робота 2" loading="lazy" />
            </div>
            <div class="gallery-item aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1630843599725-32ead7671867?w=600&q=80&auto=format&fit=crop"
                    alt="Робота 3" loading="lazy" />
            </div>
            <div class="gallery-item aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1610992015732-2449b76344bc?w=600&q=80&auto=format&fit=crop"
                    alt="Робота 4" loading="lazy" />
            </div>
            <div class="gallery-item aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1659391542239-9648f307c0b1?w=600&q=80&auto=format&fit=crop"
                    alt="Робота 5" loading="lazy" />
            </div>
            <div class="gallery-item aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1641814250010-9887d86eedfd?w=600&q=80&auto=format&fit=crop"
                    alt="Робота 6" loading="lazy" />
            </div>
            <div class="gallery-item aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1610992015762-45dca7fa3a85?w=600&q=80&auto=format&fit=crop"
                    alt="Робота 7" loading="lazy" />
            </div>
            <div class="gallery-item aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1652990337162-fa84a588d843?w=600&q=80&auto=format&fit=crop"
                    alt="Робота 8" loading="lazy" />
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="https://instagram.com" class="btn-secondary">
                Більше робіт у Instagram
                <span>↗</span>
            </a>
        </div>
    </div>
</section>

<!-- Master -->
<section id="master" class="py-20 md:py-28 px-5 md:px-8 bg-soft">
    <div class="max-w-[1400px] mx-auto grid md:grid-cols-2 gap-12 md:gap-20 items-center">
        <div class="aspect-[4/5] rounded-3xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1610992015836-7c249d75782d?w=800&q=80&auto=format&fit=crop"
                alt="Майстер" class="w-full h-full object-cover" />
        </div>
        <div>
            <div class="text-xs tracking-[0.25em] uppercase text-wine mb-4">
                — Майстер
            </div>
            <h2 class="display text-5xl md:text-6xl mb-6">
                Олена<br />
                <span class="display-italic text-wine">Коваленко</span>
            </h2>
            <p class="text-soft text-lg mb-8 leading-relaxed">
                Сертифікований майстер з 6-річним досвідом. Постійно вчиться у
                топ-педагогів — Оксани Мельник, школи OPI Academy, навчання E-File у
                Сергія Ярового.
            </p>

            <div class="grid grid-cols-3 gap-4 mb-8">
                <div>
                    <div class="display text-4xl text-wine">2 400+</div>
                    <div class="text-xs text-soft mt-1">задоволених клієнток</div>
                </div>
                <div>
                    <div class="display text-4xl text-wine">6</div>
                    <div class="text-xs text-soft mt-1">років практики</div>
                </div>
                <div>
                    <div class="display text-4xl text-wine">12</div>
                    <div class="text-xs text-soft mt-1">сертифікатів</div>
                </div>
            </div>

            <ul class="space-y-3 text-sm">
                <li class="flex gap-3">
                    <span class="text-wine">✓</span> Спеціалізація: апаратний манікюр,
                    складний дизайн
                </li>
                <li class="flex gap-3">
                    <span class="text-wine">✓</span> Працює з матеріалами OPI, CND
                    Shellac, Kodi Professional
                </li>
                <li class="flex gap-3">
                    <span class="text-wine">✓</span> Сертифікат із санітарної безпеки
                    (МОЗ України)
                </li>
                <li class="flex gap-3">
                    <span class="text-wine">✓</span> Підхід без болю — без обрізування
                    кутикули
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Reviews -->
<section id="vidguky" class="py-20 md:py-28 px-5 md:px-8">
    <div class="max-w-[1400px] mx-auto">
        <div class="flex flex-col md:flex-row justify-between md:items-end mb-12 gap-4">
            <div>
                <div class="text-xs tracking-[0.25em] uppercase text-wine mb-4">
                    — Відгуки клієнтів
                </div>
                <h2 class="display text-5xl md:text-6xl">
                    Що кажуть
                    <span class="display-italic text-wine">наші клієнтки</span>
                </h2>
            </div>
            <div class="flex items-center gap-3">
                <div class="display text-5xl text-wine">4.9</div>
                <div>
                    <div class="star text-lg">★★★★★</div>
                    <div class="text-xs text-soft mt-1">
                        287 відгуків · Google Maps
                    </div>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-5">
            <div class="card">
                <div class="star text-base mb-4">★★★★★</div>
                <p class="text-ink leading-relaxed mb-6">
                    «Ходжу до Олени вже другий рік. Манікюр тримається мінімум 3 тижні
                    без жодного сколу. Атмосфера в студії — це просто магія,
                    відпочиваю там як на спа.»
                </p>
                <div class="flex items-center gap-3 pt-4 border-t" style="border-color: var(--border)">
                    <div
                        class="w-10 h-10 rounded-full bg-rose-soft flex items-center justify-center font-semibold text-wine">
                        М
                    </div>
                    <div>
                        <div class="font-semibold text-sm">Марія Поліщук</div>
                        <div class="text-xs text-soft">постійна клієнтка · 2 роки</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="star text-base mb-4">★★★★★</div>
                <p class="text-ink leading-relaxed mb-6">
                    «Спробувала багато салонів — нарешті знайшла свого майстра. Без
                    болю, без обрізування, акуратно — і дизайн саме такий, який я
                    хотіла. Рекомендую усім подругам.»
                </p>
                <div class="flex items-center gap-3 pt-4 border-t" style="border-color: var(--border)">
                    <div
                        class="w-10 h-10 rounded-full bg-rose-soft flex items-center justify-center font-semibold text-wine">
                        А
                    </div>
                    <div>
                        <div class="font-semibold text-sm">Анна Карпенко</div>
                        <div class="text-xs text-soft">клієнтка з 2024</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="star text-base mb-4">★★★★★</div>
                <p class="text-ink leading-relaxed mb-6">
                    «Чистота — на рівні стоматології. Дезінфекція при мені, нові
                    пилки. Дуже важливо, бо я надчутлива до інфекцій. Плюс —
                    записуєшся онлайн, без дзвінків, ідеально.»
                </p>
                <div class="flex items-center gap-3 pt-4 border-t" style="border-color: var(--border)">
                    <div
                        class="w-10 h-10 rounded-full bg-rose-soft flex items-center justify-center font-semibold text-wine">
                        О
                    </div>
                    <div>
                        <div class="font-semibold text-sm">Оксана Левченко</div>
                        <div class="text-xs text-soft">клієнтка · 8 місяців</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section id="faq" class="py-20 md:py-28 px-5 md:px-8 bg-soft">
    <div class="max-w-[900px] mx-auto">
        <div class="text-center mb-12">
            <div class="text-xs tracking-[0.25em] uppercase text-wine mb-4">
                — Часті питання
            </div>
            <h2 class="display text-5xl md:text-6xl">
                Що вас <span class="display-italic text-wine">цікавить?</span>
            </h2>
        </div>

        <div>
            <details>
                <summary>Як записатись на процедуру?</summary>
                <div>
                    Найзручніше — натиснути кнопку «Записатись онлайн». Обираєте
                    послугу, дату, час — отримуєте підтвердження на email і Telegram.
                    Або зателефонуйте за номером +380 00 000 0000.
                </div>
            </details>

            <details>
                <summary>Скільки тримається гель-лак?</summary>
                <div>
                    За правильної підготовки нігтьової пластини покриття тримається
                    3-4 тижні. Якщо у вас покриття «сходить» раніше — приходьте,
                    безкоштовно переробимо.
                </div>
            </details>

            <details>
                <summary>Чи безпечно це для нігтів?</summary>
                <div>
                    Так. Ми використовуємо лише сертифіковані матеріали (OPI, CND,
                    Kodi), стерилізуємо інструменти у сухожаровому стерилізаторі Class
                    B, а пилки та апельсинові палички — одноразові. Кутикулу не
                    обрізаємо, лише відсуваємо — це найбезпечніший і найсучасніший
                    підхід.
                </div>
            </details>

            <details>
                <summary>Можна перенести запис?</summary>
                <div>
                    Так, перенесення безкоштовне, якщо повідомите щонайменше за 4
                    години. Просто напишіть у Telegram або в SMS.
                </div>
            </details>

            <details>
                <summary>Які способи оплати?</summary>
                <div>
                    Готівка, картка (Visa/Mastercard), Apple Pay, Google Pay, переказ
                    через Monobank/Privat24. Чек видається.
                </div>
            </details>

            <details>
                <summary>Є подарункові сертифікати?</summary>
                <div>
                    Так! Сертифікат на будь-яку суму від 500 ₴. Видаємо у красивому
                    конверті — ідеальний подарунок до свята. Замовити можна тут на
                    сайті або у студії.
                </div>
            </details>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section id="zapys" class="flex justify-center min-h-[100vh] py-4 px-5 md:px-8 bg-wine text-white relative overflow-hidden">
    <div class="blob" style="
          background: var(--rose);
          width: 400px;
          height: 400px;
          top: -100px;
          left: 50%;
          transform: translateX(-50%);
          opacity: 0.15;
        "></div>

    <div class="max-w-6xl mx-auto relative grid grid-cols-1 md:grid-cols-2 gap-12 items-center text-left">

        <div>
            <div class="text-xs tracking-[0.25em] uppercase mb-6" style="color: var(--rose)">
                — Запис
            </div>
            <h2 class="display text-4xl md:text-6xl mb-6 leading-[1.05]">
                Готові до <span class="display-italic">бездоганного</span> манікюру?
            </h2>
            <p class="text-lg opacity-80 leading-relaxed">
                Оберіть зручну дату та час онлайн
            </p>
        </div>

        <div class="w-full">
            <?php echo do_shortcode('[my_booking_form]'); ?>
        </div>

    </div>
</section>



<?php
get_footer();
