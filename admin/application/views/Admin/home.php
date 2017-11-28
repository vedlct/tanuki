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
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
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
                                <header>Tdays Orders</header>
                                <div class="tools">
                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                </div>
                            </div>

                            <div id="todayOrder" class="card-body ">
                                <div class="row table-padding">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="btn-group">
                                            <button id="addRow" class="btn btn-info">
                                                Add New <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="example4">
                                        <thead>
                                        <tr>
                                            <th>
                                                <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                    <span></span>
                                                </label>
                                            </th>
                                            <th>Patient Name</th>
                                            <th>Assigned Doctor</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Actions </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="odd gradeX">
                                            <td>
                                                <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td> Pooja Patel </td>
                                            <td>
                                                <a href="mailto:looper90@gmail.com"> Dr.Sarah Smith </a>
                                            </td>
                                            <td class="center"> 12/05/2016 </td>
                                            <td class="center"> 10:55 </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-info dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-ban"></i> Cancel </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-clock-o"></i> Postpone </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>
                                                <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td> Pankaj Singh </td>
                                            <td>
                                                <a href="mailto:userwow@yahoo.com"> Dr.Rajesh </a>
                                            </td>
                                            <td class="center"> 12/05/2016 </td>
                                            <td class="center"> 11:15 </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-success dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-ban"></i> Cancel </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-clock-o"></i> Postpone </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>
                                                <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td> Raj Malhotra </td>
                                            <td>
                                                <a href="mailto:doctormail@gmail.com"> Dr.Megha Trivedi </a>
                                            </td>
                                            <td class="center"> 12/05/2016 </td>
                                            <td class="center"> 11:25 </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-primary dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-ban"></i> Cancel </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-clock-o"></i> Postpone </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>
                                                <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td> Sneha Pandya </td>
                                            <td>
                                                <a href="mailto:doctormail@gmail.com"> Dr.Sarah Smith </a>
                                            </td>
                                            <td class="center"> 12/05/2016 </td>
                                            <td class="center"> 11:35 </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-warning dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-ban"></i> Cancel </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"><i class="fa fa-clock-o"></i> Postpone </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
            }
        });
    },6000, 60);

</script>