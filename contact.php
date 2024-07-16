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
                <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s">Contact Us</h2>
                <div class="breadcrumb-list wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                    <a href="index.html" class="primary-hover"><i class="fa-solid fa-house me-1"></i> Home <i
                            class="fa-regular text-white fa-angle-right"></i></a>
                    <span>Contact Us</span>
                </div>
            </div>
        </section>
        <!-- Page banner area end here -->

        <!-- Contact form area start here -->
        <section class="contact pt-130 pb-130">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="content radius-10 bg-image">
                            <h2>Have something in mind? <br>
                                Let's talk.</h2>
                            <p>Feel free to contact us. We will connect in no time and solve all your queries.</p>
                            <div class="arry"><img src="assets/images/contact/arry.png" alt=""></div>
                            <ul>
                                <li><a href="https://www.google.com/maps/d/viewer?mid=1UZ57Drfs3SGrTgh6mrYjQktu6uY&amp;hl=en_US&amp;ll=18.672105000000013%2C105.68673800000003&amp;z=17"
                                        target="_blank"><i class="fa-solid fa-location-dot"></i>Shop # 309, Third Floor, The Address, Commercia, Shankar Kalat Nagar, Wakad, Pune, Pimpri-Chinchwad, Maharashtra 411057</a>
                                </li>
                                <li><a href="tel:9175921299"><i class="fa-solid fa-phone-volume"></i>9175921299</a>
                                </li>
                                <li><a href="mailto:jam.metronome@gmail.com"><i
                                            class="fa-solid fa-envelope"></i>jam.metronome@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-area">
                            <form action="#0">
                                <input type="text" placeholder="Name">
                                <input type="email" placeholder="Email">
                                <input type="tel" placeholder="Phone No">
                                <!--<select name="subject" id="subject">-->
                                <!--    <option value="0">Select Subject</option>-->
                                <!--    <option value="0">Account</option>-->
                                <!--    <option value="0">Service</option>-->
                                <!--    <option value="0">Pricing</option>-->
                                <!--    <option value="0">Support</option>-->
                                <!--</select>-->
                                <textarea name="Your Review" id="massage" placeholder="Message..."></textarea>
                                <div class="radio-btn mt-2">
                                    <span></span>
                                    <p>I accept your terms & conditions</p>
                                </div>
                                <button class="mt-40 btn-one"><span>Submit Now</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact form area end here -->

        <!-- Contact map area start here -->
        <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.564380413749!2d73.75432697563988!3d18.593668066936416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b931a6832601%3A0xf0fac17ea3744ec6!2sMetronome%20%7C%20Music%20Store%20In%20Wakad%20%7C%20Guitar%20Shop%20In%20Wakad%20%7C%20Musical%20Instrument%20Store%20%7C%20Piano%20Shop%20In%20Wakad!5e0!3m2!1sen!2sin!4v1714975920120!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- Contact map area end here -->
    </main>
    

    <?php include('footer.php'); ?>

    <?php include('footer_file.php'); ?>
</body>

</html>