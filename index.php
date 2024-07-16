<?php
    include('master.php');
    
    if(!empty($_GET['showmessage'])){
        //echo '<script>alert("Order Approved Successfull!...");window.location.href = "https://www.themetronome.store/index.php";</script>';
    }
    
    // echo '<script>window.location.href = "https://www.themetronome.store/jamroom.php";</script>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include('header_file.php'); ?>
   <title>Metronome</title>
</head>

<body>
    <script>
        window.location.href = "jamroom.php";
    </script>

    <?php include('header.php') ?>


    <main>
        
        <!-- Banner area start here -->
        <section class="banner-area pb-130">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="banner__item">
                            <div class="image">
                                <img src="assets/images/banner/home-banner.jpg" alt="image">
                            </div>
                            <div class="banner__content">
                                <h5 class="wow fadeInUp" data-wow-delay=".1s"><img src="assets/images/icon/fire.svg"
                                        alt="icon"> Book <span class="primary-color">Jam Room</span> Now & 
                                </h5>
                                <h1 class="wow fadeInUp" data-wow-delay=".2s">Find everything <br>
                                    for <span class="primary-color">Jamming</span></h1>
                                <a class="btn-one wow fadeInUp mt-65" data-wow-delay=".3s" href="#here"><span>Explore
                                        Now</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="swiper product__slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product__slider-item bor">
                                        <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a>
                                        <a href="shop-single.html" class="product__image pt-20 d-block">
                                            <img src="assets/images/product/product-image1.png" alt="image">
                                        </a>
                                        <div class="product__content">
                                            <h4 class="mb-15"><a class="primary-hover"
                                                    href="shop-single.html">Disposable
                                                    Sub-Ohm Tank</a></h4>
                                            <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                            <div class="star mt-20">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__slider-item bor">
                                        <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a>
                                        <a href="shop-single.html" class="product__image pt-20 d-block">
                                            <img src="assets/images/product/product-image2.png" alt="image">
                                        </a>
                                        <div class="product__content">
                                            <h4 class="mb-15"><a class="primary-hover" href="shop-single.html">POP Extra
                                                    Strawberry</a></h4>
                                            <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                            <div class="star mt-20">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__slider-item bor">
                                        <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a>
                                        <a href="shop-single.html" class="product__image pt-20 d-block">
                                            <img src="assets/images/product/product-image3.png" alt="image">
                                        </a>
                                        <div class="product__content">
                                            <h4 class="mb-15"><a class="primary-hover"
                                                    href="shop-single.html">Concentrate Vaporizers</a></h4>
                                            <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                            <div class="star mt-20">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dot product__dot mt-40"></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <section class="product-area pb-130" id="here">
            <div class="container">
                <div
                    class="product__wrp pb-30 mb-65  d-flex flex-wrap align-items-center justify-content-xl-between justify-content-center" style="padding-top: 20px;">
                    <div class="section-header wow fadeInUp d-flex align-items-center" data-wow-delay=".1s">
                        <span class="title-icon mr-10"></span>
                        <h2>latest arrival products</h2>
                    </div>
                    <!-- <ul class="nav nav-pills mt-4 mt-xl-0">
                        <li class="nav-item">
                            <a href="#latest-item" data-bs-toggle="tab" class="nav-link wow fadeInUp px-4 active"
                                data-wow-delay=".1s">
                                latest item
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#top-ratting" data-bs-toggle="tab"
                                class="nav-link wow fadeInUp px-4 bor-left bor-right" data-wow-delay=".2s">
                                top ratting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#featured-products" data-bs-toggle="tab" class="nav-link wow fadeInUp ps-4"
                                data-wow-delay=".3s">
                                featured products
                            </a>
                        </li>
                    </ul> -->
                </div>
                <div class="row g-4">
                    
                    <div class="col-xl-12 col-lg-12">
                        <div class="tab-content">
                            <div id="latest-item" class="tab-pane fade show active">
                                <div class="row g-4">
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"></a> -->
                                            <a href="<?=Guitar?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/guitar.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/guitar.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover"
                                                        href="<?=Guitar?>">Guitar</a></h4>
                                                
                                                <!-- <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Drums?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/drums-new.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/drums-new.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover"
                                                        href="<?=Drums?>">Drums</a></h4>
                                                

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/violin2.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/violin2.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Violin?>">Violin</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a>
                                            <a href="<?=Ukulele?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/ukulele.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/ukulele.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover"
                                                        href="<?=Ukulele?>">Ukulele</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Cymbals?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/cymbals.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/cymbals.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Cymbals?>">Cymbals</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Keyboard?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/keyboard.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/keyboard.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Keyboard?>">Keyboard/Piano/MIDI</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Precussion?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/precussion.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/precussion.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Precussion?>">Precussion</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Saxophone?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/saxophone.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/saxophone.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Saxophone?>">Saxophone</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Microphone?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/microphone.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/microphone.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Microphone?>">Microphone</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=StudioMonitor?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/studio-monitor.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/studio-monitor.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=StudioMonitor?>">Studio Monitor</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Cables?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/cables.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/cables.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Cables?>">Cables</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Iem?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/iem.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/iem.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Iem?>">IEM</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="product__item bor">
                                            <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                            <a href="<?=Strings?>" class="product__image pt-20 d-block">
                                                <img class="font-image" src="assets/images/product/guitar-strings.png"
                                                    alt="image">
                                                <img class="back-image" src="assets/images/product/guitar-strings.png"
                                                    alt="image">
                                            </a>
                                            <div class="product__content">
                                                <h4 class="mb-15"><a class="primary-hover" href="<?=Strings?>">Strings</a></h4>
                                                <!-- <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
                                                <div class="star mt-20">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div> -->

                                            </div>
                                            <!-- <a class="product__cart d-block bor-top" href="#0"><i
                                                    class="fa-regular fa-cart-shopping primary-color me-1"></i>
                                                <span>Add to
                                                    cart</span></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product area end here -->

       

        <!-- Testimonial area start here -->
        <section class="testimonial pt-130 pb-130">
            <div class="container">
                <div class="testimonial__wrp bor radius-10">
                    <div class="testimonial__head-wrp bor-bottom pb-65 pt-65 pl-65 pr-65">
                        <div class="section-header d-flex align-items-center wow fadeInUp" data-wow-delay=".1s">
                            <span class="title-icon mr-10"></span>
                            <h2>customers speak for us</h2>
                        </div>
                        <div class="arry-btn my-4 my-lg-0">
                            <button class="arry-prev testimonial__arry-prev wow fadeInUp" data-wow-delay=".2s"><i
                                    class="fa-light fa-chevron-left"></i></button>
                            <button class="ms-3 active arry-next testimonial__arry-next wow fadeInUp"
                                data-wow-delay=".3s"><i class="fa-light fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="pt-45 pb-45 pr-55">
                        <div class="row g-4 align-items-center justify-content-between">
                            <div class="col-lg-7">
                                <div class="swiper testimonial__slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial__item pl-65">
                                                <div class="testi-header mb-30">
                                                    <div class="testi-content">
                                                        <h3>Manasi Jadhav</h3>
                                                        <!-- <span>marketing manager</span> -->
                                                    </div>
                                                    <i class="fa-solid fa-quote-right"></i>
                                                </div>
                                                <p>Beautiful aesthetics, very professional and experienced staff. They were genuinely helpful and not just for money.</p>
                                                <div class="star mt-30">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial__item pl-65">
                                                <div class="testi-header mb-30">
                                                    <div class="testi-content">
                                                        <h3>Hrishikesh Wagle</h3>
                                                        <!-- <span>Garden Maker</span> -->
                                                    </div>
                                                    <i class="fa-solid fa-quote-right"></i>
                                                </div>
                                                <p>Amazing store owner and the staff is very friendly. They actually motivate you in playing different instruments. Plus good quality gear makes it an amazing experience</p>
                                                <div class="star mt-30">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="testimonial__image">
                                    <div class="swiper testimonial__slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="assets/images/testimonial/google.png" alt="image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="assets/images/testimonial/google.png" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial area end here -->

        


        <!-- Blog area start here -->
        <section class="blog pt-130 pb-130 sub-bg">
            <div class="container">
                <div class="blog__head-wrp mb-65">
                    <div class="section-header d-flex align-items-center wow fadeInUp" data-wow-delay=".1s">
                        <span class="title-icon mr-10"></span>
                        <h2>our latest blog</h2>
                    </div>
                    <a href="" class="btn-two primary-hover mt-4 mt-md-0 wow fadeInUp"
                        data-wow-delay=".3s"><span>view all blog</span></a>
                </div>
                <div class="row g-4">
                    <div class="col-xl-8">
                        <div class="blog__item-left">
                            <div class="swiper blog__slider">
                                <div class="swiper-wrapper">
                                    <!-- <div class="swiper-slide">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="blog__item-left-content">
                                                    <span class="blog__tag">vapers</span>
                                                    <h3><a href="blog-single.html">roup of young volunteers
                                                            park. they are vapeing</a></h3>
                                                    <p>vapers planting is the act of planting young vaperss, shrubs, or
                                                        other woody
                                                        plants into the
                                                        ground to establish new
                                                        vapes.</p>
                                                    <span class="blog__item-left-content-info">By <strong
                                                            class="me-3">Max
                                                            Trewhitt</strong> 2
                                                        weeks ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="image">
                                                    <img class="radius-10" src="assets/images/blog/blog-image1.png"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- class="swiper-slide" -->
                                    <div class="">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="blog__item-left-content">
                                                    <span class="blog__tag">Guitar</span>
                                                    <h3><a href="blog-single.html">Guide to buying intermideate or advanced guitar.</a></h3>
                                                    <p>Once you’ve been playing guitar for a while, you’ve probably thought about upgrading to something a little more professional than a beginner guitar, either for a better sound, additional features or maybe just for better comfort of playing.</p>
                                                    <span class="blog__item-left-content-info">By <strong>Metronome</strong> 2
                                                        weeks ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="image">
                                                    <img class="radius-10" src="assets/images/blog/guitar.png"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="blog__item-left-dot-wrp">
                                <div class="dot blog__dot"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 d-block d-md-none d-xl-block">
                        <div class="blog__item-right">
                            <a href="blog-single.html" class="image d-block">
                                <img class="radius-10" src="assets/images/blog/guitar-2.png" alt="image">
                            </a>
                            <h3><a href="blog-single.html">Best Methods for Learning to Play Guitar</a>
                            </h3>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="blog__tag">Guitar</span>
                                <span>2 weeks ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog area end here -->

        <!-- Brand area start here -->
        <section class="brand-area pt-130 pb-130">
            <div class="container">
                <div class="sub-title text-center mb-65">
                    <h3><span class="title-icon"></span> top brands <span class="title-icon"></span>
                    </h3>
                </div>
                <div class="swiper brand__slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center ">
                                <img src="assets/images/brand/brand1.jpg" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center ">
                                <img src="assets/images/brand/brand-2.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center ">
                                <img src="assets/images/brand/brand-3.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center ">
                                <img src="assets/images/brand/brand-4.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center ">
                                <img src="assets/images/brand/brand-5.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center ">
                                <img src="assets/images/brand/brand-6.png" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Brand area end here -->
    </main>

    <?php include('footer.php'); ?>

    <?php include('footer_file.php'); ?>
</body>

</html>