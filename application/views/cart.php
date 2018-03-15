<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>

    <?php include ('head.php') ?>
    <title>Tanuki- Japanis Food</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<style>
    .spinner {
        width: 23px;
    }

    .input-group-btn-vertical {
        position: relative;
        white-space: nowrap;
        width: 1%;
        vertical-align: middle;
        display: table-cell;
    }
    .input-group-btn-vertical > .btn {
        display: block;
        float: none;
        max-width: 100%;
        padding: 7px;
        position: relative;
        border-radius: 0;
        width:25px;
        color:#fff;
        margin-bottom: 0;
        font-size: 12px;
        font-weight: normal;
        line-height: 1.428571429;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        background: #ED1C24;
        border: 1px solid #ED1C24;
        border-radius: 0px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
    }

    .input-group-btn-vertical > .btn:hover {
        background: #fff;
        color: #ED1C24;
        border: 1px solid #ED1C24;
    }

    .input-group-btn-vertical > .btn:first-child {
        border-top-right-radius: 0px;
    }
    .input-group-btn-vertical > .btn:last-child {
        margin-top: -2px;
        border-bottom-right-radius: 0px;
    }
    .input-group-btn-vertical i {
        position: absolute;
        top: 0;
        left: 5px;
    }

    .input-group-btn-vertical > .form-control {
        display: block;
        height: 25px;
        padding: 3px;
        font-size: 14px;
        line-height: 0;
        color: #555;
        vertical-align: middle;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ED1C24;
        border-radius: 0px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
        /* box-shadow: inset 0 1px 1px rgba(0,0,0,0.075); */
        -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
</style>
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
            <li><a href="<?php echo  base_url()?>">Home</a></li>
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
            <div class="box_style_2 hidden-xs" id="help">
                <h2 class="inner">Need <span>Help?</span></h2>
                <i class="icon_lifesaver"></i>
                <a href="tel://+1 703-723-8952" class="phone">+1 703-723-8952</a>
                <!--                <small>Monday to Friday 9.00am - 7.30pm</small>-->

            </div>
            <div class="box_style_1 hidden-xs" id="help">
                <button class="btn btn-sm btn-info" style="width: 100%" href="#0" data-toggle="modal" data-target="#emailResturant">Email Us</button>
            </div>
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
                <h4 class="nomargin_top">Happy Hours<i style="float: right" class="icon_clock_alt "></i></h4>

                <p>Tue-Thur  <br>
                    04.30pm-6.30pm <br></p>


            </div>
            <!-- End box_style_1 -->



        </div><!-- End col-md-3 -->

        <div class="col-md-5">
            <!--				<div class="box_style_2" id="order_process">-->
            <!--					<h2 class="inner">Your order details</h2>-->
            <!--                    --><?php
            //
            //                    ?>
            <!--					--><?php //foreach ($userdata as $ud) { ?>
            <!--                    <div class="form-group">-->
            <!--						<label> Name</label>-->
            <!--						<input type="text" class="form-control" id="firstname_order" name="firstname_order" value="--><?php //echo $ud->name?><!--" placeholder="First name">-->
            <!--					</div>-->
            <!--					<div class="form-group">-->
            <!--						<label>Telephone/mobile</label>-->
            <!--						<input type="number" id="tel_order" name="tel_order" class="form-control" value="--><?php //echo $ud->contactNo?><!--" placeholder="Telephone/mobile">-->
            <!--					</div>-->
            <!--					<div class="form-group">-->
            <!--						<label>Email</label>-->
            <!--						<input type="email" id="email_booking_2" name="email_order" class="form-control" value="--><?php //echo $ud->email?><!--" placeholder="Your email">-->
            <!--					</div>-->
            <!---->
            <!--                    <div class="form-group">-->
            <!--                        <label>Password</label>-->
            <!--                        <input type="password" id="password" name="password" class="form-control" value="--><?php //echo $ud->email?><!--" placeholder="Your Password">-->
            <!--                    </div>-->
            <!--					<div class="form-group">-->
            <!--						<label>Your full address</label>-->
            <!--						<input type="text" id="address_order" name="address_order" class="form-control" value="--><?php //echo $ud->address?><!--" placeholder=" Your full address">-->
            <!--					</div>-->
            <!--					<div class="row">-->
            <!--						<div class="col-md-6 col-sm-6">-->
            <!--							<div class="form-group">-->
            <!--								<label>City</label>-->
            <!---->
            <!--                                <select class="form-control" id="city" name="city" required>-->
            <!--                                    <option value="">Your city</option>-->
            <!--                                    --><?php //foreach ($allCity as $cities){?>
            <!--                                        <option --><?php //if ($ud->fkCity !=null && $ud->fkCity== $cities->id) echo 'selected = "selected"'; ?><!-- value="--><?php //echo $cities->id?><!--">--><?php //echo $cities->name?><!--</option>-->
            <!--                                    --><?php //} ?>
            <!--                                </select>-->
            <!--							</div>-->
            <!--						</div>-->
            <!--						<div class="col-md-6 col-sm-6">-->
            <!--							<div class="form-group">-->
            <!--								<label>Postal code</label>-->
            <!--								<input type="text" id="pcode_oder" name="pcode_oder" class="form-control" value="--><?php //echo $ud->postalCode?><!--" placeholder=" Your postal code">-->
            <!--							</div>-->
            <!--						</div>-->
            <!--					</div>-->
            <!--                    --><?php //} ?>
            <!--					<hr>-->
            <!--					<div class="row">-->
            <!---->
            <!--					</div>-->
            <!--				</div>-->
            <!-- End box_style_1 -->
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

            <form  id="cartcheckout" action="<?php echo base_url()?>Items/checkout" method="post">

            <div style="display: none;" id="Address">

                <?php $ordertype = $this->session->userdata('orderType');$userType = $this->session->userdata('userType');$memberid = $this->session->userdata('memberuserid');
                if($userType !="cus" && ($ordertype=="home" || $ordertype=="take") && empty($memberid)){?>

                <div  class="box_style_2">

                    <h2 class="inner">Delivery Address</h2>

                    <div class="form-group">
                        <label>Telephone/mobile</label>
                        <p><font color="red"> <?php echo form_error('phone'); ?></font></p>
                        <input type="tel" class="form-control" value="<?php echo set_value('phone'); ?>" name="phone" required id="phone" placeholder="Contact No">
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

                </div>
                <?php } ?>
            </div>


        </div><!-- End col-md-6 -->

        <div class="col-md-3" id="sidebar">
            <div class="theiaStickySidebar scrolldiv">
                <div id="cart_box" >
                    <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
                    <table id="cart_table" class="table table_summary">
                        <tbody>
                        <?php	$subtotal = 0 ;foreach ($this->cart->contents() as $c) {
                            ?>
                            <tr>
                                <td>
                                    <div class="input-group spinner">
                                        <div class="input-group-btn-vertical">
                                            <button type="button"  class="btn btn-default" style="" data-panel-id="<?= $c['rowid'] ?>" onclick="plus(this)" value=""><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
                                            <input type="text"  name="qty" id="<?php echo $c['rowid']?>" class="form-control" style="" value="<?php echo $c['qty']?>"/>

                                            <button type="button" class="btn btn-default" data-panel-id="<?= $c['rowid'] ?>" onclick="minus(this)"  style="" value=""><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                                            <!--                                        <span style="cursor: pointer" data-panel-id="--><?//= $c['rowid'] ?><!--" onclick="minus(this)">-</span>-->
                                            <!--                                        <span id="--><?php //echo $c['rowid']?><!--">--><?php //echo $c['qty']?><!--</span>-->
                                            <!--                                        <span style="cursor: pointer" data-panel-id="--><?//= $c['rowid'] ?><!--"  value="+" onclick="plus(this)">+</span>-->
                                            <!--                                        <input type="text" disabled name="qty" id="--><?php //echo $c['rowid']?><!--" style="text-align: center; border-right:none;" value="--><?php //echo $c['qty'];?><!--">-->

                                        </div>
                                    </div>
                                </td>
                                <td> <div style="margin-top: 15px"><?php echo htmlspecialchars($c['name'])?></div>

                                </td>
                                <td> <div style="margin-top: 15px"><?php  if ($c['options']['Size'] == "defualt"){}else
                                        {echo $c['options']['Size'];}?></div>
                                </td>
                                <td>
                                    <div style="margin-top: 15px"><strong class="pull-right"><?php echo $c['subtotal'];?></strong></div>
                                </td>
                            </tr>
                            <?php
                            $subtotal = $subtotal + $c['subtotal'];
                        } ?>
                        </tbody>
                    </table>
                    <hr>
<!--                    <form  id="cartcheckout" action="--><?php //echo base_url()?><!--Items/checkout" method="post">-->
                    <div align="center">
                        <label>Add Order Remarks :</label>

                    <div class="row">
                        <textarea class="col-sm-12" id="orderRemark" name="orderRemark"></textarea>
                    </div>
                        <br>
                        <div align="row">
                            <label class="col-md-4">Tip($) :</label>
                            <input class="col-md-8" id="tip"  onfocusout="tipfunc()"  type="number" name="tip"  required>
                        </div>
                        <br>
                        <hr>
                    <table class="table table_summary" id="total_table">
                        <tbody>
                        <tr>
                            <td>
                                Oder Type <span class="pull-right"><?php if ($this->session->userdata('orderType') == "take"){echo "Pick Up";}else echo $this->session->userdata('orderType') ?></span>
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
                                <span id="total">
                                    <?php $tip = (int)$this->session->userdata('tip'); ?>
                                TOTAL <span class="pull-right" ><?php echo $total = $subtotal+$dfee+$vatt+$tip-$totaldis?></span>
                                <?php $data = array(
                                    'amount' => $total,
                                );
                                $this->session->set_userdata($data); ?>
                                </span>
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

<!--                             <input type="submit" formaction="--><?php //echo base_url()?><!--Items/checkout" class="btn_full" value="Go to checkout">-->
                             <a class="btn_full" onclick="check()">Go to checkout</a>
                         <?php }else if ($this->session->userdata('paymentMethod') != null && $this->session->userdata('paymentMethod') == "credit"){ ?>
                             <a class="btn_full" onclick="orderRemarksandCheckout()">Go to checkout</a>
<!--                             <input type="submit" formaction="--><?php //echo base_url()?><!--OnlinePayment" onsubmit="orderRemarks()" class="btn_full" value="Go to checkout">-->

                         <?php } else { ?>

                             <a class="btn_full" href="#0" onclick="paymentalert()">Go to checkout</a>
                         <?php } ?>

                        </span>
                    </form>
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
<?php include ('emailToResturant.php')?>
<!-- end login logout modal-->

</body>
</html>


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

    function check() {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/checkCartItems")?>',
            data: {},
            cache: false,
            success: function (data) {
                if (data == "0"){
                    alert("Your Cart is Empty! Please Order Some Item First!");
                }else {
                    var phone=document.getElementById('phone').value;
                    var address=document.getElementById('address').value;
                    var city=document.getElementById('city').value;
                    var pcode=document.getElementById('pcode').value;
                    if (phone ==""){
                        alert('please enter delivery phone number');
                    }else if (address ==""){
                        alert('please enter delivery Address');
                    }else if (city ==""){
                        alert('please enter delivery City Name');
                    }else if (pcode ==""){
                        alert('please enter delivery Post Code');
                    }
                    else {
                        document.getElementById("cartcheckout").submit();
                    }

                }
            }
        });


    }
    
    function tipfunc() {
        var tip = document.getElementById("tip").value;
        if(tip <0 ){
            alert("you can not give tip in minus");
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/Tip")?>',
            data: {tip: tip},
            cache: false,
            success: function (data) {
                $('#cart_table').load(document.URL +  ' #cart_table');
                $('#total_table').load(document.URL +  ' #total_table');
                $('#total').load(document.URL +  ' #total');
            }
        });
    }

    function paymentcreditcard() {
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Items/paymentcreditcard")?>',
            cache: false,
            success:function(data)
            {
                $('#checkOut').load(document.URL +  ' #checkOut');
                document.getElementById("Address").style.display = "none";
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
                document.getElementById("Address").style.display = "block";

            }
        });
    }
</script>

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
<script>
    function orderRemarksandCheckout() {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/checkCartItems")?>',
            data: {},
            cache: false,
            success: function (data) {
                if (data == "0"){
                    alert("Your Cart is Empty! Please Order Some Item First!");
                }
                else {

                    var orderRemark=document.getElementById('orderRemark').value;

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url("Items/orderRemarkForCrd")?>' ,
                        data: {'remark':orderRemark,},
                        cache: false,
                        success: function (data) {

                            window.location = '<?php echo base_url()?>OnlinePayment';

                        }
                    });
                }
            }
        });

    }
</script>
<!--<script>-->
<!--    (function($) {-->
<!--        var element = $('.scrolldiv'),-->
<!--            originalY = element.offset().top;-->
<!--        // Space between element and top of screen (when scrolling)-->
<!--        var topMargin = 40;-->
<!--        // Should probably be set in CSS; but here just for emphasis-->
<!--        element.css('position', 'relative');-->
<!--        $(window).on('scroll', function(event) {-->
<!--            var scrollTop = $(window).scrollTop();-->
<!--            element.stop(false, false).animate({-->
<!--                top: scrollTop < originalY-->
<!--                    ? 0-->
<!--                    : scrollTop - originalY + topMargin-->
<!--            }, 300);-->
<!--        });-->
<!--    })(jQuery);-->
<!--</script>-->