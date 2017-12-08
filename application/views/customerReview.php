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

        <div class="col-md-3">

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
                <!-- End box_style_1 -->

                <div class="box_style_2 hidden-xs" id="help">
                    <i class="icon_lifesaver"></i>
                    <h4>Need <span>Help?</span></h4>
                    <a href="tel://004542344599" class="phone">+1 703-723-8952</a>

                </div>



        </div>

        <div class="col-md-6">
            <h2 class="inner"> Review </h2>
            <br class="box_style_2">

            <?php if ($this->session->userdata('loggedin')=="true" ){?>
                <?php foreach( $allItem as $items) { ?>
                    <b>Item Name :</b><b style="color: red"><?php echo $items->itemName;?></b>

                    <div class="">
                    <form method="post" action="<?php echo base_url() ?>Feedback/newReview/<?php echo $items->id ?>">


                        <div class="form-group">
                            <textarea name="review_text" id="review_text" class="form-control form-black" style="height:100px" placeholder="write review..........." ></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" name="rating" max="5" min="0" class="form-control form-black"  placeholder="Give rating here ..........." ></input>
                        </div>

                        <input type="submit" style="color: red" class="form-control form-black"  value="Submit" >
                    </form>
                    <br>
                    </div>
                    <div class="">

                    <p>Users Rating:</p>
                    <?php foreach( $allItem as $items) { ?>

                        <p>  <?php foreach ($avgrating as $av){
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
                                    <img src="<?php echo base_url()?>public/img/yellow.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                                    <img src="<?php echo base_url()?>public/img/yellow.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                                    <img src="<?php echo base_url()?>public/img/yellow.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                                    <img src="<?php echo base_url()?>public/img/yellow.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                                    <img src="<?php echo base_url()?>public/img/yellow.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                                    <?php
                                    break;
                                default:
                                    ?>
                                    <img src="<?php echo base_url()?>public/img/blank.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                                    <img src="<?php echo base_url()?>public/img/blank.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                                    <img src="<?php echo base_url()?>public/img/blank.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                                    <img src="<?php echo base_url()?>public/img/blank.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                                    <img src="<?php echo base_url()?>public/img/blank.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                                    <?php

                            }

                            ?>

                        </p>




                    <?php }  ?>




                <?php }}else{?>

                <?php foreach( $allItem as $items) { ?>
                        <b>Item Name :</b><b style="color: red"><?php echo $items->itemName;?></b>
                    <p>Users Rating:</p>
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
                            <img src="<?php echo base_url()?>public/img/yellow.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                            <img src="<?php echo base_url()?>public/img/yellow.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                            <img src="<?php echo base_url()?>public/img/yellow.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                            <img src="<?php echo base_url()?>public/img/yellow.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                            <img src="<?php echo base_url()?>public/img/yellow.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                            <?php
                            break;
                        default:
                            ?>
                            <img src="<?php echo base_url()?>public/img/blank.png" id="imgA<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncA(this)" width="20px" style="float: left">
                            <img src="<?php echo base_url()?>public/img/blank.png" id="imgB<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"  onclick="myfuncB(this)" width="20px" style="float: left">
                            <img src="<?php echo base_url()?>public/img/blank.png" id="imgC<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>"onclick="myfuncC(this)" width="20px" style="float: left">
                            <img src="<?php echo base_url()?>public/img/blank.png" id="imgD<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncD(this)" width="20px" style="float: left">
                            <img src="<?php echo base_url()?>public/img/blank.png" id="imgE<?= $av->id ?>" class="img-responsive" data-panel-id="<?= $av->id ?>" onclick="myfuncE(this)" width="20px" style="float: left">

                            <?php

                    }

                    ?>






                <?php } } ?>



            <?php foreach($userFeedback as $f) { ?>

                <div class="review_strip_single">
                    UserName :<span style="color: red"><?php echo $f->name ?></span>
                    <p><small>  - <?php echo $f->feedbackTime ?></small></p>
                    <b><?php echo $f->feedback ?></b>


                </div>
            <?php  } ?>
              </div>


        </div>
        <div class="col-md-2"></div>
        <!-- End box_style_1 -->
    </div>
    <!-- End row -->
</div>
<!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<?php include ('login_logout.php')?>

<!-- COMMON SCRIPTS -->
<?php include ('js.php')?>

</body>
</html>