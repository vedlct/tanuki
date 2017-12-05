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
<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_2.jpg" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <!--    	<div id="thumb"><img src="<?php echo base_url()?>public/img/thumb_restaurant.jpg" alt=""></div>-->
            <!--                     <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="<?php echo base_url() ?>feedback">Read Items reviews</a></small>)</div>-->
            <h1 style="font-weight:bold; color:#ED1C24;">Tanuki</h1>
            <div><em>Japanese Restaurant</em></div>
            <div><i class="icon_pin"></i> 44260 Ice Rink Plz
                Ste 118 Ashburn, VA 20147 </div>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->


<div class="container margin_60">
    <?php if ($this->session->userdata('loggedin')=="true" ){?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php foreach ($profile as $p) {?>
                <form method = "post" action = "<?php echo base_url()?>Profile/update_user" enctype = "multipart/form-data" >


                    <div class="row" >
                        <div class="col-md-6 col-sm-6" >
                            <div class="form-group" >
                                <input type="hidden" name="id" value="<?php echo $p->id?>">
                                <label > Name</label >
                                <input type = "text" class="form-control"  value="<?php echo $p->name ?>" name = "name"   >
                            </div >
                        </div >
                        <div class="col-md-6 col-sm-6" >
                            <div class="form-group" >
                                <label > Email </label >
                                <input type = "text" class="form-control"  name = "email"  readonly value="<?php echo $p->email; ?>" >
                            </div >
                        </div >
                    </div >
                    <div class="row" >
                        <div class="col-md-6 col-sm-6" >
                            <div class="form-group" >
                                <label > Password</label >
                                <input type = "text"  name = "password" class="form-control" value="<?php echo $p->password ?>" >
                            </div >

                        </div >
                        <div class="col-md-6" >
                            <div class="form-group" >
                                <label > Address</label >
                                <input type = "text"  name = "address" class="form-control" value="<?php echo $p->address ?>" >
                            </div >
                        </div >


                    </div >
                    <div class="row" >
                        <div class="col-md-6" >
                            <div class="form-group" >
                                <label >Postal Code</label >
                                <input type = "text"  name = "postalCode" class="form-control" value="<?php echo $p->postalCode; ?>" >
                            </div >
                        </div >
                        <div class="col-md-6" >
                            <div class="form-group" >
                                <label > City</label >
                                <select class="form-control input-height" required name="city">
                                    <?php foreach ($city as $city ) { ?>
                                        <option value="<?php echo $city->id ?>"<?php if (!empty($p->fkCity) && $city->id==$p->fkCity) echo 'selected="selected"'?> ><?php echo $city->name ?></option>

                                    <?php } ?>
                                </select>
                            </div >
                        </div >
                    </div ><!--End row-->
                    <div class="row" >
                        <div class="col-md-6" >
                            <div class="form-group" >
                                <label > Contact Number</label >
                                <input type = "text"  name = "contactNo" class="form-control" value="<?php echo $p->contactNo ?>" >
                            </div >
                        </div >

                    </div ><!--End row-->



                    <div id = "pass-info" class="clearfix" ></div >
                    <div class="row" >
                        <div class="col-md-6" >
                            <label > <input size="55px" type="checkbox" name="vehicle1" value="Bike"> Accept terms and conditions</label >
                        </div >
                    </div ><!--End row-->
                    <hr style = "border-color:#ddd;" >

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                    <div class="text-center" ><button class="btn_full_outline" type = "submit" > Update</button ></div >
                </form >
            <?php } ?>


        </div>
    </div><!-- End col  -->
</div><!-- End row  -->
    </div><!-- End container  -->
<?php } ?>
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->
<?php include ('login_logout.php')?>
<div class="layer"></div><!-- Mobile menu overlay mask -->
<!-- COMMON SCRIPTS -->
<?php include ('js.php')?>
</body>
</html>