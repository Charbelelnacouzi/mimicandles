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

let listProducts = [];
let carts = [];



const addDataToHtml = () => {
    listProductHTML.innerHTML = '';
    if (listProducts.length > 0) {
        listProducts.forEach(product => {
            let newProduct = document.createElement('div');
        newProduct.classList.add('pro');
        newProduct.dataset.id = product.id;
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
    }
};
const addToCart = (product_id) => {
    let positionThisProductInCart = carts.findIndex((value) => value.product_id === product_id);

    if (carts.length <= 0) {
        carts = [{
            product_id: product_id,
            quantity: 1
        }];
    } else if (positionThisProductInCart < 0) {
        carts.push({
            product_id: product_id,
            quantity: 1
        });
    } else {
        carts[positionThisProductInCart].quantity = carts[positionThisProductInCart].quantity + 1;

    }
    addCartToHTML();
    addCartToMemory();
};
const addCartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(carts));
}
const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    let subtotal = 0;

    if (carts.length > 0) {
        carts.forEach(cart => {
            totalQuantity += cart.quantity;
            let newCart = document.createElement('div');
            newCart.classList.add('item');
            newCart.dataset.id = cart.product_id;
            let positionProduct = listProducts.findIndex((value) => value.id == cart.product_id);
            let info = listProducts[positionProduct];
            let itemTotalPrice = info.price * cart.quantity;
            subtotal += itemTotalPrice;

            newCart.innerHTML = `
                <div class="cart-item">
                    <div class="image">
                        <img src="${info.image}" alt="">
                    </div>
                    <div class="details">
                        <div class="name">${info.name}</div>
                        <div class="price">$${info.price.toFixed(2)}</div>
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
        });

        // Calculate and display subtotal
        let subtotalElement = document.getElementById('subtotal');
        if (subtotalElement) {
            subtotalElement.innerText = `Subtotal: $${subtotal.toFixed(2)}`;
        }

        // Set a fixed delivery charge
        let deliveryCharge = 4.00;

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
               let positionProduct = listProducts.findIndex(value => value.id == cart.product_id);
               let info = listProducts[positionProduct];
               return {
                   id: info.id,
                   name: info.name,
                   quantity: cart.quantity,
                   price: info.price
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
        addToCart(product_id);
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
};


const initApp = () => {
    // get data from json
    fetch('products.json')
        .then(response => response.json())
        .then(data => {
            listProducts = data;
            addDataToHtml();

            //get cart from memory
            if(localStorage.getItem('cart')){
                carts = JSON.parse(localStorage.getItem('cart'));
                addCartToHTML();
            }
        });
};


initApp();
})
