// Modal functionality
const Modal = {
    open(modalId) {
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: modalId
        }));
    },

    close(modalId) {
        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: modalId
        }));
    }
};

// Expose globally
window.Modal = Modal;
