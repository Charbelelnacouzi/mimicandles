

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <title>Checkout</title>
</head>

<body>
  
</section>

<section id="header">
            <a href="#"><img src="pics/logo.jpeg" class="logo" alt=""></a>
            <div>
                <ul id="navbar">
                    <li><a href="index.html">Home</a></li>
                    <li> <a href="shop.html">Shop</a></li>
                    <li><a  href="about.html">About us</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                    <li><a class="active" id="lg-bag" class="lg-bag"><i class="far fa-shopping-bag"></i></a></li>
                    <span id="span">0</span>
                </ul>
            </div>
        </section>
        <div class="checkout-container">
        <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                 <td>Products</td>
                  </tr>
            </thead>
            <tbody id="cartItems" class="ListCart">
          
            </tbody>
            </table>
        </section>
        <div id="total-amount">
            <h3>Total Amount</h3>
            <p id="subtotal">Subtotal: $0</p>
            <p>Delivery Charge: $3</p>
            <p id="total">Total: $0</p>
        </div>
   
        <div id="form-details">
        <form action="send1.php" method="post" id="checkoutForm">

            <h3>Delivery Information</h3>
            Name: <input type="text" placeholder="Your Name" name="name" required><br>
            Address: <input type="text" placeholder="Your Address" name="address" required><br>
            Phone Number: <input type="tel" placeholder="Phone Number" name="phone"><br>
            <input type="hidden" name="cartItems" id="cartItemsInput" value="">

            <button class="normal" type="submit" name="send">Proceed to deliver</button>
            </form>
        </div>
    
    <section id="product1" class="section-p1" hidden>
    <div id="listProduct">
        <div class="pro">
            <img src="pics/bear.jpeg" alt="">
            <h2>Name Product</h2>
            <div class="price">$3</div>
            <button class="addCart">
                Add To Cart
            </button>
        </div>
    </div>
</section>


    <div class="cartTab" hidden>
        <h1>Shopping Cart</h1>
        <div class="ListCart">
      
    </div>
    <div class="btn">
        <button class="close">Close</button>
        <button class="checkout"  onclick="window.location.href='checkout.php';">Checkout
        </button> 
    </div>
 <script src="app.js"></script>
 
 
 
</body>
</html>