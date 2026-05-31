export class TimeSlots {
    constructor(onTimeSelect) {
        this.onTimeSelect = onTimeSelect;
        this.ALL_SLOTS = wpApiSettings.timeSlots || ['09:00', '10:30', '12:00', '14:00', '15:30', '17:00'];

        this.slotsWrapper = document.getElementById('slotsWrapper');
        this.slotsGrid = document.getElementById('slotsGrid');
        this.timeHidden = document.getElementById('booking_time');
    }

    load(date) {
        fetch(`${wpApiSettings.root}mybooking/v1/get-occupied-slots/&date=${date}`)
            .then(res => res.json())
            .then(occupiedSlots => this.render(date, occupiedSlots));
    }

    render(date, occupiedSlots) {
        this.slotsGrid.innerHTML = '';
        this.timeHidden.value = '';
        this.onTimeSelect(false);

        const now = new Date();
        const todayString = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}`;
        const currentTimeString = `${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;

        this.ALL_SLOTS.forEach(slot => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'slot-btn';
            btn.textContent = slot;

            if (occupiedSlots.includes(slot)) {
                btn.disabled = true;
            }

            if (date === todayString && slot <= currentTimeString) {
                btn.disabled = true;
                btn.classList.add('past-slot');
            }

            btn.addEventListener('click', () => {
                document.querySelectorAll('.slot-btn').forEach(b => b.classList.remove('selected'));
                btn.classList.add('selected');

                this.timeHidden.value = slot;
                this.onTimeSelect(true);
            });

            this.slotsGrid.appendChild(btn);
        });

        this.slotsWrapper.style.display = 'block';
    }
}