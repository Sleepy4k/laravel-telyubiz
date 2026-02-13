// Shopping Cart functionality
class Cart {
    constructor() {
        this.items = this.loadCart();
        this.init();
    }

    init() {
        this.updateCartCount();
        this.attachEventListeners();
    }

    loadCart() {
        const cartData = localStorage.getItem('telyubiz_cart');
        return cartData ? JSON.parse(cartData) : [];
    }

    saveCart() {
        localStorage.setItem('telyubiz_cart', JSON.stringify(this.items));
    }

    addItem(product, quantity = 1, variant = {}) {
        const existingItemIndex = this.items.findIndex(item =>
            item.id === product.id &&
            JSON.stringify(item.variant) === JSON.stringify(variant)
        );

        if (existingItemIndex > -1) {
            this.items[existingItemIndex].quantity += quantity;
        } else {
            this.items.push({
                id: product.id,
                name: product.name,
                slug: product.slug,
                price: product.discount_price || product.price,
                image: product.images[0],
                store: product.store,
                variant: variant,
                quantity: quantity
            });
        }

        this.saveCart();
        this.updateCartCount();
        this.showNotification('Produk ditambahkan ke keranjang!', 'success');
    }

    removeItem(index) {
        this.items.splice(index, 1);
        this.saveCart();
        this.updateCartCount();
        // Refresh cart page if we're on it
        if (window.location.pathname.includes('/cart')) {
            window.location.reload();
        }
    }

    updateQuantity(index, quantity) {
        if (quantity <= 0) {
            this.removeItem(index);
        } else {
            this.items[index].quantity = quantity;
            this.saveCart();
        }
    }

    getTotal() {
        return this.items.reduce((total, item) => {
            return total + (item.price * item.quantity);
        }, 0);
    }

    getCount() {
        return this.items.reduce((count, item) => count + item.quantity, 0);
    }

    updateCartCount() {
        const count = this.getCount();
        document.querySelectorAll('[data-cart-count]').forEach(el => {
            el.textContent = count;
            if (count > 0) {
                el.classList.remove('hidden');
            }
        });
    }

    clearCart() {
        this.items = [];
        this.saveCart();
        this.updateCartCount();
    }

    showNotification(message, type = 'success') {
        // Simple notification - can be enhanced with a toast library
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transition-all ${
            type === 'success' ? 'bg-success-500 text-white' : 'bg-danger-500 text-white'
        }`;
        notification.textContent = message;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    attachEventListeners() {
        // Cart quantity buttons
        document.addEventListener('click', (e) => {
            const decreaseBtn = e.target.closest('[data-cart-decrease]');
            const increaseBtn = e.target.closest('[data-cart-increase]');
            const removeBtn = e.target.closest('[data-cart-remove]');

            if (decreaseBtn) {
                const index = parseInt(decreaseBtn.dataset.cartDecrease);
                const currentQty = this.items[index].quantity;
                this.updateQuantity(index, currentQty - 1);
                window.location.reload();
            }

            if (increaseBtn) {
                const index = parseInt(increaseBtn.dataset.cartIncrease);
                const currentQty = this.items[index].quantity;
                this.updateQuantity(index, currentQty + 1);
                window.location.reload();
            }

            if (removeBtn) {
                const index = parseInt(removeBtn.dataset.cartRemove);
                if (confirm('Hapus produk ini dari keranjang?')) {
                    this.removeItem(index);
                }
            }
        });
    }
}

// Initialize cart when DOM is ready
let cart;
document.addEventListener('DOMContentLoaded', () => {
    cart = new Cart();
});

// Global function to add to cart from product cards
function addToCart(productId) {
    // This is a simplified version - in real app, you'd fetch product data
    const productCard = document.querySelector(`[data-product-id="${productId}"]`);

    if (!productCard) {
        alert('Produk ditambahkan ke keranjang!');
        return;
    }

    // Extract product data from card
    const product = {
        id: productId,
        name: productCard.querySelector('[data-product-name]')?.textContent || 'Product',
        price: parseInt(productCard.querySelector('[data-product-price]')?.dataset.productPrice) || 0,
        images: [productCard.querySelector('[data-product-image]')?.src || ''],
        store: {
            name: productCard.querySelector('[data-store-name]')?.textContent || ''
        }
    };

    cart.addItem(product, 1);
}
