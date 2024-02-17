document.addEventListener('DOMContentLoaded', function () {
    const iconCart = document.getElementById('lg-bag');
    const body = document.querySelector('body');
    const closeCart = document.querySelector('.close');
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');
    const nav = document.getElementById('navbar');
    const listProductHTML = document.getElementById('listProduct');
    const listCartHTML = document.querySelector('.ListCart');
    const iconCartSpan = document.getElementById('span');
   
iconCart.addEventListener('click', () =>{
    body.classList.toggle('showCart')
})
closeCart.addEventListener('click', () =>{
    body.classList.toggle('showCart')
})

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    });
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    });
}

let localStorageKey = 'commonCart';
let listProducts = [];
// Retrieve cart data from localStorage
let carts = JSON.parse(localStorage.getItem(localStorageKey)) || [];
try {
    carts = JSON.parse(localStorage.getItem(localStorageKey)) || [];
} catch (error) {
  
    carts = [];
}

let globalIdCounter = 1; // Initialize the global counter


const addToCart = (product_id) => {
    let positionThisProductInCart = carts.findIndex((value) => value.product_id === product_id);

    if (carts.length <= 0 || positionThisProductInCart < 0) {
        carts.push({
            product_id: product_id,
            quantity: 1
        });
    } else {
        carts[positionThisProductInCart].quantity += 1;
    }

    addCartToHTML();
    addCartToMemory();
    updateLocalStorageCart();
};

// Function to update cart data in localStorage
const updateLocalStorageCart = () => {
    localStorage.setItem(localStorageKey, JSON.stringify(carts));
};

const addCartToMemory = () => {
    if (localStorageKey) {
        localStorage.setItem(localStorageKey, JSON.stringify(carts));
    }
};

const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    let subtotal = 0;

    if (carts.length > 0) {
        carts.forEach(cart => {
            totalQuantity += cart.quantity;

            let product = listProducts.find(p => p.id == cart.product_id);

            if (product) {
                let itemTotalPrice = product.price * cart.quantity;
                subtotal += itemTotalPrice;

                let newCart = document.createElement('div');
                newCart.classList.add('item');
                newCart.dataset.id = cart.product_id;

                newCart.innerHTML = `
                    <div class="cart-item">
                        <div class="image">
                            <img src="${product.image}" alt="">
                        </div>
                        <div class="details">
                            <div class="name">${product.name}</div>
                            <div class="price">$${product.price.toFixed(2)}</div>
                            <div class="quantity">
                                <span class="minus"><</span>
                                <span>${cart.quantity}</span>
                                <span class="plus">></span>
                            </div>
                            <div class="totalPrice">$${itemTotalPrice.toFixed(2)}</div>
                        </div>
                    </div>
                `;

                listCartHTML.appendChild(newCart);
            } 
        });

        // Calculate and display subtotal
        let subtotalElement = document.getElementById('subtotal');
        if (subtotalElement) {
            subtotalElement.innerText = `Subtotal: $${subtotal.toFixed(2)}`;
        }

        // Set a fixed delivery charge
        let deliveryCharge = 3.00;

        // Calculate and display total
        let totalElement = document.getElementById('total');
        if (totalElement) {
            let totalWithDelivery = subtotal + deliveryCharge;
            totalElement.innerText = `Total: $${totalWithDelivery.toFixed(2)}`;
        }

        // Ensure the cart items are sent to the server
        let cartItemsInput = document.getElementById('cartItemsInput');
        if (cartItemsInput) {
            cartItemsInput.value = JSON.stringify(carts.map(cart => {
                let product = listProducts.find(p => p.id == cart.product_id);
                return {
                    id: product.id,
                    name: product.name,
                    quantity: cart.quantity,
                    price: product.price
                };
            }));
        }
    }

    iconCartSpan.innerText = totalQuantity;
};

listProductHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('addCart')|| positionClick.closest('.addCart')) {
        let product_id = positionClick.closest('.pro').getAttribute('data-id');
        addToCart(product_id, localStorageKey);
    }
});
listCartHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
// Traverse up the DOM to find the closest parent with a data-id attribut
     let productElement = positionClick.closest('[data-id]');
    if (productElement) {
        let product_id = productElement.dataset.id;

        let type = 'minus';
        if (positionClick.classList.contains('plus')) {
            type = 'plus';
        }
        changeQuantity(product_id, type);
    }
});
const changeQuantity = (product_id, type) => {
    let positionItemInCart = carts.findIndex((value) => value.product_id == product_id);

    if (positionItemInCart >= 0) {
        switch (type) {
            case 'plus':
                carts[positionItemInCart].quantity += 1;
                break;

            default:
                let valueChange = carts[positionItemInCart].quantity - 1;
                if (valueChange > 0) {
                    carts[positionItemInCart].quantity = valueChange;
                } else {
                    carts.splice(positionItemInCart, 1);
                }
                break;
        }
    }

    addCartToMemory();
    addCartToHTML();
    updateLocalStorageCart();
 
};

const currentPage = window.location.pathname;

const initApp = () => {
    const bagsJsonFile = 'bags.json';
    const candlesJsonFile = 'candles.json';

    const fetchBagsData = fetchProducts(bagsJsonFile);
    const fetchCandlesData = fetchProducts(candlesJsonFile);

    Promise.all([fetchBagsData, fetchCandlesData])
        .then(([bagsProducts, candlesProducts]) => {
            // Combine products from both files
            listProducts = [...bagsProducts, ...candlesProducts];

            // Retrieve cart data from localStorage
            carts = JSON.parse(localStorage.getItem(localStorageKey)) || [];

            // Merge existing cart with new products
            mergeCartWithNewProducts(bagsJsonFile);
            mergeCartWithNewProducts(candlesJsonFile);

            // Filter products based on the current page
            const currentProducts = determineCurrentProducts();
            
            addDataToHtml(currentProducts);
            addCartToHTML();
        })
        .catch((error) => {
            console.error('Error fetching products:', error);
        });
};

const determineCurrentProducts = () => {
    if (currentPage.includes('shop.html')) {
        return listProducts.filter(product => product.id.includes('candles.json'));
    } else if (currentPage.includes('bags.html')) {
        return listProducts.filter(product => product.id.includes('bags.json'));
    } else {
        return listProducts; // Default to all products if the page is neither shop.html nor bags.html
    }
};
const mergeCartWithNewProducts = (jsonFile) => {
    carts.forEach(cartItem => {
        let product = listProducts.find(product => product.id === `${jsonFile}-${cartItem.product_id.split('-')[1]}`);

        if (product) {
            // Update the product_id to match the current page
            cartItem.product_id = product.id;
        }
    });
};
const fetchProducts = (jsonFile) => {
    return fetch(jsonFile)
        .then(response => response.json())
        .then(products => {
            return products.map(product => {
                return {
                    id: `${jsonFile}-${product.id}`,
                    name: product.name,
                    price: product.price,
                    image: product.image
                };
            });
        })
        .catch((error) => {
            console.error(`Error fetching products from ${jsonFile}:`, error);
            return [];
        });
};
// Modify addDataToHtml to accept a list of products
const addDataToHtml = (products) => {
    listProductHTML.innerHTML = '';

    products.forEach(product => {
        let newProduct = document.createElement('div');
        newProduct.classList.add('pro');
        newProduct.dataset.id = product.id; // Use the product id as the dataset id
        newProduct.innerHTML = `
            <img src="${product.image}" alt="">
            <div class="des">
                <span>${product.name}</span>
                <h4>$${product.price}</h4>
                <button class="addCart">
                    Add To Cart
                </button>
            </div>
        `;
        listProductHTML.appendChild(newProduct);
    });
};


initApp();
})