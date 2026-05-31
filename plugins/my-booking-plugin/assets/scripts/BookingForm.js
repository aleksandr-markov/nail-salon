import { Wizard } from './Wizard.js';
import { Calendar } from './Calendar.js';
import { TimeSlots } from './TimeSlots.js';

class BookingFormApp {
    constructor() {
        this.wizard = new Wizard();

        this.timeSlots = new TimeSlots((isTimeSelected) => {
            this.toStep3Btn.disabled = !isTimeSelected;
        });

        this.calendar = new Calendar((selectedDate) => {
            this.timeSlots.load(selectedDate);
        });

        this.form = document.getElementById('bookingForm');
        this.toStep2Btn = document.getElementById('toStep2');
        this.toStep3Btn = document.getElementById('toStep3');
        this.serviceHidden = document.getElementById('booking_service');

        this.init();
    }

    init() {
        document.addEventListener('click', (e) => {
            const card = e.target.closest('.service-card');
            if (!card) return;

            document.querySelectorAll('.service-card').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');

            this.serviceHidden.value = card.dataset.slug;
            this.toStep2Btn.disabled = false;
        });

        this.toStep2Btn.addEventListener('click', () => {
            this.wizard.switchStep(1, 2);
            this.calendar.render();
        });

        this.toStep3Btn.addEventListener('click', () => {
            this.wizard.switchStep(2, 3);
        });

        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
    }

    handleSubmit(e) {
        e.preventDefault();

        const data = {
            client_name: document.getElementById('client_name').value,
            client_phone: document.getElementById('client_phone').value,
            booking_date: document.getElementById('booking_date').value,
            booking_time: document.getElementById('booking_time').value,
            booking_service: this.serviceHidden.value
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
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new BookingFormApp();
});