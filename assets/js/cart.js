// This script fills the `div.cart` element (e.g. /site/snippets/header.php).
// It also handles adding items, update items and deleting items from the cart.
// The instance of Cart is stored as a global variabel (`window.cart`).

class Cart {
    constructor(element) {
        this.lang = document.querySelector('html').lang;

        this.element = element;
        this.cartDetailsElement = document.querySelector(".details-cart");
        this.countElement = document.querySelector('.cart-count');

        // this object will be used to store the cart data we are loading from the api.
        this.data = {};

        // store language variables
        // this should be the same as in /site/languages/en.php
        this.i18n = {
            'cart.empty': 'Il carrello è vuoto',
            'cart.item.remove': 'Rimuovi',
            'cart.included-vat': 'IVA inclusa',
            'cart.vat-included': 'incl. IVA',
            'cart.quantity': 'Quantità',
            'cart.quantity-in-cart': 'nel carrello',
            'cart.change-quantity': 'Change quantity',
            'cart.price': 'Prezzo',
            'cart.sum': 'Totale',
            'cart.shipping': 'Spedizione',
            'cart.product': 'Articolo',
            'cart.free-shipping': 'gratuita',
            'cart.to-checkout': 'Checkout',
        };
        // overwrite default language variables
        if (this.lang === 'en') {
            this.i18n = {
                'cart.empty': 'Cart is empty',
                'cart.item.remove': 'Remove',
                'cart.included-vat': 'Included VAT',
                'cart.vat-included': 'VAT incl.',
                'cart.quantity': 'Quantity',
                'cart.quantity-in-cart': 'in cart',
                'cart.change-quantity': 'Change quantity',
                'cart.price': 'Price',
                'cart.sum': 'Total',
                'cart.shipping': 'Shipping',
                'cart.product': 'Item',
                'cart.free-shipping': 'free',
                'cart.to-checkout': 'Checkout',
            };
        }

        this.cartDetailsElement.addEventListener('click', (event) => {
            event.stopPropagation();
        });

        document.addEventListener('click', () => {
            this.cartDetailsElement.removeAttribute('open');
        });

        // this.buttonCloseCart.addEventListener('click', () => {
        //     this.cartDetailsElement.removeAttribute('open');
        // });

        // initially load cart data from api
        this.request('cart');
    }

    // helper method to handle different api request
    // the api endpoint is defined in /site/plugins/site/api.php
    async request(endpoint, method = 'GET', data = null) {
        const { lang } = this;

        const response = await fetch(`/api/shop/${endpoint}`, {
            method,
            headers: {
                'Content-Type': 'application/json',
                'x-language': lang,
            },
            body: method !== 'GET' ? JSON.stringify(data) : null,
        });
        const json = await response.json();
        if (json.status === 'ok') {
            // store response data to data object.
            this.data = json.data;
            this.updateHTML();
            this.updateCount();
        } else {
            alert(json.message);
        }
        return json;
    }

    updateCount() {
        const { data } = this;
        if (this.countElement) {
            if (data.quantity === 0) {
                this.countElement.innerText = '';
            } else {
                this.countElement.innerText = `(${data.quantity})`;
            }
        }
    }

    updateHTML() {
        const { data, i18n } = this;
        function createQuantitySelect(item) {
            const ariaLabel = `${item.quantity} ${i18n['cart.quantity-in-cart']}. ${i18n['cart.change-quantity']}.`;
            let html = `<select data-key="${item.key}" aria-label="${ariaLabel}">`;
            for (let i = 0; i <= item.maxAmount; i += 1) {
                html += `
            <option ${i === item.quantity ? 'selected' : ''}>
              ${i}
            </option>
          `;
            }
            html += '</select>';
            return html;
        }

        function createCartItem(item) {
            return `
            <ul class="cart-items">
                <li class="cart-item text-subtitle"><a href="${item.url}" target="_blank" rel="noopener noreferrer">${item.title}</a></li>
                <li class="cart-item text-subtitle">${createQuantitySelect(item)}</li>
                <li class="cart-item text-subtitle">${item.price}</li>
            </ul>
            `;
        }

        function createCartItems(items) {
            let html = '';
            items.forEach((item) => {
                html += createCartItem(item);
            });
            return html;
        }

        // function createTaxRates(taxRates) {
        //     let html = '';
        //     taxRates.forEach((taxRate) => {
        //         html += `
        //     <tr class="text-s color-gray-500">
        //       <th colspan="3">${i18n['cart.included-vat']} (${taxRate.taxRate} %)</th>
        //       <td>${taxRate.sum}</td>
        //     </tr>
        //   `;
        //     });
        //     return html;
        // }

        if (data.quantity === 0) {
            this.element.innerHTML = `

            <div class="cart-header">
                <div class="main-menu">
                    <div class="main-nav-wrapper">
                        <h1 class="button static-button">Viaindustriae</h1>
                        <div class="button static-button">Publishing</div>
                    </div>
                </div>
            </div>

            <div class="cart-content">
                <div class="cart-content-wrapper">
                    <ul class="cart-items">
                        <li class="cart-info text-title">${i18n['cart.empty']}</li>
                    </ul>
                </div>
                <div class="cart-content-wrapper"></div>
            </div>
        `;
        } else {
            this.element.innerHTML = `
            <div class="cart-header">
                <div class="main-menu">
                    <div class="main-nav-wrapper">
                        <h1 class="button static-button">Viaindustriae</h1>
                        <div class="button static-button">Publishing</div>
                    </div>
                </div>
            </div>
            <div class="cart-content">
                <div class="cart-content-wrapper">
                    <ul class="cart-items">
                        <li class="cart-item text-title">${i18n['cart.product']}</li>
                        <li class="cart-item text-title">${i18n['cart.quantity']}</li>
                        <li class="cart-item text-title">${i18n['cart.price']}</li>

                    </ul>
                    ${createCartItems(data.items)}
                </div>
                <div class="cart-content-wrapper">
                    <div class="cart-sum">
                        <p class="text-title">${i18n['cart.shipping']}</p>
                        <p class="text-subtitle">${data.shipping === null ? i18n['cart.free-shipping'] : data.shipping}</p>
                    </div>
                    <div class="cart-sum">
                        <p class="text-title">${i18n['cart.sum']}</p>
                        <p class="text-subtitle">${data.sum}</p>
                    </div>
                </div>
                <div class="cart-content-wrapper">
                    ${(this.element.dataset.variant !== 'checkout') ? `<a href="${data.checkoutUrl}" class="button checkout-button">${i18n['cart.to-checkout']}</a>` : ''}
                </div>
            </div>
        `;

            this.element.querySelectorAll('select').forEach((selectElement) => {
                selectElement.addEventListener('change', (event) => {
                    const { key } = event.target.dataset;
                    const quantity = event.target.value;
                    this.update(key, quantity);
                });
            });
        }
    }

    async add(id, quantity = 1) {
        this.element.classList.add('-loading');
        try {
            return await this.request('cart', 'POST', {
                id,
                quantity,
            });
        } finally {
            this.cartDetailsElement?.setAttribute('open', '');
            this.element.classList.remove('-loading');
        }
    }

    async update(id, quantity = 1) {
        this.element.classList.add('-loading');
        try {
            return await this.request('cart', 'PATCH', {
                id,
                quantity,
            });
        } finally {
            this.element.classList.remove('-loading');
        }
    }
}

const cartElement = document.getElementById('cart');
if (cartElement) {
    // Store the instance of Cart as a global variable so other scripts can make use of Cart methods.
    window.cart = new Cart(cartElement);
}
