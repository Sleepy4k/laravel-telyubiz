// Navigation functionality
class Navigation {
    constructor() {
        this.mobileMenuOpen = false;
        this.userDropdownOpen = false;
        this.init();
    }

    init() {
        this.setupMobileMenu();
        this.setupUserDropdown();
    }

    setupMobileMenu() {
        const mobileMenuButton = document.querySelector('[data-mobile-menu-button]');
        const mobileMenuOverlay = document.querySelector('[data-mobile-menu-overlay]');
        const mobileMenuPanel = document.querySelector('[data-mobile-menu-panel]');
        const mobileMenuClose = document.querySelector('[data-mobile-menu-close]');

        if (!mobileMenuButton || !mobileMenuOverlay || !mobileMenuPanel) return;

        const openMobileMenu = () => {
            this.mobileMenuOpen = true;
            mobileMenuOverlay.classList.remove('hidden');
            mobileMenuPanel.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Trigger animation
            setTimeout(() => {
                mobileMenuOverlay.classList.remove('opacity-0');
                mobileMenuPanel.classList.remove('translate-x-full');
            }, 10);
        };

        const closeMobileMenu = () => {
            this.mobileMenuOpen = false;
            mobileMenuOverlay.classList.add('opacity-0');
            mobileMenuPanel.classList.add('translate-x-full');
            document.body.style.overflow = '';

            setTimeout(() => {
                mobileMenuOverlay.classList.add('hidden');
                mobileMenuPanel.classList.add('hidden');
            }, 200);
        };

        mobileMenuButton?.addEventListener('click', openMobileMenu);
        mobileMenuClose?.addEventListener('click', closeMobileMenu);
        mobileMenuOverlay?.addEventListener('click', closeMobileMenu);
    }

    setupUserDropdown() {
        const dropdownButton = document.querySelector('[data-user-dropdown-button]');
        const dropdownMenu = document.querySelector('[data-user-dropdown-menu]');

        if (!dropdownButton || !dropdownMenu) return;

        const toggleDropdown = () => {
            this.userDropdownOpen = !this.userDropdownOpen;

            if (this.userDropdownOpen) {
                dropdownMenu.classList.remove('hidden');
                setTimeout(() => {
                    dropdownMenu.classList.remove('opacity-0', 'scale-95');
                    dropdownMenu.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                dropdownMenu.classList.remove('opacity-100', 'scale-100');
                dropdownMenu.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    dropdownMenu.classList.add('hidden');
                }, 100);
            }
        };

        const closeDropdown = () => {
            if (!this.userDropdownOpen) return;

            this.userDropdownOpen = false;
            dropdownMenu.classList.remove('opacity-100', 'scale-100');
            dropdownMenu.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdownMenu.classList.add('hidden');
            }, 100);
        };

        dropdownButton.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleDropdown();
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                closeDropdown();
            }
        });

        // Close dropdown on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeDropdown();
            }
        });
    }
}

// Initialize navigation when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.navigation = new Navigation();
    });
} else {
    window.navigation = new Navigation();
}
