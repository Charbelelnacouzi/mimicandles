<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mimicandles2</title>
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
                    <li><a  href="shop.html">Shop</a></li>
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
            
            <h2>Visit our home location or contact us today</h2>
        <div>
            <li><i class="fal fa-map"> </i>
            <p>Mount Lebanon Gharfine Saint Rita street Kordahi building</p></li>
            <li><i class="far fa-envelope"></i>
            <p>mimicandles2@hotmail.com</p></li>
            <li><i class="fas fa-phone-alt"></i>
            <p>+961 3 136021 - +961 79 182037</p></li>
            <li><i class="far fa-clock"></i>
            <p>Monday to Saturday: 9.00 am to 5.00 pm</p></li>
        </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13207.04414651052!2d35.65517445688821!3d34.15245526990672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f5b9cbe6ea04b%3A0x5b2725af91f98ad0!2sGharfine!5e0!3m2!1sen!2slb!4v1706715469166!5m2!1sen!2slb" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            
            <p><strong>Address:</strong> Mount Lebanon Gharfine, Saint Rita Street</p>
            <P><strong>Phone:</strong>+961 3 136021 or +961 79 182037 (Whatsapp available)</P>
            
        
        <div >
            <h4>Check and follow our pages for new videos and features</h4>
            <img class="fab fa-instagram" src="pics/instagram icon.png" onclick="window.location.href = 'https://www.instagram.com/mimicandles2/';"></i>
            <img class="fab fa-tiktok" src="pics/tiktoc icon.png" onclick="window.location.href = 'https://www.tiktok.com/@mimicandles2/';"></i>
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
            

  <script src="app.js"></script>
    </body>
</html>