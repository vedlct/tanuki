<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>

    <?php include ('head.php') ?>
    <title>Tanuki- Japanis Food</title>

</head>

<body>

<!--[if lte IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

<div id="preloader">
    <div class="sk-spinner sk-spinner-wave" id="status">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<?php include ('menu.php') ?>

<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_2.jpg" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            
            <div id=""><img src="<?php echo base_url()?>public/img/tanuki.png"  height="150px" alt=""></div>
            <div><i class="icon_pin"></i> 44260 Ice Rink Plz
                Ste 118 Ashburn, VA 20147 </div>
            
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<div id="position">
    <div class="container">
        <ul>
            <li><a href="<?php echo base_url()?>">Home</a></li>
            <li><a href="<?php echo base_url()?>Item_Menu/show_menu/9">Item Menu</a></li>
            <li><a href="<?php echo $this->uri->segment(3); ?>">Item Review</a></li>
            <li>Page active</li>
        </ul>

    </div>
</div><!-- Position -->

<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
</div><!-- End Map -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        <div class="col-md-4">
            <p>
                <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
            </p>
            <div align="center" class="box_style_2 hidden-xs info">
                <h4 class="nomargin_top">Open Hours<i style="float: right" class="icon_clock_alt "></i></h4>

                <p>Tue-Fri <b>Lunch</b> <br>
                    11:30am-2.30pm <br></p>

                <p>Tue-Thur <b> Dinner</b> <br>
                    4:30pm-10:00pm <br></p>
                <p>Fri <b>Dinner</b> <br>
                    4:30pm-10:00pm <br></p>
                <p> Sat 12.00pm-10:00pm <br></p>
                <p> Sun 12:00pm-9:00pm <br></p>
                <p>Mon <b>Closed </b></p>



            </div>
            <div class="box_style_2 hidden-xs" id="help">
                <h2 class="inner">Need <span>Help?</span></h2>
                <i class="icon_lifesaver"></i>
                <a href="tel://+1 703-723-8952" class="phone">+1 703-723-8952</a>
                <!--                <small>Monday to Friday 9.00am - 7.30pm</small>-->
            </div>
        </div>

        <div class="col-md-8">
            <div class="box_style_2">
                <h2 class="inner"> Review </h2>


                <?php foreach($userFeedback as $f) { ?>


                <div class="review_strip_single">

                    <p>
                    <h2><?php echo $f->itemName ?></h2>
                    <h4><?php echo $f->name ?> Said</h4>


                    <small>  - <?php echo $f->feedbackTime ?></small>
                    </p>


                    <p><?php echo $f->feedback ?></p>
                    <p>User Rating:<?php echo $f->userRating ?> </p>


                </div>
<?php } ?>

            </div>
            <!-- End box_style_1 -->
        </div>
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->


<!-- Footer ================================================== -->
<!-- Footer ================================================== -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-3">
                <h3>Secure payments with</h3>
                <p><img src="<?php echo base_url() ?>public/img/cards.png" alt="" class="img-responsive"></p>

            </div>
            <div class="col-md-3 col-sm-3">
                <h3>About</h3>
                <ul>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="faq.php">Faq</a></li>
                    <li><a href="contacts.php">Contacts</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#login_2">Admin Login</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#register">Register</a></li>
                    <li><a href="#0">Terms and conditions</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3"  id="newsletter">
                <h3>Newsletter</h3>
                <p>Join our newsletter to keep be informed about offers and news.</p>
                <div id="message-newsletter_2"></div>
                <form method="post" action="<?php echo base_url()?>Feedback/newReview" name="newsletter_2" id="newsletter_2">
                    <div class="form-group">
                        <input name="email_newsletter_2" id="email_newsletter_2"  type="email" value=""  placeholder="Your mail" class="form-control">
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <input type="submit" value="Subscribe" class="btn_1" id="submit-newsletter_2">
                </form>
            </div>
            <div class="col-md-2 col-sm-3">
                <h3>Settings</h3>
                <div class="styled-select">
                    <select class="form-control" name="lang" id="lang">
                        <option value="English" selected>English</option>
                        <option value="French">French</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Russian">Russian</option>
                    </select>
                </div>
                <div class="styled-select">
                    <select class="form-control" name="currency" id="currency">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="RUB">RUB</option>
                    </select>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#0"><i class="icon-facebook"></i></a></li>
                        <li><a href="#0"><i class="icon-twitter"></i></a></li>
                        <li><a href="#0"><i class="icon-google"></i></a></li>
                        <li><a href="#0"><i class="icon-instagram"></i></a></li>
                        <li><a href="#0"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#0"><i class="icon-vimeo"></i></a></li>
                        <li><a href="#0"><i class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>© <b>R A K</b> - 2017</p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</footer>
<!-- End Footer =============================================== --><!-- End Footer =============================================== -->
</div>
<div class="layer"></div><!-- Mobile menu overlay mask -->

<?php include ('login_logout.php')?>





<!-- COMMON SCRIPTS -->
<?php include ('js.php')?>

<!-- SPECIFIC SCRIPTS -->
<!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAs_JyKE9YfYLSQujbyFToZwZy-wc09w7s"></script>-->
<!--<script src="--><?php //echo base_url()?><!--public/js/map_single.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--public/js/infobox.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--public/js/jquery.sliderPro.min.js"></script>-->
<!--<script type="text/javascript">-->
<!--    $( document ).ready(function( $ ) {-->
<!--        $( '#Img_carousel' ).sliderPro({-->
<!--            width: 960,-->
<!--            height: 500,-->
<!--            fade: true,-->
<!--            arrows: true,-->
<!--            buttons: false,-->
<!--            fullScreen: false,-->
<!--            smallSize: 500,-->
<!--            startSlide: 0,-->
<!--            mediumSize: 1000,-->
<!--            largeSize: 3000,-->
<!--            thumbnailArrows: true,-->
<!--            autoplay: false-->
<!--        });-->
<!--    });-->
<!--</script>-->

</body>
</html>