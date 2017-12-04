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
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

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

<!--<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Home</a></li>
            <li><a href="#0">Category</a></li>
            <li>Page active</li>
        </ul>
        <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> Search</a>
    </div>
</div> Position -->

<!-- Content ================================================== -->
<div class="container-fluid margin_60_35">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">

            <div class="box_style_2 hidden-xs info">
                <h4 class="nomargin_top">Open Hours<i style="margin-left:30px;" class="icon_clock_alt "></i></h4>
                <p >
                <p>Tue-Fri Lunch <br>
                    11:30am-2.30pm <br></p>  

                <p>Tue-Thur Dinner <br>
                    4:30pm-10:00pm <br></p>  
                <p>Fri Dinner <br>
                    4:30pm-10:00pm <br></p>  
                <p> Sat 12.00pm-10:00pm <br></p> 
                <p> Sun 12:00pm-9:00pm <br></p> 
                <p>Mon Closed</p>
                </p>
<!--                <hr>
                <h4>Secure payment <i class="icon_creditcard pull-right"></i></h4>
                <p>
                    Lorem ipsum dolor sit amet, in pri partem essent. Qui debitis meliore ex, tollit debitis conclusionemque te eos.
                </p>-->
            </div><!-- End box_style_1 -->

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
                <form method="post" action="<?php echo base_url()?>Items/checkoutguest" onsubmit="return registration()">
                <div class="form-group">
                    <label> Name</label>
                    <p><font color="red"> <?php echo form_error('Name'); ?></font></p>
                    <input type="text" class="form-control" id="Name" value="<?php echo set_value('Name'); ?>" name="Name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <label>Telephone/mobile</label>
                    <p><font color="red"> <?php echo form_error('phone'); ?></font></p>
                    <input type="tel" class="form-control" value="<?php echo set_value('phone'); ?>" name="phone" required id="phone" placeholder="Contact No">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                    <input type="email" class="form-control"name="email" id="email" value="<?php echo set_value('email'); ?>" required placeholder="Email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <p><font color="red"> <?php echo form_error('password'); ?></font></p>
                    <input type="password" class="form-control" value="<?php echo set_value('password'); ?>" name="password" required placeholder="Password"  id="password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <p><font color="red"> <?php echo form_error('conPassword'); ?></font></p>
                    <input type="password" class="form-control" value="<?php echo set_value('conPassword'); ?>" name="conPassword" required placeholder="Confirm password"  id="conPassword">
                </div>
                <div class="form-group">
                    <label>Your full address</label>
                    <p><font color="red"> <?php echo form_error('address'); ?></font></p>
                    <textarea type="text" id="address" name="address" cols="3" rows="3" class="form-control"  required placeholder=" Your full address"><?php echo set_value('address'); ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control" id="city" name="city" required>
                                <option value="">Your city</option>
                                <?php foreach ($allCity as $cities){?>
                                    <option <?php echo set_select('city',  $cities->id, False); ?> value="<?php echo $cities->id?>"><?php echo $cities->name?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Postal code</label>
                            <p><font color="red"> <?php echo form_error('pcode'); ?></font></p>
                            <input type="text" id="pcode" value="<?php echo set_value('pcode'); ?>" name="pcode" class="form-control" required placeholder=" Your postal code">
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

                </div>


            </div><!-- End box_style_1 -->
            <div class="box_style_2">
                <h2 class="inner">Payment methods</h2>
                <div class="payment_select">
                    <label><input type="radio" value="" onclick="paymentcreditcard()" checked name="payment_method" class="">Credit card</label>
                    <i class="icon_creditcard"></i>
                </div>
                <!--End row -->

                <div class="payment_select nomargin">
                    <label><input type="radio" value="" onclick="paymentcash()" name="payment_method" class="">Pay with cash</label>
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
<!--                    <div class="row" id="options_2">-->
<!--                        <h4 align="center">Payment Method</h4>-->
<!--                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">-->
<!--                            <a href="#0" onclick="takeaway()">	<i class="icon_creditcard"></i><br>Cash</a>-->
<!---->
<!--                        </div>-->
<!--                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">-->
<!--                            <a href="#0" onclick="homedelivary()"><i class="icon_wallet"></i><br>Card</a>-->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- Edn options 2 -->

                    <table class="table table_summary" id="total_table">
                        <tbody>
                        <tr>
                            <td>
                                Oder Type <span class="pull-right"><?php echo $this->session->userdata('orderType') ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Subtotal <span class="pull-right"><?php echo $subtotal?></span>
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
								<?php $dfee = 0; $vat = 0; foreach ($charges as $char){
                                    $dfee = $char->deliveryfee;
                                    $vat = $char->vat;
                                }?>
                                <?php echo $dfee ; ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Vat(<?php echo $vat."%"?>) <span class="pull-right"><?php echo  $vatt =($subtotal*$vat)/100?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="total">
                                TOTAL <span class="pull-right"><?php echo $subtotal+$dfee+$vatt-$totaldis?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
<!--                    <a class="btn_full" onclick="registration()" href="--><?php //echo base_url()?><!--Items/checkout">Go to checkout</a>-->
<!--                    <a class="btn_full" type="submit">Go to checkout</a>-->
                    <input type="submit" class="btn_full" value="Go to checkout">
                    </form>
                    <a class="btn_full_outline" href="detail_page.php"><i class="icon-right"></i> Add other items</a>
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
<script src="<?php echo base_url()?>public/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url()?>public/js/common_scripts_min.js"></script>
<script src="<?php echo base_url()?>public/js/functions.js"></script>
<script src="<?php echo base_url()?>public/assets/validate.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="<?php echo base_url()?>public/js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 80
    });
</script>

</body>
</html>


<script>

    function registration() {


            var name = document.getElementById('Name').value;
            var address = document.getElementById('address').value;
            var city = document.getElementById('city').value;
            var postcode = document.getElementById('pcode').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var conPassword = document.getElementById('conPassword').value;

            var phone = document.getElementById('phone').value;

            if (name == "") {
                alert("Name is Required");
                return false;
            }

            if (name.length > 45) {
                alert("User Name should be less than 45 charecter");
                return false;
            }
            if (address == "") {
                alert("Address is Required");
                return false;
            }
            if (address.length > 100) {
                alert("address should be less than 100 charecter");
                return false;
            }
            if (postcode == "") {
                alert("Postal Code is Required");
                return false;
            }
            if (postcode.length > 11) {
                alert("Post Code should be less than 11 charecter");
                return false;
            }
        if (city == "") {
            alert("City is Required");
            return false;
        }
            var chk = /^[0-9]*$/;
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!phone.match(chk)) {
                alert('Please enter a valid Phone number!!');
                return false;
            }
        if (phone == "") {
            alert("Phone is Required");
            return false;
        }
            if (phone.length > 18) {
                alert('Phone number must be less than 18 charecter!!');
                return false;
            }
        if (email == "") {
            alert("Email is Required");
            return false;
        }
            if (!email.match(mailformat)) {
                alert("You have entered an invalid email address!");
                return false;
            }
        if (password == "") {
            alert("Password is Required");
            return false;
        }
        if (conPassword == "") {
            alert("Confirm Password is Required");
            return false;
        }

            if (password!=conPassword){
                alert('Password and confirm Password does not match');
                return false;
            }
            else {

                return true;
            }


    }

</script>

<script>
    function paymentcreditcard() {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Items/paymentcreditcard/")?>',
            cache: false,
            success:function(data)
            {
                //  $('#cart_table').load(document.URL +  ' #cart_table');
                // $('#total_table').load(document.URL +  ' #total_table');
            }

        });

    }
    function paymentcash() {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Items/paymentcash/")?>',
            cache: false,
            success:function(data)
            {
                //   $('#cart_table').load(document.URL +  ' #cart_table');
                //  $('#total_table').load(document.URL +  ' #total_table');
            }

        });

    }
</script>