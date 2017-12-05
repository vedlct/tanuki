<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>

    <?php include ('head.php') ?>
    <title>Tanuki - Quality Delivery or Take Away Food</title>

</head>

<body>

<!--[if lte IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

<!--<div id="preloader">-->
<!--    <div class="sk-spinner sk-spinner-wave" id="status">-->
<!--        <div class="sk-rect1"></div>-->
<!--        <div class="sk-rect2"></div>-->
<!--        <div class="sk-rect3"></div>-->
<!--        <div class="sk-rect4"></div>-->
<!--        <div class="sk-rect5"></div>-->
<!--    </div>-->
<!--</div>-->
<?php include ('menu.php') ?>

<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_2.jpg" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id="thumb"><img src="<?php echo base_url()?>public/img/thumb_restaurant.jpg" alt=""></div>
            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> ( <small><a href="#0">98 reviews</a></small> )</div>
            <h1>Mexican TacoMex</h1>
            <div><em>Mexican / American</em></div>
            <div><i class="icon_pin"></i> 135 Newtownards Road, Belfast, BT4 1AB - <strong>Delivery charge:</strong> $10, free over $15.</div>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<div id="position">
    <div class="container">
        <ul>
            <li><a href="<?php echo base_url()?>Home">Home</a></li>
            <li><a href="<?php echo base_url()?>Restaurants">RAK's Dishes</a></li>
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
            <div class="box_style_2">
                <h4 class="nomargin_top">Opening time <i class="icon_clock_alt pull-right"></i></h4>
                <ul class="opening_list">

                    <h1>demo</h1>
                </ul>
            </div>
            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box_style_2">
                <h2 class="inner"> Review </h2>


                <?php foreach( $allItem as $items) { ?>
                    <b>Item Name :</b><b style="color: red"><?php echo $items->itemName;?></b>




                <?php foreach ($avgrating as $av){
                    $rating_avg = round($av->userRatings);


                }?>
                <?php
                switch ($rating_avg) {
                    case 1:
                        ?>
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                        <?php
                        break;
                    case 2:
                        ?>
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                        <?php
                        break;
                    case 3:
                        ?>
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                        <?php
                        break;
                    case 4:
                        ?>
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/yellow.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>public/img/blank.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                        <?php
                        break;
                    case 5:
                        ?>
                        <img src="<?php echo base_url()?>img/yellow.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>img/yellow.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>img/yellow.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>img/yellow.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>img/yellow.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                        <?php
                        break;
                    default:
                        ?>
                        <img src="<?php echo base_url()?>img/blank.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>img/blank.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>img/blank.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>img/blank.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                        <img src="<?php echo base_url()?>img/blank.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                        <?php

                }

                ?>



                <?php foreach( $allItem as $items) { ?>
                    <b>Item Name :</b><b style="color: red"><?php echo $items->itemName;?></b>


                <?php }}  ?>

                <?php foreach($userFeedback as $f) { ?>


                <h4><?php echo $f->name ?></h4>
                <?php break; } ?>


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
<!--    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAs_JyKE9YfYLSQujbyFToZwZy-wc09w7s"></script>-->
<!--    <script src="--><?php //echo base_url()?><!--public/js/map_single.js"></script>-->
<!--    <script src="--><?php //echo base_url()?><!--public/js/infobox.js"></script>-->
<!--    <script src="--><?php //echo base_url()?><!--public/js/jquery.sliderPro.min.js"></script>-->
<!--    <script type="text/javascript">-->
<!--        $( document ).ready(function( $ ) {-->
<!--            $( '#Img_carousel' ).sliderPro({-->
<!--                width: 960,-->
<!--                height: 500,-->
<!--                fade: true,-->
<!--                arrows: true,-->
<!--                buttons: false,-->
<!--                fullScreen: false,-->
<!--                smallSize: 500,-->
<!--                startSlide: 0,-->
<!--                mediumSize: 1000,-->
<!--                largeSize: 3000,-->
<!--                thumbnailArrows: true,-->
<!--                autoplay: false-->
<!--            });-->
<!--        });-->
<!--    </script>-->

</body>
</html>