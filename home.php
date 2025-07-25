<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kandu Pinnawala Handicraft Shop</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Floating Masks Background */
    .floating-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      overflow: hidden;
      z-index: 0;
    }

    .floating-bg img {
      position: absolute;
      width: 100px;
      opacity: 0.2;
      animation: float 20s linear infinite;
    }

    .floating-bg img:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
    .floating-bg img:nth-child(2) { top: 50%; left: 20%; animation-delay: 5s; }
    .floating-bg img:nth-child(3) { top: 80%; left: 70%; animation-delay: 2s; }
    .floating-bg img:nth-child(4) { top: 30%; left: 80%; animation-delay: 3s; }
    .floating-bg img:nth-child(5) { top: 60%; left: 40%; animation-delay: 1s; }

    @keyframes float {
      0%   { transform: translateY(0px) rotate(0deg); }
      50%  { transform: translateY(-30px) rotate(10deg); }
      100% { transform: translateY(0px) rotate(0deg); }
    }

    section, .container {
      position: relative;
      z-index: 1;
    }
  </style>
</head>
<body>

<!-- Floating Mask Background -->
<div class="floating-bg">
  <img src="images/home/mask1.png" alt="Mask">
  <img src="images/home/pngtree-sri-lankan-fire-dancer-mask-illustration-style-purple-png-image_3955037-removebg-preview.png" alt="Mask">
  <img src="images/home/mask4.png" alt="Mask">
  <img src="images/home/masks5.png" alt="Mask">
  <img src="images/home/mask2.png" alt="Mask">
</div>

<!-- Slider Section -->
<section id="slider">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
            <div class="item active">
              <div class="col-sm-6">
                <h1><span>KANDU</span> PINNAWALA</h1>
                <h2>Handcrafted with Love</h2>
                <p>Traditional craftsmanship meets modern beauty.</p>
              </div>
              <div class="col-sm-6">
                <img src="images/home/P1230247.jpg" class="girl img-responsive" alt="" />
              </div>
            </div>

            <div class="item">
              <div class="col-sm-6">
                <h1><span>KANDU</span> PINNAWALA</h1>
                <h2>100% Handmade Designs</h2>
                <p>Each item tells a story. Made by local artisans.</p>
              </div>
              <div class="col-sm-6">
                <img src="images/home/WhatsApp Image 2025-07-25 at 11.22.55_95c62fc0.jpg" class="girl img-responsive" alt="" />
              </div>
            </div>

            <div class="item">
              <div class="col-sm-6">
                <h1><span>KANDU</span> PINNAWALA</h1>
                <h2>Authentic Craft Collection</h2>
                <p>Experience the charm of tradition in every product.</p>
              </div>
              <div class="col-sm-6">
                <img src="images/home/WhatsApp Image 2025-07-04 at 16.08.43_3a17b7c3.jpg" class="girl img-responsive" alt="" />
              </div>
            </div>
          </div>

          <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev"><i class="fa fa-angle-left"></i></a>
          <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next"><i class="fa fa-angle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Main Shop Section -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <?php include 'sidebar.php'; ?>
      </div>

      <div class="col-sm-9 padding-right">
        <div class="features_items">
          <h2 class="title text-center">Features Items</h2>
          <?php
            $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
            foreach ($cur as $result) {
          ?>
          <form method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php echo $result->PROPRICE; ?>">
            <input type="hidden" name="PROQTY" value="<?php echo $result->PROQTY; ?>">
            <input type="hidden" name="PROID" value="<?php echo $result->PROID; ?>">

            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="<?php echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                    <h2>&#8369 <?php echo $result->PRODISPRICE; ?></h2>
                    <p><?php echo $result->PRODESC; ?></p>
                    <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                  </div>
                  <div class="product-overlay">
                    <div class="overlay-content">
                      <h2>&#8369 <?php echo $result->PRODISPRICE; ?></h2>
                      <p><?php echo $result->PRODESC; ?></p>
                      <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </div>
                  </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li>
                      <?php
                        if (isset($_SESSION['CUSID'])) {
                          echo '<a href="'.web_root.'customer/controller.php?action=addwish&proid='.$result->PROID.'" title="Add to wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</a>';
                        } else {
                          echo '<a href="#" title="Add to wishlist" class="proid" data-target="#smyModal" data-toggle="modal" data-id="'.$result->PROID.'"><i class="fa fa-plus-square"></i>Add to wishlist</a>';
                        }
                      ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
          <?php } ?>
        </div>

        <!-- Recommended Items -->
        <div class="recommended_items">
          <h2 class="title text-center">Recommended Items</h2>
          <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <?php
                  $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 LIMIT 3";
                  $mydb->setQuery($query);
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                ?>
                <form method="POST" action="cart/controller.php?action=add">
                  <input type="hidden" name="PROPRICE" value="<?php echo $result->PROPRICE; ?>">
                  <input type="hidden" name="PROQTY" value="<?php echo $result->PROQTY; ?>">
                  <input type="hidden" name="PROID" value="<?php echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2>&#8369 <?php echo $result->PRODISPRICE; ?></h2>
                          <p><?php echo $result->PRODESC; ?></p>
                          <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <?php } ?>
              </div>
              <div class="item">
                <?php
                  $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 LIMIT 3,6";
                  $mydb->setQuery($query);
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                ?>
                <form method="POST" action="cart/controller.php?action=add">
                  <input type="hidden" name="PROPRICE" value="<?php echo $result->PROPRICE; ?>">
                  <input type="hidden" name="PROQTY" value="<?php echo $result->PROQTY; ?>">
                  <input type="hidden" name="PROID" value="<?php echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2>&#8369 <?php echo $result->PRODISPRICE; ?></h2>
                          <p><?php echo $result->PRODESC; ?></p>
                          <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
