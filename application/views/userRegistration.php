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
            <div id="thumb"><img src="<?php echo base_url()?>public/img/thumb_restaurant.jpg" alt=""></div>
            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="<?php echo base_url() ?>feedback">Read Items reviews</a></small>)</div>
            <h1>Mexican TacoMex</h1>
            <div><em>Mexican / American</em></div>
            <div><i class="icon_pin"></i> 135 Newtownards Road, Belfast, BT4 1AB - <strong>Delivery charge:</strong> $10, free over $15.</div>
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
        <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> Search</a>
    </div>
</div><!-- Position -->

<!-- Content ================================================== -->
<div class="container-fluid margin_60_35">
    <div  class="row">


        <div align="center" class="span3 col-md-12">
            <div style="color: red" class="login_icon"><i class="icon_lock_alt"></i></div>
            <h2>Customer Registration</h2>
            <form method="post" action="<?php echo base_url()?>Login/registerUser" onsubmit="return registration()">
                <div class="form-group col-md-12">
                    <div class="col-md-2">
                        <label>Name</label>
                    </div>
                    <div class="col-md-10">
                        <p><font color="red"> <?php echo form_error('Name'); ?></font></p>
                        <input type="text" class="form-control" id="Name" value="<?php echo set_value('Name'); ?>" name="Name" placeholder="Full Name" required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-2">
                        <label>Address</label>
                    </div>
                    <div class="col-md-10">
                        <p><font color="red"> <?php echo form_error('address'); ?></font></p>
                        <textarea type="text" id="address" name="address" value="<?php echo set_value('address'); ?>" class="form-control"  required placeholder=" Your full address"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-2 form-group">
                        <label>City</label>
                    </div>
                    <div class="col-md-4">

                        <?php
                        $this->db->select('id,name');
                        $this->db->from('city');
                        $query1=$this->db->get();?>
                        <p><font color="red"> <?php echo form_error('city'); ?></font></p>
                        <select class="form-control" id="city" name="city" required>
                            <option value="">Your city</option>
                            <?php foreach ($query1->result() as $cities){?>
                                <option value="<?php echo $cities->id?>"><?php echo $cities->name?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-md-2 form-group">
                        <label>Postal Code</label>
                    </div>
                    <div class="col-md-4">
                        <p><font color="red"> <?php echo form_error('pcode'); ?></font></p>
                        <input type="text" id="pcode" value="<?php echo set_value('pcode'); ?>" name="pcode" class="form-control" required placeholder=" Your postal code">
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-2">
                        <label>Email</label>
                    </div>
                    <div class="col-md-4">
                        <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                        <input type="email" class="form-control"name="email" id="email" value="<?php echo set_value('email'); ?>" required placeholder="Email">
                    </div>

                    <div class="col-md-2">
                        <label>Phone No.</label>
                    </div>
                    <div class="col-md-4">
                        <p><font color="red"> <?php echo form_error('phone'); ?></font></p>
                        <input type="tel" class="form-control" value="<?php echo set_value('phone'); ?>" name="phone" required id="phone" placeholder="Contact No">
                    </div>

                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-2">
                        <label>Password</label>
                    </div>
                    <div class="col-md-4">
                        <p><font color="red"> <?php echo form_error('password'); ?></font></p>
                        <input type="text" class="form-control" value="<?php echo set_value('password'); ?>" name="password" required placeholder="Password"  id="password">
                    </div>

                    <div class="col-md-2">
                        <label>Confirm Password</label>
                    </div>
                    <div class="col-md-4">
                        <p><font color="red"> <?php echo form_error('conPassword'); ?></font></p>
                        <input type="text" class="form-control" value="<?php echo set_value('conPassword'); ?>" name="conPassword" required placeholder="Confirm password"  id="conPassword">
                    </div>

                </div><br><br>
                <div class="form-group">
                    <label><input type="checkbox" value="accept_2" id="check_2" name="check_2"> I agree with the <a href="#">Terms and Conditions</a>.</label>
                </div>
                <div class="form-group">

                    <input type="submit" value="Register" class="btn btn-primary">
                    <div class="clearfix"></div>
                </div>
                                </form>
                            </div>


                        </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<?php include ('login_logout.php')?>

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

</body>
</html>

<script>

    function registration() {

        var checkbox=document.getElementById('check_2').checked;
        if (!checkbox){
            alert('Please click the checkbox');
            return false;
        }
        else {

            var name = document.getElementById('Name').value;
            var address = document.getElementById('address').value;
            var city = document.getElementById('city').value;
            var postcode = document.getElementById('pcode').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var conPassword = document.getElementById('conPassword').value;
            var phone = document.getElementById('phone').value;

            if (name.length > 45) {
                alert("User Name should be less than 45 charecter");
                return false;
            }
            if (address.length > 100) {
                alert("address should be less than 100 charecter");
                return false;
            }
            if (postcode.length > 11) {
                alert("Post Code should be less than 11 charecter");
                return false;
            }
            var chk = /^[0-9]*$/;
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!phone.match(chk)) {
                alert('Please enter a valid Phone number!!');
                return false;
            }
            if (phone.length > 18) {
                alert('Phone number must be less than 18 charecter!!');
                return false;
            }
            if (!email.match(mailformat)) {
                alert("You have entered an invalid email address!");
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

    }

</script>