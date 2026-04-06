document.addEventListener('DOMContentLoaded', function() {
    // Modal Logic
    const modals = document.querySelectorAll('.ifgp-modal');
    const triggers = document.querySelectorAll('[data-ifgp-toggle="modal"]');
    const closers = document.querySelectorAll('[data-ifgp-dismiss="modal"]');

    triggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-ifgp-target');
            const targetModal = document.querySelector(targetId);
            if (targetModal) {
                targetModal.style.display = 'block';
            }
        });
    });

    closers.forEach(closer => {
        closer.addEventListener('click', function() {
            const modal = this.closest('.ifgp-modal');
            if (modal) {
                modal.style.display = 'none';
            }
        });
    });

    window.addEventListener('click', function(event) {
        modals.forEach(modal => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
});

// Tooltip helper
function ifgp_show_tooltip(element) {
    element.classList.add('show-tooltip');
    setTimeout(() => {
        element.classList.remove('show-tooltip');
    }, 2000);
}
