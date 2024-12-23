<?php
session_start();
$username ="root";
$pass ="";
$db="localhost";
$dbn="clothing-store";
$database= new PDO("mysql:host=localhost; dbname=clothing-store",$username,$pass);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/home_page.css "/>


    <link
        rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'
    />



    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />





    <title>Boutique Momen&adham </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

        * {
            box-sizing: border-box;
        }


        body.dark {
            background: grey;
        }

        .checkbox {
            opacity: 0;
            position: absolute;
        }

        .label {
            background-color: #444444;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
            position: relative;
            height: 26px;
            width: 50px;
            transform: scale(1.5);
        }

        .label .ball {
            background-color: #fff;
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 2px;
            height: 22px;
            width: 22px;
            transform: translateX(0px);
            transition: transform 0.2s linear;
        }

        .checkbox:checked + .label .ball {
            transform: translateX(24px);
        }


        .fa-moon {
            color: black;
        }

        .fa-sun {
            color: yellow;
        }

    </style>

    <style>
        /* Your existing CSS styles for the rest of the website */

        /* Styles for the footer */
        .footer {
            background-color: hsl(129,36%,85%);
            color: #555555;
            padding: 30px 0;
        }

        .footer .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .footer__content {
            display: flex;
            justify-content: space-between;
            width: 70%;
        }

        .footer__section {
            flex: 1;
            margin-right: 20px;
        }

        .footer__section h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .footer__section ul {
            list-style: none;
            padding: 0;
        }

        .footer__section ul li {
            margin-bottom: 8px;
        }

        .footer__bottom {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer__bottom p {
            margin: 0;
        }

        .footer__social-icons a {
            color: #0056b3;
            margin-left: 10px;
        }

        /* Add more styling as needed */

    </style>


</head>
<body>
<!-- header-->

<header class="header">
    <div class="header__top">
        <div class="header__container container"><input type="checkbox" class="checkbox" id="chk" />
            <label class="label" for="chk">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
                <div class="ball"></div>
            </label>
            <div class="header__contact">
                <span> +972 595 338 489</span>
                <span> our location</span>
            </div>
            <p class="header__alert-news">
                super vlaue deals - save more with coupons
            </p>
            <a href="../sign-up.html" class="header__top-action">
                 Sgin up

            </a>

        </div>
    </div>

    <nav class="nav container">
        <a href="home_page.php" class="nav__logo">
            <img src="../img/logo.png" alt="" class="nav__logo-img"width="150px" height="100px"/>

        </a>
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">

                <li class="nav__item">
                    <a href="home_page.php" class="nav__link active-link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="shop.php" class="nav__link">Shop</a>
                </li>

                <li class="nav__item">
                    <a href="../detailes.html" class="nav__link">My Account</a>
                </li>

                <li class="nav__item">
                    <a href="../About.html" class="nav__link">About</a>
                </li>

                <li class="nav__item">
                    <a href="../login.html" class="nav__link">Login</a>
                </li>
            </ul>

            <div class="=header__search">
                <input
                    type="text"
                    placeholder="search for items..."
                    class="from input"

                />  <button class="search__btn">

                    <img src="../img/images.png" alt="" />

                </button>

            </div>
        </div>
        <div class="header__user-actions">
            <a href="../SiwhListe.html" class="header__action-btn">
                <img src="../img/love.png" alt="" />
                <span class="count">3</span>
            </a>


            <a href="cart.php" class="header__action-btn">
                <img src="../img/cart.png" alt="" />
                <span class="count">3</span>
            </a>
        </div>

    </nav>
</header>

<section class="home section--lg">
    <div class="home__container container grid">
        <div class="home__contect">
            <span class="home__subtitle">Hot promotions</span>
            <h1 class="home__tittle">
                Fashion Trending <span>Great collection</span>
            </h1>
            <p class="home_description">
                save more with coupons & up to 20% off
            </p>
            <a href="../shop.html" class="btn">Shop Now</a>
        </div>
        <img src="../img/home.png" alt="" class="home__img" />
    </div>
</section>

<section class="categories container section">
    <h3 class="section__title"><span>Popular</span> Categories</h3>

    <?php




        // Fetch categories from the database
        $stmt = $database->prepare("SELECT * FROM type_product");
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


    ?>

    <div class="categories__container swiper">
        <div class="swiper-wrapper">
            <?php foreach ($categories as $category): ?>
                <a href="../<?php echo $category['link']; ?>" class="category__item swiper-slide">
                    <img src="../img/<?php echo $category['image']; ?>" alt="" class="category__img">
                    <h3 class="category__title"><?php echo $category['nametype']; ?></h3>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="swiper-button-next">
            <i class="fi fi-rs-angle-right"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="fi fi-rs-angle-left"></i>
        </div>
    </div>
</section>







<section class="products section container">
    <div class="tab__btns">
        <span class="tab__btn active-tab">Featured</span>
        <span class="tab__btn">Popular</span>
        <span class="tab__btn">New added</span>
    </div>

    <div class="tab__items">
        <div class="tab__item active-tab">
            <div class="products__container grid">
                <?php
                $select_pro = $database->prepare("select * from shirt");
                $result = $select_pro->execute();

                if ($select_pro->rowCount() == 0) {
                    echo "null";
                } else {
                    $count = 0;

                    while ($fetch_product = $select_pro->fetch(PDO::FETCH_ASSOC)) {
                        $count++;
                        ?>
                        <div class="row gy-lg-3">
                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="../details.html" class="product__images">
                                        <img id="productImage" src="../img/<?php echo $fetch_product['image']; ?>" alt="" class="product__img default">
                                        <img src="../img/<?php echo $fetch_product['image1']; ?>" alt="" class="product__img hover">
                                    </a>

                                    <div class="product__actions">
                                        <a href="../product-1-<?php echo $count; ?>.html" class="action__btn" aria-label="Quick view">
                                            <i class="fi fi-rs-eye"></i>
                                        </a>
                                        <a href="" class="action__btn" onclick="addToWishlist()" aria-label="Add To Wishlist">
                                            <i class="fi fi-rs-heart"></i>
                                        </a>
                                        <a href="" class="action__btn" aria-label="Compare">
                                            <i class="fi fi-rs-shuffle"></i>
                                        </a>
                                    </div>

                                    <div class="product__badge light-pink">Hot</div>
                                </div>

                                <div class="product__content"></div>
                                <span class="product__category">Clothing</span>
                                <a href="../details.html">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                </div>
                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$250.85</span>
                                </div>
                                <a href="#" class="action__btn cart__btn" onclick="addToCart(<?php echo $fetch_product['id']; ?>)" aria-label="Add To Cart">
                                    <i class="fi fi-rs-shopping-bag-add"></i>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>



</section>

<footer class="footer">
    <div class="container">
        <div class="footer__content">
            <div class="footer__section">
                <h3>About Us</h3>
                <p>Welcome to Fashion Trending, the epitome of style and elegance founded by the visionary designers Adham Yaqoub and Momen Ramadan.</p>
            </div>

            <div class="footer__section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="myaccount.php">My Account</a></li>
                </ul>
            </div>

            <div class="footer__section">
                <h3>Contact Us</h3>
                <p>Email: adham@gmail.com</p>
                <p>Phone: +972 594 348 312</p>
                <p>Email: momen@gmail.com</p>
                <p>Phone: +972 595 338 489</p>
            </div>
        </div>

        <div class="footer__bottom">
            <p>&copy; 2023 Boutique Momen&adham. All rights reserved.</p>
            <div class="footer__social-icons">
                <a href="https://www.facebook.com/profile.php?id=100034434969996"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script src="../js/wishlist.js"></script>
<script src="../js/home_page.js"></script>

<script>
    const chk = document.getElementById('chk');

    chk.addEventListener('change', () => {
        document.body.classList.toggle('dark');
    });

    // SOCIAL PANEL JS
    const floating_btn = document.querySelector('.floating-btn');
    const close_btn = document.querySelector('.close-btn');
    const social_panel_container = document.querySelector('.social-panel-container');

    floating_btn.addEventListener('click', () => {
        social_panel_container.classList.toggle('visible')
    });

    close_btn.addEventListener('click', () => {
        social_panel_container.classList.remove('visible')
    });
</script>
<script>
    function addToWishlist() {
        // Get the product image source
        const productImageSrc = document.getElementById('wishlistImage').src;

        // Save the product image source to sessionStorage
        sessionStorage.setItem('wishlistImage', productImageSrc);

        // Redirect to the wishlist page
        window.location.href = '../wishlist.html';
    }

    // Check if there's a product image in sessionStorage to display on the wishlist page
    const wishlistImageContainer = document.getElementById('wishlistImage');
    const wishlistImageSrc = sessionStorage.getItem('wishlistImage');

    if (wishlistImageSrc) {
        // Display the product image in the wishlist
        wishlistImageContainer.src = wishlistImageSrc;
    }
</script>

<script>
    function addToCart(productId) {
        // You can use AJAX to send the product ID to the server and add it to the cart
        // For simplicity, I'm using a basic example here

        // Get the product details
        const productDetails = {
            id: productId,
            name: "<?php echo $fetch_product['product_name']; ?>",
            price: "<?php echo $fetch_product['product_price']; ?>",
            image: "<?php echo $fetch_product['product_image']; ?>"
        };

        // Retrieve the existing cart items from sessionStorage
        const existingCartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

        // Check if the product is already in the cart
        const existingProductIndex = existingCartItems.findIndex(item => item.id === productDetails.id);

        if (existingProductIndex !== -1) {
            // Product already in the cart, update quantity
            existingCartItems[existingProductIndex].quantity += 1;
        } else {
            // Product not in the cart, add it
            productDetails.quantity = 1;
            existingCartItems.push(productDetails);
        }

        // Save the updated cart items to sessionStorage
        sessionStorage.setItem('cartItems', JSON.stringify(existingCartItems));

        // Redirect to the cart page
        window.location.href = 'cart.php';
    }
</script>





</body>
</html>