export class Calendar {
    constructor(onDateSelect) {
        this.onDateSelect = onDateSelect;
        this.currentCalendarDate = new Date();
        this.today = new Date();
        this.today.setHours(0, 0, 0, 0);

        this.ukrainianMonths = [
            "Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень",
            "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"
        ];

        this.monthTitle = document.getElementById('calendarMonthTitle');
        this.daysGrid = document.getElementById('calendarDaysGrid');
        this.prevMonthBtn = document.getElementById('prevMonthBtn');
        this.nextMonthBtn = document.getElementById('nextMonthBtn');
        this.dateHidden = document.getElementById('booking_date');

        this.initEvents();
    }

    initEvents() {
        this.prevMonthBtn.addEventListener('click', () => this.changeMonth(-1));
        this.nextMonthBtn.addEventListener('click', () => this.changeMonth(1));
    }

    changeMonth(direction) {
        this.currentCalendarDate.setMonth(this.currentCalendarDate.getMonth() + direction);
        this.render();
    }

    formatDateString(year, month, day) {
        const mm = String(month + 1).padStart(2, '0');
        const dd = String(day).padStart(2, '0');
        return `${year}-${mm}-${dd}`;
    }

    render() {
        const year = this.currentCalendarDate.getFullYear();
        const month = this.currentCalendarDate.getMonth();

        this.monthTitle.textContent = `${this.ukrainianMonths[month]} ${year}`;

        let firstDayIndex = new Date(year, month, 1).getDay();
        firstDayIndex = firstDayIndex === 0 ? 6 : firstDayIndex - 1; // Смещение (ПН-ВС)

        const totalDays = new Date(year, month + 1, 0).getDate();
        this.daysGrid.innerHTML = '';

        for (let i = 0; i < firstDayIndex; i++) {
            this.daysGrid.appendChild(document.createElement('div'));
        }

        for (let day = 1; day <= totalDays; day++) {
            const dayBtn = document.createElement('button');
            dayBtn.type = 'button';
            dayBtn.className = 'calendar-day-btn';
            dayBtn.textContent = day;

            const thisDate = new Date(year, month, day);

            if (thisDate < this.today) {
                dayBtn.disabled = true;
            }

            const dayOfWeek = thisDate.getDay();
            const disabledDays = wpApiSettings.daysOff.map(Number);
            if (disabledDays.includes(dayOfWeek)) {
                dayBtn.disabled = true;
                dayBtn.classList.add('day-off');
            }

            const formattedDate = this.formatDateString(year, month, day);
            if (this.dateHidden.value === formattedDate) {
                dayBtn.classList.add('selected');
            }

            dayBtn.addEventListener('click', () => {
                document.querySelectorAll('.calendar-day-btn').forEach(b => b.classList.remove('selected'));
                dayBtn.classList.add('selected');

                this.dateHidden.value = formattedDate;
                this.onDateSelect(formattedDate);
            });

            this.daysGrid.appendChild(dayBtn);
        }
    }
}