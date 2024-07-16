<?php
    include('master.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include('header_file.php'); ?>
   <title>Metronome</title>
</head>

<body>

    <?php include('header.php') ?>

    <main>
        <!-- Page banner area start here -->
        <section class="page-banner bg-image pt-130 pb-130" data-background="assets/images/banner/inner-banner-2.png">
            <div class="container">
                <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">Home</h2>
                <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                    <a href="index.html" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Guitar <i
                            class="fa-regular text-white fa-angle-right"></i></a>
                    <span>Guitar & Equipments</span>
                </div>
            </div>
        </section>
        <!-- Page banner area end here -->

        <!-- Product area start here -->
        <section class="product-area pt-130 pb-130">
            <div class="container">
                <div class="pb-20 bor-bottom shop-page-wrp d-flex justify-content-between align-items-center mb-65">
                    <h2 class="fw-600">Guitar & Equipments</h2>
                    
                </div>
                <div class="row g-4">
                    <div class="col-xl-12 col-lg-8">
                        <div class="row g-4">
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=AcousticGuitar?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/guitar.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/guitar.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=AcousticGuitar?>">Acoustic Guitar</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=ElectricGuitar?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/electric-guitar.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/electric-guitar.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=ElectricGuitar?>">Electric Guitar</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=BassGuitar?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/bass-guitar.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/bass-guitar.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=BassGuitar?>">Bass Guitar</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=ClassicalGuitar?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/classical-guitar.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/classical-guitar.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=ClassicalGuitar?>">Classical Guitar</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=Tuner?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/tuner.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/tuner.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=Tuner?>">Tuner</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=GuitarStraps?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/guitar-strap.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/guitar-strap.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=GuitarStraps?>">Guitar Straps</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=GuiterAmplifier?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/retro.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/retro.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=GuiterAmplifier?>">Amplifier</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=Pickups?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/pickup.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/pickup.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=Pickups?>">Pickups</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=Processor?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/processor.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/processor.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=Processor?>">Processor</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product__item bor">
                                    <!-- <a href="#0" class="wishlist"><i class="fa-regular fa-heart"></i></a> -->
                                    <a href="<?=WirelessSystem?>" class="product__image pt-20 d-block">
                                        <img class="font-image" src="assets/images/product/wireless-system.png"
                                            alt="image">
                                        <img class="back-image" src="assets/images/product/wireless-system.png"
                                            alt="image">
                                    </a>
                                    <div class="product__content">
                                        <h4 class="mb-15"><a class="primary-hover" href="<?=WirelessSystem?>">Wireless System</a></h4>
                                        
                                        

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- <div class="pagi-wrp mt-65">
                            <a href="#0" class="pagi-btn">01</a>
                            <a href="#0" class="pagi-btn active">02</a>
                            <a href="#0" class="pagi-btn ">03</a>
                            <a href="#0" class="fa-regular ms-2 primary-hover fa-angle-right"></a>
                        </div> -->
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Product area end here -->
    </main>
    

    <?php include('footer.php'); ?>

    <?php include('footer_file.php'); ?>
</body>

</html>