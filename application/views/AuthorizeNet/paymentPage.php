<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>

    <?php $this->load->view ('head.php') ?>
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
<?php $this->load->view('menu.php')?>
<!-- End Header =============================================== -->

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">

            <div id=""><img src="<?php echo base_url()?>public/img/tanuki.png"  height="150px" alt=""></div>



            <h1>Online Payment</h1>
            <div class="bs-wizard">
                <div class="col-xs-4 bs-wizard-step active">
                    <div class="text-center bs-wizard-stepnum"><strong>1.</strong>Your details</div>
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


            </div>
            <div class="box_style_1 hidden-xs" id="help">
                <button class="btn btn-sm btn-info" style="width: 100%" href="#0" data-toggle="modal" data-target="#emailResturant">Email Us</button>
            </div>
            <div align="center" class="box_style_2 hidden-xs info">
                <h4 class="nomargin_top">Open Hours<i style="margin-left:30px" class="icon_clock_alt "></i></h4>
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



        </div>
        <!-- End col-md-3 -->

        <div class="col-md-5">

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

            <div class="box_style_2">
                <h2 class="inner">Delivery Address</h2>

                <div class="form-group">
                    <label> Name</label>
                    <p><font color="red"> <?php echo form_error('Name'); ?></font></p>
                    <input type="text" class="form-control" id="Name" value="<?php echo $this->session->userdata('name')?>" name="Name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <label>Telephone/mobile</label>
                    <p><font color="red"> <?php echo form_error('phone'); ?></font></p>
                    <input type="tel" class="form-control" value="<?php echo set_value('phone'); ?>" name="phone" required id="phone" placeholder="Contact No">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                    <input type="email" class="form-control"name="email" id="email" value="<?php echo $this->session->userdata('name')?>" required placeholder="Email">
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
                            <?php
                            $this->db->select('id, name ');
                            $this->db->from('city');
                            $query = $this->db->get();
                             $allCity=$query->result();?>
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

            <div class="box_style_2">
                <h2 class="inner">Payment methods</h2>
                <form action="#">
                    <div class="form-group">
                        <label for="email">Card Holder Name:</label>
                        <input type="email" class="form-control" id="email" placeholder="" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Card Number:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="" name="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Security Code:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="" name="pwd">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Expiry Date:</label> <br>
                        <select style="width:30%; float: left; margin-right: 20px;" class="form-control">
                            <option>Month</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>

                        <select style="width:30%; float: left;" class="form-control">
                            <option>Year</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select> <br>
                    </div>
                    <button type="submit" class="btn_full" >Submit</button>
                </form>
            </div>

        </div><!-- End col-md-6 -->


    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
<?php $this->load->view ('footer.php') ?>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- login logout modal-->
<?php $this->load->view ('login_logout.php')?>
<?php $this->load->view ('emailToResturant.php')?>
<!-- end login logout modal-->
</body>
</html>
<!-- COMMON SCRIPTS -->
<?php $this->load->view ('js.php')?>
<script>

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
