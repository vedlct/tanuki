<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>

    <?php include ('head.php') ?>
    <title>Tanuki- Japanis Food</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>

<body id="body">

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
<section  style="width: 100%;  background-image:url('<?php echo base_url()?>public/img/sub_header_2.jpg');background-repeat:no-repeat;background-size:cover;">
    <div id="subheader">
        <div id="sub_content">
            <div id=""><img src="<?php echo base_url()?>public/img/tanuki.png"  height="190px" alt=""></div>
            <!--                     <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="<?php echo base_url() ?>feedback">Read Items reviews</a></small>)</div>-->


            <!--        <h1 style="font-weight:bold; color:#ED1C24;">Tanuki</h1>-->
            <!--        <div><em>Japanese Restaurant</em></div>-->
            <div><i class="icon_pin"></i> 44260 Ice Rink Plz
                Ste 118 Ashburn, VA 20147 </div>
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
<div id="myDIV" class="container-fluid margin_60_35">

    <div class="row">

        <?php if ($this->session->flashdata('errorMessage')!=null){?>
            <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
        <?php }
        elseif($this->session->flashdata('successMessage')!=null){?>
            <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
        <?php }?>

        <div class="col-md-1"></div>
        <div class="col-md-2">
            <div class="box_style_2 hidden-xs" id="help">
                <h2 class="inner">Need <span>Help?</span></h2>
                <i class="icon_lifesaver"></i>
                <a href="tel://+1 703-723-8952" class="phone">+1 703-723-8952</a>
                <!--                <small>Monday to Friday 9.00am - 7.30pm</small>-->
            </div>
            <div class="box_style_1">



                <ul id="cat_nav">
                    <?php foreach ($allcategory as $cate) {?>
                        <li><a href="#<?php echo $cate->id ?>" class="active"><?php echo $cate->name ?></a></li>

                    <?php } ?>
                </ul>
            </div><!-- End box_style_1 -->


        </div><!-- End col-md-3 -->

        <div class="col-md-5">
            <div class="box_style_2" id="main_menu">
                <h2 class="inner">Menu</h2>
                <?php foreach ($allcategory as $cate) {?>

                <table class="table table-striped cart-list">
                    <thead>
                    <tr>
                        <th width="60%">
                            Item
                        </th>

                        <th width="30%">
                            Price
                        </th>
                        <th width="10%">
                            Order
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($allitem as $item) { ?>
                        <?php if ($item->fkCatagory == $cate->id) {?>
                            <h3 class="nomargin_top" id="<?php echo $cate->id?>"><?php echo $cate->name?></h3>
                            <div style="margin-bottom: 5px"><?php echo $cate->description ?></div>
                            <?php break;}}?>


                    <?php foreach ($allitem as $item) { ?>
                        <?php if ($item->fkCatagory == $cate->id){?>

                            <tr>

                                <td width="">
                                    <div class="left-img">
                                        <?php if ($item->image == null){?>


                                            <figure class="thumb_menu_list"><img width="60px" height="60px" src="<?php echo base_url()?>public/img/noImage.jpg" alt="thumb"></figure>
                                        <?php }else{?>
                                            <figure class="thumb_menu_list">
                                                <!--<img height="80px" width="80px" src="--><?php //echo base_url()?><!--admin/images/itemImages/--><?php //echo $item->image?><!-- " alt="image">-->
                                                <img width="60px" height="60px" src="<?php echo base_url('admin/images/itemImages/'.thumb('admin/images/itemImages/'.$item->image,'60','60')); ?>" alt="thumb">

                                            </figure>
                                        <?php }?>
                                    </div>

                                    <div class="right-content">
                                        <h5><a href="<?php echo base_url()?>Feedback/getReview/<?php echo $item->id?>"style="cursor: pointer"> <?php echo $item->itemName?></a></h5>

                                        <p>
                                            <?php echo $item->description?>
                                        </p>

                                        <!-- rating code -->

                                        <div style="margin-bottom: 30px">
                                            <?php foreach ($avgrating as $av){
                                                if ( $item->id == $av->fkItemId){
                                                    $rating_avg = round($av->userRatings);
                                                    if( $rating_avg>3)
                                                    {
                                                        switch ($rating_avg) {
                                                            case 1:
                                                                ?>
                                                                <img src="<?php echo base_url()?>public/img/yellow.png"  height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"   height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"  height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"  height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png" height="22px"width="20px" style="float: left">

                                                                <?php
                                                                break;
                                                            case 2:
                                                                ?>
                                                                <img src="<?php echo base_url()?>public/img/yellow.png"  height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png"  height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"  height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"  height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"  height="22px" width="20px" style="float: left">

                                                                <?php
                                                                break;
                                                            case 3:
                                                                ?>
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"  height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"  height="22px"width="20px" style="float: left">

                                                                <?php
                                                                break;
                                                            case 4:
                                                                ?>
                                                                <img src="<?php echo base_url()?>public/img/yellow.png"  height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png"  height="22px"width="20px" style="float: left">

                                                                <?php
                                                                break;
                                                            case 5:
                                                                ?>
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/yellow.png" height="22px" width="20px" style="float: left">

                                                                <?php
                                                                break;
                                                            default:
                                                                ?>
                                                                <img src="<?php echo base_url()?>public/img/blank.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png" height="22px"width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png" height="22px" width="20px" style="float: left">
                                                                <img src="<?php echo base_url()?>public/img/blank.png" height="22px" width="20px" style="float: left">

                                                                <?php
                                                        } } }}
                                            ?>
                                        </div>
                                    </div>



                                    <!-- rating code -->

                                </td>
                                <td width="">
                                    <strong><?php echo $item->price?></strong>
                                </td>
                                <td class="options" width="10%">
                                    <div class="dropdown dropdown-options">
                                        <?php foreach ($alldefault as $defualt){?>
                                            <?php if ($item->id == $defualt->fkItemId) {?>
                                                <?php if ($defualt->itemSize == "default" && $defualt->itemsizeStatus == "1" ) {?>
                                                    <a href="#0"> <i class="icon_plus_alt2"  data-panel-id="<?= $item->id ?>" onclick="addcart(this)"></i></a>
                                                <?php } else { ?>
                                                    <a href="#" class="dropdown-toggle"   data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                                <?php	} } }?>


                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <?php foreach ($allitemsize as $itemsize) { ?>
                                                <?php if ($itemsize->fkItemId == $item->id && $itemsize->itemSize != "default") { ?>
                                                    <label>
                                                        <input type="checkbox"id="check1" value="<?php echo $itemsize->id?>" class="chk" name="options_1"><?php echo $itemsize->itemSize?><span> $<?php echo $itemsize->price?> </span>
                                                    </label>
                                                <?php } }?>
                                            <a href="#0" class="add_to_basket" onclick="addcartwithitemsize()">Add to cart</a>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php }  ?>
                    </tbody>
                </table>
                    <br>
                <?php } ?>


            </div><!-- End box_style_1 -->
        </div><!-- End col-md-6 -->
        
        
        
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

        <div  id="ordert" class="ordercart" style="position:fixed; top:0; left: 62%; cursor:pointer;">
            <i class="icon_cart_alt"></i> <span id="topcart">(<?php echo $this->cart->total_items();?>)</span>
        </div>
        
        

        <div style="position: sticky; top: 70px;" class="col-md-3 " id="sidebar">
            <div class="theiaStickySidebar scrolldiv cf">
                <div id="cart_box" >
                    <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
                    <div class="makescroll">
                        <table style="height: 50px; overflow: scroll ;" id="cart_table" class="table table_summary">
                            <tbody class="giveheight">
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

                                    <td> <div style="margin-top: 20px"><?php echo htmlspecialchars($c['name'])?></div>

                                    </td>
                                    <td> <div style="margin-top: 20px"><?php  if ($c['options']['Size'] == "defualt"){}else
                                        {echo $c['options']['Size'];}?></div>
                                    </td>
                                    <td>
                                        <div style="margin-top: 20px"><strong class="pull-right"><?php echo $c['subtotal'];?></strong></div>
                                    </td>

                                </tr>
                                <?php
                                $subtotal = $subtotal + $c['subtotal'];
                            } ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if ($this->session->userdata('userType') == "cus" || $this->session->userdata('userType') == null  ) { ?>
                        <hr>
                        <div class="row" id="options_2">
                            <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a style="cursor: pointer" onclick="takeaway()"><img style="width: 40px; height: 40px" src="<?php echo base_url()?>public/img/takeaway.jpg"><br>Pick Up</a>
                            </div>
                            <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a style="cursor: pointer;" onclick="homedelivary()"><img style="width: 40px;height: 40px; " src="<?php echo base_url()?>public/img/homedeli.png"><br>Delivery</a>
                            </div>
                        </div>
                    <?php }else {
                        $data = array(
                            'orderType' => "have",
                        );
                        $this->session->set_userdata($data);
                    } ?>


                    <hr>
                    <?php if ($this->session->userdata('userType') != "cus" && $this->session->userdata('userType') != null  ) { ?>
                        <div class="row" id="options_2">
                            <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a style="cursor: pointer" onclick="takeaway()"><img style="width: 40px; height: 40px" src="<?php echo base_url()?>public/img/takeaway.jpg"><br>Pick Up</a>
                            </div>
                            <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a style="cursor: pointer;" onclick="homedelivary()"><img style="width: 40px;height: 40px; " src="<?php echo base_url()?>public/img/homedeli.png"><br>Delivery</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row" id="options_2">
                            <div style="text-align: center; " class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Membership ID :</label>

                                <input class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="memberid" type="textbox" value="" name="option_2"  onfocusout="membershipid()" >
                            </div>
                            <div style="text-align: center" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
<!--                           <input type="button" value="New User">-->
                                <button class="btn btn-sm default" href="#0" onclick="newUser(this)">New User</button>
                            </div>
                        </div>
                    <?php } else if ($this->session->userdata('userType') == null) { ?>
                        <div style="text-align: center" class="row" id="options_2">

                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Promo Code :</label>

<!--                            <input class="col-md-6" style="margin-left: 10px" id="promocode" type="textbox" value=""  name="option_2"  onfocusout="discount()" >-->
                            <input class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-left: 10px" id="promocode" type="textbox" value=""  name="option_2"  onfocusout="discount()" >

                        </div>
                    <?php } else { ?>
                        <div style="text-align: center" class="row" id="options_2">

                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Promo Code :</label>

                            <input class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="promocode" type="textbox" value=""  name="option_2"  onfocusout="discount()" >

                        </div>
                        <!-- Edn options 2 -->
                    <?php } ?>
                    <hr>
                    <table style="margin-bottom :2px;" class="table table_summary" id="total_table">
                        <tbody>
                        <tr>
                            <td>
                                Oder Type <span class="pull-right"><?php if ($this->session->userdata('orderType') == "take"){echo "Pick Up";}else if ($this->session->userdata('orderType')=="home"){echo "Delivery";}else echo $this->session->userdata('orderType');?></span>
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
								<?php $dfee = 0; $vat = 0;
                                if ($this->session->userdata('orderType') == "home"){
                                    foreach ($charges as $char){
                                        $dfee = $char->deliveryfee;
                                    }
                                    $data = array(
                                        'deliveryfee' => $dfee ,
                                    );
                                    $this->session->set_userdata($data);
                                } else?>
                                <?php echo $dfee ;
                                $data = array(
                                    'deliveryfee' => $dfee ,
                                );
                                $this->session->set_userdata($data);
                                ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php foreach ($charges as $char){
                                    $vat = $char->vat;
                                }?>
                                sales tax(<?php echo $vat."%"?>) <span class="pull-right"><?php echo  $vatt =round((($subtotal-$totaldis)*$vat)/100, 2)?></span>
                                <?php
                                $data = array(
                                    'vat' => $vatt,
                                );
                                $this->session->set_userdata($data);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="total">
                                TOTAL <span class="pull-right"><?php echo $subtotal+$dfee+$vatt-$totaldis?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div id="ordertypediv">
                        <?php if($this->session->userdata('orderType') != null ){ ?>
                            <a class="btn_full" href="<?php echo base_url()?>Items/cart">Order now</a>
                        <?php }else { ?>
                            <a class="btn_full" style="cursor: pointer" onclick="orderwarning()">Order now</a>
                        <?php } ?>
                    </div>
                </div><!-- End cart_box -->
            </div><!-- End theiaStickySidebar -->
        </div>
        <!-- End col-md-3 -->

    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<?php include ('login_logout.php')?>
<!-- COMMON SCRIPTS -->

</body>
</html>

<?php include ('js.php')?>


<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<script>

    $.fn.scrollView = function () {
        return this.each(function () {
            $('html').animate({
                scrollTop: $(this).offset().top
            }, 1000);
        });
    }
    
    $('.ordercart').click(function (event) {
        event.preventDefault();
        //$('#sidebar').scrollView();
        $('#sidebar')[0].scrollIntoView(true);
    });
    
</script>



<script>
    function addcart(x) {
        //alert("hellasdasdado");
        btn = $(x).data('panel-id');
        //alert(btn);
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Items/insertCart/")?>'+btn,
            data:{'id':btn},
            cache: false,
            success:function(data)
            {
                $('#cart_table').load(document.URL +  ' #cart_table');
                $('#total_table').load(document.URL +  ' #total_table');
                $('#topcart').load(document.URL +  ' #topcart');
            }
        });
    }
    function minus(x) {
        var btn = $(x).data('panel-id');
//        var xx = parseInt(document.getElementById(btn).innerHTML);
        var xx = parseInt(document.getElementById(btn).value);
        var newx= xx-1;
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
                $('#topcart').load(document.URL +  ' #topcart');
            }
        });
    }
    function plus(x) {
        var btn = $(x).data('panel-id');
//        var xx = parseInt(document.getElementById(btn).innerHTML);
        var xx = parseInt(document.getElementById(btn).value);
        var newx= xx+1;
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
                $('#topcart').load(document.URL +  ' #topcart');
            }
        });
    }
    function addcartwithitemsize() {
        //    alert("hellow");
        var chkArray = [];
        var i;
        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".chk:checked").each(function () {
            chkArray.push($(this).val());
        });
        for (i = 0; i < chkArray.length; i++) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Items/insertItemSizeCart/")?>' + chkArray[i],
                data: {'id': chkArray[i]},
                cache: false,
                success: function (data) {
                    // $('#txt').html(data);
                    //alert(data);
                    $('#cart_table').load(document.URL +  ' #cart_table');
                    $('#total_table').load(document.URL +  ' #total_table');
                    $('#topcart').load(document.URL +  ' #topcart');
                }
            });
            $("input:checkbox").attr('checked', false);
        }
    }
    function discount() {
        var promocode = document.getElementById("promocode").value;
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/promocode/")?>' ,
            data: {'promocode': promocode},
            cache: false,
            success: function (data) {
                if (data == "00"){
                    alert ("Promo code not Valid");
                }else  {
                    $('#cart_table').load(document.URL +  ' #cart_table');
                    $('#total_table').load(document.URL +  ' #total_table');
                    $('#topcart').load(document.URL +  ' #topcart');
                }
            }
        });
    }
    function takeaway() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/takeaway/")?>' ,
            cache: false,
            success: function (data) {
                $('#cart_table').load(document.URL +  ' #cart_table');
                $('#total_table').load(document.URL +  ' #total_table');
                $('#ordertypediv').load(document.URL +  ' #ordertypediv');
                $('#topcart').load(document.URL +  ' #topcart');
            }
        });
    }
    function homedelivary() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/homedelivary/")?>' ,
            cache: false,
            success: function (data) {
                $('#cart_table').load(document.URL +  ' #cart_table');
                $('#total_table').load(document.URL +  ' #total_table');
                $('#ordertypediv').load(document.URL +  ' #ordertypediv');
                $('#topcart').load(document.URL +  ' #topcart');
            }
        });
    }
    function membershipid() {
        var memberid = document.getElementById("memberid").value;
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/membershipid/")?>' ,
            data: {'memberid': memberid},
            cache: false,
            success: function (data) {
                //   $('#cart_table').load(document.URL +  ' #cart_table');
                //  $('#total_table').load(document.URL +  ' #total_table');
                //  $('#ordertypediv').load(document.URL +  ' #ordertypediv');
                // alert(data);
            }
        });
    }
    function orderwarning() {
        var orderType ='<?php echo $this->session->userdata('orderType')?>';
        if (orderType == "" ) {
            alert("Please Select A Order Type");
        }
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
<!--    <script>
        (function($) {
            var element = $('.scrolldiv'),
                originalY = element.offset().top;
            // Space between element and top of screen (when scrolling)
            var topMargin = 40;
            // Should probably be set in CSS; but here just for emphasis
            element.css('position', 'relative');
            $(window).on('scroll', function(event) {
                var scrollTop = $(window).scrollTop();
                element.stop(false, false).animate({
                    top: scrollTop < originalY
                        ? 0
                        : scrollTop - originalY + topMargin
                }, 300);
            });
        })(jQuery);
    </script>-->

<script>
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];

    function newUser(x)
    {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("admin/Login/showNewUserReg")?>',
            data:{},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


</script>
