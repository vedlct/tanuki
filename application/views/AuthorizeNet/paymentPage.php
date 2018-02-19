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

            <div id="Address" class="box_style_2">
                <h2 class="inner">Delivery Address</h2>

                <div id="DeliveriAddress">

                <?php $user = $this->session->userdata('id');
                $this->db->select('userdeliveryaddress.id,address,postalCode,contactNo,city.name as cityName,country');
                $this->db->from('userdeliveryaddress');
                $this->db->join('city ','city.id = userdeliveryaddress.fkCity ','left');
                $this->db->where('userdeliveryaddress.userId',$user);
                $this->db->where('userdeliveryaddress.status',"1");
                $query = $this->db->get();
                $userDefaultDelivery=$query->result();
                foreach ($userDefaultDelivery as $deliveryLocation){?>
                <div>
                    <?php echo $deliveryLocation->address.$deliveryLocation->postalCode.$deliveryLocation->cityName.",".$deliveryLocation->country?>
                </div>
                    <div> <button style="float: right; margin-top: -30px" class="btn btn-sm btn-success" onclick="changeAddress()">Change</button>
                    </div>
                <?php }?>
                </div>

                <div id="allDeliveryAddressByUser" style="display: none">

                    <?php $user = $this->session->userdata('id');
                    $this->db->select('userdeliveryaddress.id,address,postalCode,contactNo,city.name as cityName,country');
                    $this->db->from('userdeliveryaddress');
                    $this->db->join('city ','city.id = userdeliveryaddress.fkCity ','left');
                    $this->db->where('userdeliveryaddress.userId',$user);
                    // $this->db->where('userdeliveryaddress.status',"1");
                    $query = $this->db->get();
                    $userDefaultDelivery=$query->result();?>
                    <table>

                    <?php foreach ($userDefaultDelivery as $deliveryLocation){?>
                            
                        <tr >
                            <td style="border: 1px solid #ddd; cursor: pointer;"><a class="addressbox" herf="#0" data-panel-id="<?php echo $deliveryLocation->id?>"onclick="selectDeliveryAddress(this)"><?php echo $deliveryLocation->address.$deliveryLocation->postalCode.$deliveryLocation->cityName.",".$deliveryLocation->country?></a></td>
                            <td><a class="btn" href="#0" data-panel-id="<?php echo $deliveryLocation->id ?>"  onclick="EditDeliveryAddress(this)">Edit</a></td>
                        </tr>

                    <?php }?>
                        <tr>
                            <td><a class="btn" href="#0" onclick="addNewDeliveryAddress()">Add New Address</a></td>
                        </tr>

                    </table>

                </div>

            </div>

            <div class="box_style_2">
                <h2 class="inner">Payment methods</h2>
                <form action="<?php echo base_url()?>AuthorizeNet/Payment/insertCreditPay" method="post" onsubmit="return checkcreditCardForm()">
                    <div class="form-group">
                        <label for="cardHolderName">Card Holder Name:</label>
                        <input required type="text" class="form-control" id="cardHolderName" placeholder="card Holder Name" name="cardHolderName">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Card Number:</label>
                        <input required type="text" class="form-control" id="cardNumber" placeholder="" name="cardNumber">
                    </div>
                    <div class="form-group">
                        <label for="securityCode">Security Code:</label>
                        <input required type="text" class="form-control" id="securityCode" placeholder="" name="securityCode">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Expiry Date:</label> <br>

                        <select id="expMonth" name="expMonth" required style="width:30%; float: left; margin-right: 20px; margin-bottom:15px;" class="form-control">

                            <option value="" selected>Month</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>

                        </select>
                        <?php $curYear= date("Y"); ?>

                        <select id="expYear" name="expYear" required style="width:30%; float: left;" class="form-control">
                            <option selected value="">Year</option>

                            <?php for ($i=$curYear;($i<($curYear+15));$i++){?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php } ?>

                        </select>
                        <br>
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

    function changeAddress() {


        document.getElementById("DeliveriAddress").style.display = "none";
        document.getElementById("allDeliveryAddressByUser").style.display = "block";

    }

    function selectDeliveryAddress(x) {


        btn = $(x).data('panel-id');
        var userId='<?php echo $this->session->userdata('id');?>'

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Profile/changeUserDeliveryAddress")?>',
            data:{id:btn,'userId':userId},
            cache: false,
            success:function(data) {

                $('#Address').load(document.URL +  ' #Address');

            }
        });

    }

    function checkcreditCardForm() {

        var cardHolderName=document.getElementById('cardHolderName').value;
        var cardNumber=document.getElementById('cardNumber').value;
        var securityCode=document.getElementById('securityCode').value;
        var expMonth=document.getElementById('expMonth').value;
        var expYear=document.getElementById('expYear').value;

        var chk=/^[0-9]*$/;

        if (cardHolderName==''){
            alert("card Holder Name Can not be empty");
            return false;
        }
        if (cardNumber == ''){
            alert("card Number Can not be empty");
            return false;
        }
        if(!cardNumber.match(chk)) {
            alert( 'Please enter a valid Card number!!' );
            return false;
        }
        if (expMonth == ''){
            alert("Expiry Month Can not be empty");
            return false;
        }
        if (expYear == ''){
            alert("card Expiry Year Can not be empty");
            return false;
        }

    }

    function addNewDeliveryAddress()
    {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Userorder/addNewDeliveryAddress" )?>',
            data:{},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
    }

    function EditDeliveryAddress(x)
    {
        btn = $(x).data('panel-id');


        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Userorder/EditDeliveryAddress" )?>',
            data:{id:btn},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
    }
</script>
