<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
    
    <?php include ('head.php') ?>
    <title>RAK - Quality Delivery or Take Away Food</title>

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
    </div><!-- End Preload -->
    
    <!-- Header ================================================== -->
    <?php include ('menu.php') ?>
	<!-- End Header =============================================== -->

    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_short.jpg" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
             <h1>Contacts</h1>
             <p>Qui debitis meliore ex, tollit debitis conclusionemque te eos.</p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Home</a></li>
                <li><a href="#0">Category</a></li>
                <li>Page active</li>
            </ul>
            <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> Search</a>
        </div>
    </div><!-- Position -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
	<div class="row" id="contacts">
    	<div class="col-md-6 col-sm-6">
        	<div class="box_style_2">
            	<h2 class="inner">Customer service</h2>
                <p class="add_bottom_30">Adipisci conclusionemque ea duo, quo id fuisset prodesset, vis ea agam quas. <strong>Lorem iisque periculis</strong> id vis, no eum utinam interesset. Quis voluptaria id per, an nibh atqui vix. Mei falli simul nusquam te.</p>
                <p><a href="tel://004542344599" class="phone"><i class="icon-phone-circled"></i>  +45 423 445 70</a></p>
                <p class="nopadding"><a href="mailto:customercare@quickfood.com"><i class="icon-mail-3"></i> customercare@quickfood.com</a></p>
            </div>
    	</div>
        <div class="col-md-6 col-sm-6">
        	<div class="box_style_2">
            	<h2 class="inner">Restaurant Support</h2>
                <p class="add_bottom_30">Quo ex rebum petentium, cum alia illud molestiae in, pro ea paulo gubergren. Ne case constituto pro, ex vis delenit complectitur, per ad <strong>everti timeam</strong> conclusionemque. Quis voluptaria id per, an nibh atqui vix.</p>
                <p><a href="tel://004542344599" class="phone"><i class="icon-phone-circled"></i>  +45 423 445 99</a></p>
                <p class="nopadding"><a href="mailto:customercare@quickfood.com"><i class="icon-mail-3"></i> support@quickfood.com</a></p>
            </div>
    	</div>
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
	<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->   
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<form action="#" class="popup-form" id="myLogin">
                	<div class="login_icon"><i class="icon_lock_alt"></i></div>
					<input type="text" class="form-control form-white" placeholder="Username">
					<input type="text" class="form-control form-white" placeholder="Password">
					<div class="text-left">
						<a href="#">Forgot Password?</a>
					</div>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div><!-- End modal -->   
    
<!-- Register modal -->   
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<form action="#" class="popup-form" id="myRegister">
                	<div class="login_icon"><i class="icon_lock_alt"></i></div>
					<input type="text" class="form-control form-white" placeholder="Name">
					<input type="text" class="form-control form-white" placeholder="Last Name">
                    <input type="email" class="form-control form-white" placeholder="Email">
                    <input type="text" class="form-control form-white" placeholder="Password"  id="password1">
                    <input type="text" class="form-control form-white" placeholder="Confirm password"  id="password2">
                    <div id="pass-info" class="clearfix"></div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="accept_2" id="check_2" name="check_2" />
							<label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Register</button>
				</form>
			</div>
		</div>
	</div><!-- End Register modal -->
    
     <!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_close"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon-search-6"></i>
			</button>
		</form>
	</div>
	<!-- End Search Menu -->
    
<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<script src="assets/validate.js"></script>

</body>
</html>