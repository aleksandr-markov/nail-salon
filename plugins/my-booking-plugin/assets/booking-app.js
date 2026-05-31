document.addEventListener('DOMContentLoaded', function () {
    const ALL_SLOTS = ['09:00', '10:30', '12:00', '14:00', '15:30', '17:00'];

    // Элементы управления шагами
    const toStep2Btn = document.getElementById('toStep2');
    const toStep3Btn = document.getElementById('toStep3');
    const slotsWrapper = document.getElementById('slotsWrapper');
    const slotsGrid = document.getElementById('slotsGrid');

    // Скрытые инпуты для данных
    const serviceHidden = document.getElementById('booking_service');
    const dateHidden = document.getElementById('booking_date');
    const timeHidden = document.getElementById('booking_time');

    // Элементы кастомного календаря
    const monthTitle = document.getElementById('calendarMonthTitle');
    const daysGrid = document.getElementById('calendarDaysGrid');
    const prevMonthBtn = document.getElementById('prevMonthBtn');
    const nextMonthBtn = document.getElementById('nextMonthBtn');

    let currentCalendarDate = new Date(); // Текущая дата для пролистывания месяцев
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const ukrainianMonths = [
        "Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень",
        "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"
    ];

    // --- ШАГ 1: Выбор услуги ---
    document.addEventListener('click', function (e) {
        const card = e.target.closest('.service-card');
        if (!card) return;
        document.querySelectorAll('.service-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');
        serviceHidden.value = card.dataset.slug;
        toStep2Btn.disabled = false;
    });

    toStep2Btn.addEventListener('click', () => {
        switchStep(1, 2);
        renderCalendar(); // Строим календарь при переходе на 2 шаг
    });
    toStep3Btn.addEventListener('click', () => switchStep(2, 3));

    document.querySelectorAll('.wizard-back-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            switchStep(getCurrentStep(), this.dataset.to);
        });
    });

    // --- РЕНДЕР ПОЛНОЦЕННОГО КАЛЕНДАРЯ ---
    function renderCalendar() {
        const year = currentCalendarDate.getFullYear();
        const month = currentCalendarDate.getMonth();

        // Заголовок месяца
        monthTitle.textContent = `${ukrainianMonths[month]} ${year}`;

        // Первый день месяца (какой день недели)
        let firstDayIndex = new Date(year, month, 1).getDay();
        // Смещаем индекс, так как в JS неделя начинается с воскресенья (0), а у нас с понедельника
        firstDayIndex = firstDayIndex === 0 ? 6 : firstDayIndex - 1;

        // Количество дней в текущем месяце
        const totalDays = new Date(year, month + 1, 0).getDate();

        daysGrid.innerHTML = '';

        // Рисуем пустые ячейки для сдвига дней недели
        for (let i = 0; i < firstDayIndex; i++) {
            const emptyDiv = document.createElement('div');
            daysGrid.appendChild(emptyDiv);
        }

        // Рисуем дни месяца
        for (let day = 1; day <= totalDays; day++) {
            const dayBtn = document.createElement('button');
            dayBtn.type = 'button';
            dayBtn.className = 'calendar-day-btn';
            dayBtn.textContent = day;

            const thisDate = new Date(year, month, day);

            // 1. Блокировка прошлых дат
            if (thisDate < today) {
                dayBtn.disabled = true;
            }

            // 2. Блокировка выходных дней недели из админки
            const dayOfWeek = thisDate.getDay();
            const disabledDays = wpApiSettings.daysOff.map(Number);

            if (disabledDays.includes(dayOfWeek)) {
                dayBtn.disabled = true;
                dayBtn.classList.add('day-off');
            }

            // Подсвечиваем уже выбранную дату
            const formattedDate = formatDateString(year, month, day);
            if (dateHidden.value === formattedDate) {
                dayBtn.classList.add('selected');
            }

            // Клик по дню календаря
            dayBtn.addEventListener('click', function () {
                document.querySelectorAll('.calendar-day-btn').forEach(b => b.classList.remove('selected'));
                dayBtn.classList.add('selected');

                dateHidden.value = formattedDate;
                loadTimeSlots(formattedDate);
            });

            daysGrid.appendChild(dayBtn);
        }
    }

    // Перелистывание месяцев
    prevMonthBtn.addEventListener('click', () => {
        currentCalendarDate.setMonth(currentCalendarDate.getMonth() - 1);
        renderCalendar();
    });
    nextMonthBtn.addEventListener('click', () => {
        currentCalendarDate.setMonth(currentCalendarDate.getMonth() + 1);
        renderCalendar();
    });

    // Вспомогательный формат даты в YYYY-MM-DD
    function formatDateString(year, month, day) {
        const mm = String(month + 1).padStart(2, '0');
        const dd = String(day).padStart(2, '0');
        return `${year}-${mm}-${dd}`;
    }

    // --- ЗАГРУЗКА ВРЕМЕНИ ПОСЛЕ ВЫБОРА ДНЯ (С валидацией прошедшего времени) ---
    function loadTimeSlots(date) {
        fetch(`${wpApiSettings.root}mybooking/v1/get-occupied-slots/&date=${date}`)
            .then(res => res.json())
            .then(occupiedSlots => {
                slotsGrid.innerHTML = '';
                timeHidden.value = '';
                toStep3Btn.disabled = true;

                // Получаем текущее время на устройстве пользователя
                const now = new Date();
                const todayString = now.getFullYear() + '-' +
                    String(now.getMonth() + 1).padStart(2, '0') + '-' +
                    String(now.getDate()).padStart(2, '0');
                const currentTimeString = String(now.getHours()).padStart(2, '0') + ':' +
                    String(now.getMinutes()).padStart(2, '0');

                ALL_SLOTS.forEach(slot => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'slot-btn';
                    btn.textContent = slot;

                    // ПРОВЕРКА 1: Слот занят в базе данных
                    if (occupiedSlots.includes(slot)) {
                        btn.disabled = true;
                    }

                    // ПРОВЕРКА 2: Если выбран сегодняшний день, убираем прошедшие часы
                    if (date === todayString && slot <= currentTimeString) {
                        btn.disabled = true;
                        btn.classList.add('past-slot'); // Можно добавить стиль в CSS (например, opacity)
                    }

                    // Клик по доступному слоту времени
                    btn.addEventListener('click', function () {
                        document.querySelectorAll('.slot-btn').forEach(b => b.classList.remove('selected'));
                        btn.classList.add('selected');
                        timeHidden.value = slot;
                        toStep3Btn.disabled = false;
                    });

                    slotsGrid.appendChild(btn);
                });
                slotsWrapper.style.display = 'block';
            });
    }

    // --- ОТПРАВКА ФОРМЫ ---
    document.getElementById('bookingForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const data = {
            client_name: document.getElementById('client_name').value,
            client_phone: document.getElementById('client_phone').value,
            booking_date: dateHidden.value,
            booking_time: timeHidden.value,
            booking_service: serviceHidden.value
        };

        fetch(`${wpApiSettings.root}mybooking/v1/create-booking/`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    document.getElementById('step3').style.display = 'none';
                    const msg = document.getElementById('bookingMessage');
                    msg.textContent = res.message;
                    msg.className = 'booking-message success';
                    msg.style.display = 'block';
                }
            });
    });

    function switchStep(from, to) {
        document.getElementById(`step${from}`).classList.remove('active');
        document.getElementById(`step${to}`).classList.add('active');
    }

    function getCurrentStep() {
        if (document.getElementById('step1').classList.contains('active')) return 1;
        if (document.getElementById('step2').classList.contains('active')) return 2;
        return 3;
    }
});