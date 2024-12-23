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
    <title>Title</title>
    <link rel="stylesheet" href="../css/shop.css "/>
    <link
        rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'
    />



    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
</head>
<nav>
    <ul>
        <li><a href="home_page.php">Home</a></li>
        <li><a href="../detailes.html">My Account</a></li>
        <li><a href="../#orders">logout</a></li>
    </ul>
</nav>
<body>



<div class="tab__items">
    <div class="tab__item active-tab">
        <div class="products__container grid">
            <?php
            $select_pro = $database->prepare("select * from shop");
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
                                    <img id="productImage" src="../img/<?php echo $fetch_product['image1']; ?>" alt="" class="product__img default">
                                    <img src="../img/<?php echo $fetch_product['image2']; ?>" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    <a href="product-1-<?php echo $count; ?>.html" class="action__btn" aria-label="Quick view">
                                        <i class="fi fi-rs-eye"></i>
                                    </a>
                                    <a href="#" class="action__btn" onclick="addToWishlist()" aria-label="Add To Wishlist">
                                        <i class="fi fi-rs-heart"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Compare">
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
                            <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
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


</body>
</html>