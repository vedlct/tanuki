<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>

<body class="page-header-fixed sidemenu-closed-hidelogo page-container-bg-solid page-content-white page-md">

<div class="page-wrapper">
    <?php include('topNavigation.php') ?>
    <div class="clearfix"></div>
    <div class="page-container">

        <?php include ('leftNavigation.php')?>
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">


                <div class="row">



                               <div class="card-body ">
                                <div class="col-md-12 col-sm-12">
                                    <div class="card card-topline-aqua" id="form_wizard_1">
                                        <div class="card-head">
                                            <header > Add New Additional Charge</header>
                                        </div>
                                        <div class="card-body" id="bar-parent">
                                            <form class="form-horizontal" action="<?php echo base_url()?>Admin/Charge/insertCharge"  enctype="multipart/form-data" method="POST">
                                                <div class="form-wizard">
                                                    <div class="form-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab1">

                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"> Delivery fee
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-5">
                                                                        <input type="number" required class="form-control input-height" placeholder="Enter delivery fee" name="deliveryfee" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"> Vat
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-5">
                                                                        <input type="number" required class="form-control input-height" placeholder="Enter vat Here" name="vat" />
                                                                    </div>
                                                                </div>



                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">
                                                                    </label>
                                                                    <div class="col-md-5">
                                                                        <button type="submit"  class="btn btn-info">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>
                                </form>
                            </div>

                </div>
            </div>
        </div>
    <?php include ("footer.php") ?>
    </div>

</body>
</html>
<?php include ("js.php") ?>




