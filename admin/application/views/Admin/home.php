<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-container-bg-solid page-content-white page-md">

<div class="page-wrapper">

    <?php include('topNavigation.php') ?>

    <div class="clearfix"> </div>
    <!-- start page container -->
    <div class="page-container">

        <?php include ('leftNavigation.php')?>
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Dashboard</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="Home">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- start widget -->
                <div class="row">
                    <div class="state-overview">
                        <div class="col-lg-3 col-sm-6">
                            <div class="overview-panel purple">
                                <div class="symbol">
                                    <i class="fa fa-users usr-clr"></i>
                                </div>
                                <div class="value white">
                                    <p class="sbold addr-font-h1" data-counter="counterup"><span id="resultts1" style="font-size: 90%"></span></p>
                                    <p>ORDERS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="overview-panel green-bgcolor">
                                <div class="symbol">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="value white">
                                    <p class="sbold addr-font-h1" data-counter="counterup"><span id="results" style="font-size: 90%"></span></p>
                                    <p>CUSTOMERS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="overview-panel orange">
                                <div class="symbol">
                                    <i class="fa fa-heartbeat"></i>
                                </div>
                                <div class="value white">
                                    <p class="sbold addr-font-h1" data-counter="counterup"><span id="resultts3" style="font-size: 90%"></span></p>
                                    <p>CUSTOMER FEEDBACK</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="overview-panel blue-bgcolor">
                                <div class="symbol">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="value white">
                                    <p class="sbold addr-font-h1" data-counter="counterup"><span id="resultts2" style="font-size: 90%"></span></p>
                                    <p>Total Earning</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end widget -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card  card-topline-green">
                            <div class="card-head">
                                <header>Todays Orders</header>

                            </div>

                            <div id="todayOrder" class="card-body ">

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page content -->
    </div>
    <!-- end page container -->
    <?php include ("footer.php") ?>


</div>

</body>

</html>

<?php include ("js.php") ?>

<script>
    var i = setInterval(function(){
        $.ajax({
            url: "<?php echo base_url('Admin/User/getTotalUser') ?>",
            cache: false,
            success: function (data) {
                $("#results").text(data);
            }
        });
    },6000 , 60);
    var i = setInterval(function(){
        $.ajax({
            url: "<?php echo base_url('Admin/Report/getTotaltransactiondetail') ?>",
            cache: false,
            success: function (data) {
                $("#resultts2").text(data);
            }
        });
    },6000, 60);
    var i = setInterval(function(){
        $.ajax({
            url: "<?php echo base_url('Admin/Feedback/totalFeedback') ?>",
            cache: false,
            success: function (data) {
                $("#resultts3").text(data);
            }
        });
    },6000, 60);
    var i = setInterval(function(){
        $.ajax({
            url: "<?php echo base_url('Admin/Orders/getTotalOrder') ?>",
            cache: false,
            success: function (data) {
                $("#resultts1").text(data);
            }
        });
    },6000, 60);

    var i = setInterval(function(){
        $.ajax({
            url: "<?php echo base_url('Admin/Home/getAllTodaysOrder') ?>",
            cache: false,
            success: function (data) {
                $("#todayOrder").html(data);
               // alert(data);
            }
        });
    },6000, 60);

</script>