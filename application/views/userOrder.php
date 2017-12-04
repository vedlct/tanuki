<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>

    <?php include ('head.php') ?>
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
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">
            <h1>Your Order List</h1>

        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section>

<div class="container left margin_100">
<!-- start page container -->
    <h2 style="text-align: center" color="red">Your Recent Orders</h2>
    <div class="col-md-1 col-lg-1"></div>
    <div class="box_style_2 col-md-10 col-lg-10">

<?php if (!empty($orders)){?>
    <div class="table table-responsive">
        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
            <thead>
            <tr >
                <th width="3%"class="center"> Sr.NO </th>
                <th width="3%"class="center"> Order Id </th>
                <th width="10%"class="center"> Order Type & Date</th>
                <th width="5%"class="center"> Payment Type</th>
                <th width="44%"class="center"> Items </th>
                <th width="20%"class="center"> Order Status </th>
            </tr>
            </thead>
            <tbody>

            <?php $i=1;foreach($orders as $orders) { ?>

                <tr class="odd gradeX">

                    <td><?php echo $i;?></td>
                    <td><?php echo $orders->id;?></td>
                    <td class="center"><?php  if ($orders->orderType=="have"){echo "Restaurant";}
                        elseif($orders->orderType=="take"){echo "Take Away";}
                        elseif($orders->orderType=="home"){echo "Online";}?><hr>
                        <?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($orders->orderDate)),1);?>
                    </td>
                    <td class="center"><?php if ($orders->paymentType=="cs"){echo "Cash";}
                        elseif($orders->paymentType=="crd"){echo "Card";}?>
                    </td>
                    <td class="center">
                        <div class="table table-responsive">
                            <table style="margin-bottom: 5px" class="orderexmple table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                <tr>
                                    <th width="50%"class="center">Name</th >
                                    <th width="10%"class="center">Size</th >
                                    <th width="10%"class="center">Quantity</th >
                                    <th width="10%"class="center">Rate</th >
                                    <th width="10%"class="center">Discount($)</th >
                                    <th width="10%"class="center">Total</th >
                                </tr>
                                <?php
                                $total=0;
                                foreach ($ordersItems as $orderItem){


                                    if ($orders->id==$orderItem->fkOrderId){



                                        $this->db->select('is.itemSize,i.itemName');
                                        $this->db->from('itemsizes is');
                                        $this->db->Where('is.id',$orderItem->fkItemSizeId);
                                        $this->db->join('items i','i.id = is.fkItemId','left');
                                        $query1=$this->db->get();



                                        foreach ( $query1->result() as $res ) {?>

                                            <tr>
                                                <td><?php echo $res->itemName?></td>
                                                <td><?php echo $res->itemSize?></td>
                                                <td><?php echo $orderItem->quantity?></td>
                                                <td><?php echo $orderItem->rate?></td>

                                                <td><?php echo $discount=(($orderItem->quantity*$orderItem->rate)*($orderItem->discount/100))?></td>
                                                <td><?php echo $price=(($orderItem->quantity*$orderItem->rate)-$discount)?></td>



                                            </tr>
                                            <?php $total=$total+$price;}}}?>
                                <tr>
                                    <td style="color: red" colspan="5">Total-(including delevery fee & vat): <?php echo $orders->deliveryfee; ?>$+<?php echo $orders->vat?>$ : </td>
                                    <td colspan="1"><?php echo $totalWithDelevery=($total+$orders->deliveryfee+$orders->vat)?></td>

                                </tr>

                            </table>

                        </div>

                    </td>

                    <td class="center">





                        <?php foreach ($ordersStatus as $Status){?>

                            <?php if (!empty($orders->fkOrderStatus) && $orders->fkOrderStatus==$Status->id){?>

                                <?php echo $Status->statusTitle?>
                            <?php }}?>





                    </td>

                </tr>

                <?php $i++;} ?>

            </tbody>
        </table>
    </div>
<?php }?>
    </div>
    <div class="col-md-1 col-lg-10"></div>
</div>
</body>
<!--    <div class="page-container">-->


        <!-- start page content -->
<!--        <div class="page-content-wrapper">-->
<!--            <div class="page-content">-->
<!--                <div class="row">-->

<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->
<?php include ('login_logout.php')?>

<div class="layer"></div><!-- Mobile menu overlay mask -->





<!-- COMMON SCRIPTS -->
<script src="<?php echo  base_url() ?>public/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo  base_url() ?>public/js/common_scripts_min.js"></script>
<script src="<?php echo  base_url() ?>public/js/functions.js"></script>
<script src="<?php echo  base_url() ?>public/assets/validate.js"></script>

