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
<!--                    --><?php //foreach ($details as $e){?>
<!--                        --><?php //echo $e->time ?>
<!--                    --><?php //}?>

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
                <h2 class="inner">Description</h2>

<!--                --><?php //foreach ($details as $e){?>
<!--                    --><?php ////echo $e->description;
//                    //echo $this->session->userdata['username'];?>
<!--                --><?php //}?>

                <h2>Demo2</h2>


                <div id="summary_review">
                    <div id="general_rating">
                        11 Reviews



                    </div>


                    <div class="row" id="rating_summary">


                    </div><!-- End row -->

<!--                    --><?php //if($this->session->userdata('loggedin')=="true"){
//                    $username=$this->session->userdata('username');
//                    $usertype=$this->session->userdata('type');
//                    if($usertype=="User"){
//
//                    ?>

                    <hr class="styled">
                    <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">Leave a review</a>
                </div><!-- End summary_review -->

<!--            --><?php //}}else{?>

<!--                <hr class="styled">-->
<!--                <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#login_2">Leave a review</a>-->
<!--            </div>-->
<!--<!--            --><?php ////}?>


<!--            --><?php //foreach($comments as $c){  ?>
                <?php $i=1; foreach($userFeedback as $f) { ?>

                <div class="review_strip_single">

                    <h4><?php echo $f->name ?></h4>

                        <p>
                            <?php echo $f->feedback ?>
                            <small>   <?php echo $f->feedbackTime ?></small>
                        </p>
                        <p><?php echo $f->userRating?></p>




                        <!--
                            <div class="review_strip_single">
                                <img src="<?php echo base_url() ?>img/avatar3.jpg" alt="" class="img-circle">
                                <small> - 25 March 2015 -</small>
                                <h4>Markus Schulz</h4>
                                <p>
                                    "At sed dico invenire facilisis, sed option sapientem iudicabit ad, sea idque doming vituperatoribus at. Duo ut inani tantas scaevola. Commodo oblique at cum. Duo id vide delectus. Vel et doctus laoreet minimum, ei feugait pertinacia usu.
                                </p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                                        </div>
                                        Food Quality
                                    </div>
                                    <div class="col-md-3">
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                                        </div>
                                        Price
                                    </div>
                                    <div class="col-md-3">
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                                        </div>
                                        Punctuality
                                    </div>
                                    <div class="col-md-3">
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                        </div>
                                        Courtesy
                                    </div>
                                </div><!-- End row
                            </div><!-- End review strip -->

                        <?php  $i++;}	?>


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

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="<?php echo base_url()?>Home/login" class="popup-form" id="myLogin" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" class="form-control form-white" placeholder="Username" name="username" >
                <input type="password" class="form-control form-white" placeholder="Password" name="password">
                <div class="text-left">
                    <a href="#" data-toggle="modal" data-target="#forgot_pass" onclick="forgot_pass()">Forgot Password?</a>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <button type="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div><!-- End modal -->
<!-- forgot pass modal -->
<div class="modal fade" id="forgot_pass" tabindex="-1" role="dialog" aria-labelledby="forgot_password" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="<?php echo base_url()?>Home/forgot_pass" class="popup-form" id="forgot_pass" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <label ><h3 style="color: white">Please Enter Your Email Address<h3></label>
                <input type="email" class="form-control form-white" placeholder="Email" name="email">
                <div class="text-left">
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <button type="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    function forgot_pass() {
        document.getElementById("login_2").style.display = 'none';
    }
</script>


<!-- Register modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="<?php echo base_url()?>Registration" class="popup-form" id="myRegister" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" class="form-control form-white" placeholder="Name" name="Name">

                <input type="email" class="form-control form-white" placeholder="Email" name="Email">
                <input type="text" class="form-control form-white" id="Username" placeholder="UserName" name="UserName" onclick="hidediv()" onfocusout="myFunc()">
                <div style="display: none" id="alerttext"><span style="color: red"> UserName Already Taken</span></div>

                <input type="text" class="form-control form-white" placeholder=" Your full address" name="full_address"  >
                <input type="text" class="form-control form-white" placeholder=" Your phone number" name="phone_number"  >
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <input type="text"  name="city" class="form-control form-white" placeholder="Your city">

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input type="text"  name="postal_code" class="form-control form-white" placeholder="Your postal code">

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input type="text"  name="state" class="form-control form-white" placeholder="State">

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input type="text"  name="country" class="form-control form-white" placeholder="Country">

                    </div>
                </div>

                <input type="text" class="form-control form-white" placeholder="Password"  id="password1"name="password1">
                <input type="text" class="form-control form-white" placeholder="Confirm password"  id="password2"name="password2">
                <div id="pass-info" class="clearfix"></div>
                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        <input type="checkbox" value="accept_2" id="check_2" name="check_2" />
                        <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                    </div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <button type="submit" class="btn btn-submit" name="confirmregistration">Register</button>
            </form>
        </div>
    </div>
</div><!-- End Register modal -->

<!-- Review modal -->
<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>

            <form method="post" action="<?php echo base_url() ?>Feedback/newReview" name="review" id="review" class="popup-form">
                <div class="login_icon"><i class="icon_comment_alt"></i></div>
<!--                --><?php //foreach ($res_details as $e){?>

                <input name="restaurant_name" id="restaurant_name" type="hidden" value="Mexican Taco Mex">

<!--                <input name="re_id" id="re_id" type="text" value="--><?php //echo $e->id ?><!--" style="color: black">-->



<!--                --><?php //}?><!---->-->

<!--                --><?php //$query5 =$this->db->query(" select `id` from `restaurant` ");
//                foreach ($query5->result() as $v ){$id=$v->id;}
//                ?>

<!--                <input name="res_id" id="res_id" type="hidden" value="--><?php //echo $id ?><!--" style="color: black">-->


                <textarea name="review_text" id="review_text" class="form-control form-white" style="height:100px" placeholder="write review" ></textarea>
                <input type="text" name="verify_review" id="verify_review" class="form-control form-white" placeholder="Are you human? 3 + 1 =">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="submit" value="Submit" class="btn btn-submit" id="submit-review">
            </form>
            <div id="message-review"></div>
        </div>
    </div>
</div><!-- End Register modal -->
	<!-- End Search Menu -->

<!-- COMMON SCRIPTS -->
<script src="<?php echo base_url()?>public/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url()?>public/js/common_scripts_min.js"></script>
<script src="<?php echo base_url()?>public/js/functions.js"></script>
<script src="<?php echo base_url()?>public/assets/validate.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAs_JyKE9YfYLSQujbyFToZwZy-wc09w7s"></script>
<script src="<?php echo base_url()?>public/js/map_single.js"></script>
<script src="<?php echo base_url()?>public/js/infobox.js"></script>
<script src="<?php echo base_url()?>public/js/jquery.sliderPro.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function( $ ) {
		$( '#Img_carousel' ).sliderPro({
			width: 960,
			height: 500,
			fade: true,
			arrows: true,
			buttons: false,
			fullScreen: false,
			smallSize: 500,
			startSlide: 0,
			mediumSize: 1000,
			largeSize: 3000,
			thumbnailArrows: true,
			autoplay: false
		});
	});
</script>

</body>
</html>