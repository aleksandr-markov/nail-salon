export class Wizard {
    constructor() {
        this.steps = Array.from(document.querySelectorAll('.wizard-step'));
        this.initEvents();
    }

    initEvents() {
        document.querySelectorAll('.wizard-back-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                this.switchStep(this.getCurrentStep(), btn.dataset.to);
            });
        });
    }

    switchStep(from, to) {
        const fromEl = document.getElementById(`step${from}`);
        const toEl = document.getElementById(`step${to}`);

        if (fromEl) fromEl.classList.remove('active');
        if (toEl) toEl.classList.add('active');
    }

    getCurrentStep() {
        if (document.getElementById('step1').classList.contains('active')) return 1;
        if (document.getElementById('step2').classList.contains('active')) return 2;
        return 3;
    }
}