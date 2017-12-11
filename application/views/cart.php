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
    </div><!-- End Preload -->
    
    <!-- Header ================================================== -->
    <?php include ('menu.php') ?>
	<!-- End Header =============================================== -->

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
    	<div id="sub_content">
    	 <h1>Place your order</h1>
            <div class="bs-wizard">
                <div class="col-xs-4 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Your details</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#0" class="bs-wizard-dot"></a>
                </div>
                               
                <div class="col-xs-4 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Payment</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="cart_2.php" class="bs-wizard-dot"></a>
                </div>
            
              <div class="col-xs-4 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum"><strong>3.</strong> Finish!</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="cart_3.php" class="bs-wizard-dot"></a>
                </div>  
		</div><!-- End bs-wizard --> 
        </div><!-- End sub_content -->
	</div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Home</a></li>
                <li><a href="#0">Tanuki's Dishes</a></li>
                <li>Page active</li>
            </ul>

        </div>
    </div><!-- Position -->

<!-- Content ================================================== -->
<div class="container-fluid margin_60_35">
		<div class="row">
            <div class="col-md-1"></div>
			<div class="col-md-2">

                <div align="center" class="box_style_2 hidden-xs info">
                    <h4 class="nomargin_top">Open Hours<i style="float: right" class="icon_clock_alt "></i></h4>
                    <p >
                    <p>Tue-Fri <b>Lunch</b> <br>
                        11:30am-2.30pm <br></p>

                    <p>Tue-Thur <b> Dinner </b> <br>
                        4:30pm-10:00pm <br></p>
                    <p>Fri <b>Dinner </b><br>
                        4:30pm-10:00pm <br></p>
                    <p> Sat 12.00pm-10:00pm <br></p>
                    <p> Sun 12:00pm-9:00pm <br></p>
                    <p>Mon <b>Closed</b></p>
                    </p>

                </div>
                <!-- End box_style_1 -->

                <div class="box_style_2 hidden-xs" id="help">
                    <i class="icon_lifesaver"></i>
                    <h4>Need <span>Help?</span></h4>
                    <a href="tel://004542344599" class="phone">+1 703-723-8952</a>

                </div>
                
			</div><!-- End col-md-3 -->
            
			<div class="col-md-5">
				<div class="box_style_2" id="order_process">
					<h2 class="inner">Your order details</h2>
                    <?php

                    ?>
					<?php foreach ($userdata as $ud) { ?>
                    <div class="form-group">
						<label> Name</label>
						<input type="text" class="form-control" id="firstname_order" name="firstname_order" value="<?php echo $ud->name?>" placeholder="First name">
					</div>
					<div class="form-group">
						<label>Telephone/mobile</label>
						<input type="number" id="tel_order" name="tel_order" class="form-control" value="<?php echo $ud->contactNo?>" placeholder="Telephone/mobile">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email_booking_2" name="email_order" class="form-control" value="<?php echo $ud->email?>" placeholder="Your email">
					</div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="form-control" value="<?php echo $ud->email?>" placeholder="Your Password">
                    </div>
					<div class="form-group">
						<label>Your full address</label>
						<input type="text" id="address_order" name="address_order" class="form-control" value="<?php echo $ud->address?>" placeholder=" Your full address">
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>City</label>
<!--								<input type="text" id="city_order" name="city_order" class="form-control" value="--><?php //echo $ud->fkCity?><!--" placeholder="Your city">-->
                                <select class="form-control" id="city" name="city" required>
                                    <option value="">Your city</option>
                                    <?php foreach ($allCity as $cities){?>
                                        <option <?php if ($ud->fkCity !=null && $ud->fkCity== $cities->id) echo 'selected = "selected"'; ?> value="<?php echo $cities->id?>"><?php echo $cities->name?></option>
                                    <?php } ?>
                                </select>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Postal code</label>
								<input type="text" id="pcode_oder" name="pcode_oder" class="form-control" value="<?php echo $ud->postalCode?>" placeholder=" Your postal code">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Delivery Day</label>
								<select class="form-control" name="delivery_schedule_day" id="delivery_schedule_day">
									<option value="" selected>Select day</option>
									<option value="Today">Today</option>
									<option value="Tomorrow">Tomorrow</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Delivery time</label>
								<select class="form-control" name="delivery_schedule_time" id="delivery_schedule_time">
									<option value="" selected>Select time</option>
									<option value="11.30am">11.30am</option>
									<option value="11.45am">11.45am</option>
									<option value="12.15am">12.15am</option>
									<option value="12.30am">12.30am</option>
									<option value="12.45am">12.45am</option>
									<option value="01.00pm">01.00pm</option>
									<option value="01.15pm">01.15pm</option>
									<option value="01.30pm">01.30pm</option>
									<option value="01.45pm">01.45pm</option>
									<option value="02.00pm">02.00pm</option>
									<option value="07.00pm">07.00pm</option>
									<option value="07.15pm">07.15pm</option>
									<option value="07.30pm">07.30pm</option>
									<option value="07.45pm">07.45pm</option>
									<option value="08.00pm">08.00pm</option>
									<option value="08.15pm">08.15pm</option>
									<option value="08.30pm">08.30pm</option>
									<option value="08.45pm">08.45pm</option>
								</select>
							</div>
						</div>
                        <?php } ?>
					</div>
					<hr>
					<div class="row">

					</div>
				</div><!-- End box_style_1 -->
                <div class="box_style_2">
                    <h2 class="inner">Payment methods</h2>
                    <div class="payment_select">
                        <label><input type="radio" value="1" onclick="paymentcreditcard()"  name="payment_method" class="">Credit card</label>
                        <i class="icon_creditcard"></i>
                    </div>
                    <!--End row -->

                    <div class="payment_select nomargin">
                        <label><input type="radio" value="2" onclick="paymentcash()" name="payment_method" class="">Pay with cash</label>
                        <i class="icon_wallet"></i>
                    </div>
                </div>
			</div><!-- End col-md-6 -->
            <div class="col-md-3" id="sidebar">
                <div class="theiaStickySidebar">
                    <div id="cart_box" >
                        <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
                        <table id="cart_table" class="table table_summary">
                            <tbody>
                            <?php	$subtotal = 0 ;foreach ($this->cart->contents() as $c) {

                                ?>
                                <tr>
                                    <td>
                                        <input type="button"  class="btn btn-default" style="background:#ec008c; text-align: center; width:19px; color: #fff; font-weight: bold; padding:6px 0px;  border-radius:0px; float: left" data-panel-id="<?= $c['rowid'] ?>" onclick="minus(this)" value="-"/>
                                        <input type="text"  name="qty" id="<?php echo $c['rowid']?>" class="form-control" style="text-align: center; border-right:none; border-left:none; border-radius:0px; width: 20px; padding:6px 2px; height:auto; float: left" value="<?php echo $c['qty']?>"/>
                                        <input type="button" class="btn btn-default"data-panel-id="<?= $c['rowid'] ?>" onclick="plus(this)"  style="background:#ec008c; font-weight: bold; color: #fff; text-align: center; border-radius:0px; width: 19px; padding: 6px 0px; float: left" value="+">
                                    </td>
                                    <td><?php echo htmlspecialchars($c['name'])?></td>
                                    <td> <?php  if ($c['options']['Size'] == "defualt"){}else
                                        {echo $c['options']['Size'];}?></td>
                                    <td>
                                        <strong class="pull-right"><?php echo $c['subtotal'];?></strong>
                                    </td>
                                </tr>
                                <?php

                                $subtotal = $subtotal + $c['subtotal'];
                            } ?>
                            </tbody>
                        </table>
                        <hr>


                        <table class="table table_summary" id="total_table">
                            <tbody>
                            <tr>
                                <td>
                                    Oder Type <span class="pull-right"><?php echo $this->session->userdata('orderType') ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Subtotal <span class="pull-right"><?php echo $subtotal - $this->session->userdata('expensepoint')?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Discount <span class="pull-right">
<!--                                --><?php //if ( $this->session->userdata('discount') == null)
                                        //							{ echo 0.00;} else{
                                        //									echo $this->session->userdata('discount');
                                        //								} ?><!-- </span>-->
                                        <?php $totaldis = 0 ;foreach ($this->cart->contents() as $c){
                                            $totaldis= ((float)$c['coupon'])+ ((float)$totaldis);
                                        } echo $totaldis;?>
                            </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Delivery fee <span class="pull-right">
								<?php $dfee = 0; $vat = 0;
                                if ($this->session->userdata('orderType') == "home"){
                                    foreach ($charges as $char){
                                        $dfee = $char->deliveryfee;
                                    } } else?>
                                <?php echo $dfee ; ?></span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <?php foreach ($charges as $char){
                                        $vat = $char->vat;
                                    }?>
                                    <?php $subtotal = $subtotal -$this->session->userdata('expensepoint'); ?>
                                    sales tax(<?php echo $vat."%"?>) <span class="pull-right"><?php echo  $vatt =round(($subtotal*$vat)/100 , 2)?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="total">
                                    TOTAL <span class="pull-right"><?php echo $total = $subtotal+$dfee+$vatt-$totaldis?></span>
                                     <?php $data = array(

                                    'amount' => $total,
                                    );
                                    $this->session->set_userdata($data); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <?php
                        foreach ($earnpoint  as $ep){ $earn = $ep->earnspoint;}
                        foreach ($exensepoint  as $exp){ $expense = $exp->expenspoint;}
                        ?>
                        <div>
                        <h4 style="color: red; width: 50%">Your Total Points : <?php  $totalpoint = $earn - $expense ;
                            if ($totalpoint <0 ){ echo 0;}else { echo $totalpoint;}
                            ?></h4>
                            <?php if ($totalpoint >100) { ?>
                        <button style="float: right; margin-top: -40px" class="btn btn-sm btn-success" onclick="usepoints()">Use Points</button>
                            <?php } ?>
                        </div>
                        <hr>

                        <span id="checkOut">


                         <?php  if ($this->session->userdata('paymentMethod') != null && $this->session->userdata('paymentMethod') == "cash"){ ?>
                        <a class="btn_full" href="<?php echo base_url()?>Items/checkout">Go to checkout</a>
                         <?php }else if ($this->session->userdata('paymentMethod') != null && $this->session->userdata('paymentMethod') == "credit"){ ?>
                             <a class="btn_full" href="<?php echo base_url()?>Items/checkoutforcredit" >Go to checkout</a>

                        <?php } else { ?>

                        <a class="btn_full" href="#0" onclick="paymentalert()">Go to checkout</a>
                        <?php } ?>

                        </span>
                        <a class="btn_full_outline" href="<?php echo base_url()?>Items"><i class="icon-right"></i> Add other items</a>
                    </div><!-- End cart_box -->
                </div><!-- End theiaStickySidebar -->
            </div>

		</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
	<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

    <!-- login logout modal-->
    <?php include ('login_logout.php')?>
    <!-- end login logout modal-->
    
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
    <?php include ('js.php')?>

<!-- SPECIFIC SCRIPTS -->
<!--<script src="--><?php //echo base_url()?><!--public/js/theia-sticky-sidebar.js"></script>-->
<!--<script>-->
<!--    jQuery('#sidebar').theiaStickySidebar({-->
<!--      additionalMarginTop: 80-->
<!--    });-->
<!--</script>-->
<script>
    function paymentcreditcard() {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Items/paymentcreditcard")?>',
            cache: false,
            success:function(data)
            {
                $('#checkOut').load(document.URL +  ' #checkOut');
            }

        });

    }
    function paymentcash() {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Items/paymentcash")?>',
            cache: false,
            success:function(data)
            {

                $('#checkOut').load(document.URL +  ' #checkOut');
            }

        });

    }
</script>

</body>
</html>

<script>
    function minus(x) {

        var btn = $(x).data('panel-id');
        var x = parseInt(document.getElementById(btn).value);
        var newx= x-1;

        document.getElementById(btn).value = newx;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/updateCart/")?>' + btn,
            data: {'id':btn, 'amount':newx },
            cache: false,
            success: function (data) {
                // $('#txt').html(data);
                //  alert(data);
                $('#cart_table').load(document.URL +  ' #cart_table');
                $('#total_table').load(document.URL +  ' #total_table');
            }

        });

    }
    function plus(x) {

        var btn = $(x).data('panel-id');

        var x = parseInt(document.getElementById(btn).value);
        var newx= x+1;

        document.getElementById(btn).value = newx;
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/updateCart/")?>' + btn,
            data: {'id':btn, 'amount':newx },
            cache: false,
            success: function (data) {
                // $('#txt').html(data);
                $('#cart_table').load(document.URL +  ' #cart_table');
                $('#total_table').load(document.URL +  ' #total_table');

            }

        });


    }

    function usepoints() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/usepoints/")?>' ,
            cache: false,
            success: function (data) {
                // $('#txt').html(data);
                $('#cart_table').load(document.URL +  ' #cart_table');
                $('#total_table').load(document.URL +  ' #total_table');
       // alert(data);
            }

        });

    }

    function paymentalert() {
        alert("please select the payment method")
    }
    $(function() {  $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 250) {
            document.getElementById("logo").style.display = "block";
        } else {
            document.getElementById("logo").style.display = "none";
        }

    });
    });
</script>