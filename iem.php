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
                <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">More</h2>
                <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                    <a href="index.html" class="primary-hover"><i class="fa-solid fa-house me-1"></i> More <i
                            class="fa-regular text-white fa-angle-right"></i></a>
                    <span>IEM</span>
                </div>
            </div>
        </section>
        <!-- Page banner area end here -->

        <!-- Blog area start here -->
        <section class="blog pt-130 pb-130">
            <div class="container">
            <div class="section-header wow fadeInUp d-flex align-items-center" style="padding-bottom: 25px;" data-wow-delay=".1s">
            <span class="title-icon mr-10"></span>
                    <h3 class="fw-600">Checkout the IEM from top brands</h3>
                    </div>
                </div>
                <div class="row g-4">
                
                    <div class="col-lg-3 col-md-6">
                        <div class="blog__item-right">
                            <a class="image d-block" target="_blank" target="_blank">
                                <img class="radius-10" src="assets/images/logo/sennheiser.png" alt="image">
                            </a>
                            
                            <div class="d-flex align-items-center justify-content-between" style="padding-top: 20px;">
                                <span class="blog__tag" style="font-weight:700;">Available</span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="blog__item-right">
                            <a class="image d-block" target="_blank" target="_blank">
                                <img class="radius-10" src="assets/images/logo/shure.png" alt="image">
                            </a>
                            
                            <div class="d-flex align-items-center justify-content-between" style="padding-top: 20px;">
                                <span class="blog__tag" style="font-weight:700;">Available</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="blog__item-right">
                            <a class="image d-block" target="_blank" target="_blank">
                                <img class="radius-10" src="assets/images/logo/behringer.png" alt="image">
                            </a>
                            
                            <div class="d-flex align-items-center justify-content-between" style="padding-top: 20px;">
                                <span class="blog__tag" style="font-weight:700;">Available</span>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
                
            </div>
        </section>
        <!-- Blog area end here -->
    </main>
    

    <?php include('footer.php'); ?>

    <?php include('footer_file.php'); ?>
</body>

</html>