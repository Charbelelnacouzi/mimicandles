<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mimishop</title>
        <link rel="icon" href="pics/logo.jpeg">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <section id="container1">
        <section id="header">
            <a href="#"><img src="pics/logo.jpeg" class="logo" alt=""></a>
            <div>
                <ul id="navbar">
                    <li><a  href="index.html">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn" id="shopLink">Shop</a>
                        <div class="dropdown-content" id="shopDropdown">
                            <a href="shop.html?type=candles">Candles</a>
                            <a href="bags.html?type=bags">Bags</a>
                        </div>
                    </li>
                    <li><a href="about.html">About us</a></li>
                    <li><a class="active" href="contact.html">Contact us</a></li>
                    <li><a id="lg-bag" class="lg-bag"><i class="far fa-shopping-bag"></i></a></li>
                    <span id="span">0</span>
                </ul>
            </div>
        </section>
       
        <section id="page-header" class="about-header">
            <h1>#Let's talk</h1>
            <p>Feel free to reach us by sending a message for any product and project  you need to make !</p>
        </section>
       <section id="contact-details" class="section-p1">
        <div class="details">
            
            <h2>Contact us today</h2>
        <div>
       
            <li><i class="far fa-envelope"></i>
            <p>mememe168@outlook.com</p></li>
            <li><i class="fas fa-phone-alt"></i>
            <p>+961 3 136021 - +961 79 182037</p></li>
           
        </div>
        </div>
       
       </section>
       <section id="form-details">
       <form action="send.php" method="post">
    <span>LEAVE A MESSAGE</span>
    <h2>We love to hear from you</h2>
    Name: <input type="text" placeholder="Your Name" name="name" required><br>
    Phone Number: <input type="tel" placeholder="Phone Number" name="phone"><br>
    Subject: <input type="text" placeholder="Subject" name="Subject" required><br>
    Message: <textarea name="message" cols="30" rows="10" placeholder="Your Message" required></textarea><br>
    <button class="normal" type="submit" name="send">Submit</button>
</form>
        <div class="people">
            <div>
                
            </div>
        </div>
       </section>
       <footer class="section-p1">
        <div class="col">
            <img src="pics/logo.jpeg" alt="">
            
        
            <P><strong>Phone:</strong>+961 3 136021 or +961 79 182037 (Whatsapp available)</P>
            
            <div >
            <h4>Check and follow our pages of candles</h4>
            <img class="fab fa-instagram" src="pics/instagram icon.png" onclick="window.location.href = 'https://www.instagram.com/mimicandles2/';"></i>
            <img class="fab fa-tiktok" src="pics/tiktoc icon.png" onclick="window.location.href = 'https://www.tiktok.com/@mimicandles2/';"></i>
            <h4>Check and follow our page of bags</h4>
            <img class="fab fa-instagram" src="pics/instagram icon.png" onclick="window.location.href = 'https://www.instagram.com/k_knitables/';"></i>
            

        </div>
    </div>
       </footer>
       <!-- Include product listing HTML with hidden attribute -->
<section id="product1" class="section-p1" hidden>
    <div id="listProduct">
        <div class="pro">
            <img src="pics/bear.jpeg" alt="">
            <h2>Name Product</h2>
            <div class="price">$3</div>
            <label for="colorSelection">Select Color:</label>
            <input type="color" id="colorSelection" name="colorSelection" value="#ffffff">

            <button class="addCart">
                Add To Cart
            </button>
        </div>
    </div>
</section>
       <div class="cartTab">
        <h1>Cart</h1>
        <div class="ListCart">
      
    </div>
    <div class="btn">
        <button class="close">Close</button>
        <button class="checkout"  onclick="window.location.href='checkout.php';">Checkout
        </button> 
            </section>
            
            <script>
        document.addEventListener('DOMContentLoaded', function () {
            const shopLink = document.getElementById('shopLink');
            const shopDropdown = document.getElementById('shopDropdown');
    
            shopLink.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default link behavior
                shopDropdown.classList.toggle('show');
            });
        });
    </script>
  <script src="app.js"></script>
 
    </body>
</html>