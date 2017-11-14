<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-container-bg-solid page-content-white page-md">

<div class="page-wrapper">

    <?php include('topNavigation.php') ?>

    <div class="clearfix"></div>
    <!-- start page container -->
    <div class="page-container">

        <?php include ('leftNavigation.php')?>

        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">


                <?php if ($this->session->flashdata('errorMessage')!=null){?>
                    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                <?php }
                elseif($this->session->flashdata('successMessage')!=null){?>
                    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                <?php }?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-red">
                            <div class="card-head">
                                <header>Order List</header>
                                <div class="tools">
                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="btn-group">
                                            <button id="addRow" onclick="selectid1(this)" class="btn btn-info">
                                                Add New <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--                                    <form method="post" action="--><?php //echo base_url()?><!--Admin-OrdersByDate">-->
<!--                                        <div class="col-md-3 col-sm-6" >-->
<!--                                            <div class="form-group" >-->
<!---->
<!--                                                <label for="date">From</label>-->
<!--                                                <input type="text" class="form-control docs-date" name="date_from" placeholder="Pick a date">-->
<!--                                            </div >-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="col-md-3 col-sm-6" >-->
<!--                                            <div class="form-group" >-->
<!---->
<!--                                                <label for="date">To</label>-->
<!--                                                <input type="text" class="form-control docs-date" name="date_to" placeholder="Pick a date">-->
<!--                                            </div >-->
<!--                                        </div>-->
<!---->
<!---->
<!--                                        <input type="hidden" name="--><?php //echo $this->security->get_csrf_token_name();?><!--" value="--><?php //echo $this->security->get_csrf_hash();?><!--">-->
<!--                                        <input style="margin-top: 44px;margin-left: 50px" type="submit" name="generate" class="btn btn-success" value="Generate">-->
<!---->
<!--                                    </form>-->
<!--                                    </div>-->

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
                                <div class=" table table-responsive">
                                <table class="table table-responsive table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                    <tr >
                                        <th width="3%"class="center"> Sr.NO </th>
                                        <th width="7%"class="center"> User Name </th>
                                        <th width="5%"class="center"> order Type </th>
                                        <th width="15%"class="center"> order Date</th>
                                        <th width="5%"class="center"> payment Type </th>
                                        <th width="45%"class="center"> Items </th>
                                        <th width="5%"class="center"> delivery fee </th>
                                        <th width="15%"class="center"> status </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;foreach($orders as $orders) { ?>

                                        <tr class="odd gradeX">

                                            <td><?php echo $i;?></td>
                                            <td class="center"><?php echo $orders->name; ?>

                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-xs" data-panel-id="<?php echo $orders->fkUserId ?>" onclick="selectidShowUser(this)">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>

                                            </td>
                                            <td class="center"><?php echo $orders->orderType; ?></td>
                                            <td class="center">
                                                <?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($orders->orderDate)),1);?>
                                            </td>
                                            <td class="center"><?php echo $orders->paymentType; ?></td>
                                            <td class="center">
                                                <div class="table table-responsive">
                                                <table style="margin-bottom: 5px" class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                    <tr>
                                                        <th width="40%"class="center">Name</th >
                                                        <th width="10%"class="center">Size</th >
                                                        <th width="10%"class="center">Quantity</th >
                                                        <th width="10%"class="center">Rate</th >
                                                        <th width="10%"class="center">Discount</th >
                                                        <th width="10%"class="center">Total</th >
                                                        <th width="10%"class="center">Action</th >
                                                    </tr>
                                                    <?php

                                                    if ($orders->id=$orders->fkOrderId){
                                                        $this->db->select('oi.fkItemSizeId,oi.quantity,oi.rate,oi.discount,is.itemSize,i.itemName');
                                                        $this->db->from('orderitems oi');
                                                        $this->db->Where('oi.fkItemSizeId',$orders->fkItemSizeId);
                                                        $this->db->join('itemsizes is','is.id = oi.fkItemSizeId','left');
                                                        $this->db->join('items i','i.id = is.fkItemId','left');

                                                        $query1=$this->db->get();

                                                    foreach ( $query1->result() as $res ) {?>
                                                        <tr>
                                                            <td><?php echo $res->itemName?></td>
                                                            <td><?php echo $res->itemSize?></td>
                                                            <td><?php echo $res->quantity?></td>
                                                            <td><?php echo $res->rate?></td>
                                                            <td><?php echo $res->discount?></td>
                                                            <td><?php echo (($res->quantity*$res->rate)-$res->discount)?></td>
                                                            <td width="20%">
                                                                <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $orders->fkItemSizeId ?>" onclick="selectid1(this)">

                                                                    <i class="fa fa-edit"></i>
                                                                </button>

                                                                <button type="button" data-panel-id="<?php echo $orders->fkItemSizeId ?>" onclick="selectid4(this)"class="btn btn-danger btn-xs">

                                                                    <i class="fa fa-trash "></i>
                                                                </button>
                                                            </td>


                                                        </tr>
                                                    <?php }}?>

                                                </table>
                                                </div>

                                            </td>

                                            <td class="center"><?php echo $orders->deliveryfee; ?></td>
                                            <td class="center">





                                                            <select class="form-control input-height" id="orderStatus" name="orderStatus" required onchange="showtable(this)">
                                                                <option value="">Select</option>
                                                                <?php foreach ($ordersStatus as $ordersStatus) { ?>
                                                                    <option <?php if (!empty($orders->fkOrderStatus) && $orders->fkOrderStatus==$ordersStatus->id) echo 'selected = "selected"';?>value="<?php echo $ordersStatus->id?>"><?php echo $ordersStatus->statusTitle?></option>
                                                                <?php } ?>
                                                            </select>



                                            </td>

                                        </tr>

                                        <?php $i++;} ?>
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

        <div id="myModal" class="modal">
            <br/><br/><br/>
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">×</span>

                <div id="txtHint"></div>

            </div>


        </div>

    </div>
    <!-- end page container -->

    <?php include ("footer.php") ?>

</div>


</body>

</html>
<?php include ("js.php") ?>



<script>
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];

    function selectid1(x)
    {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Category/newCategory" )?>',
            data:{},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
    }

    function selectid2(x)
    {

        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Category/getCategoryById")?>',
            data:{id:btn},
            cache: false,
            success:function(data) {

                $('#txtHint').html(data);

            }
        });
        modal.style.display = "block";

    }

    function selectid3(x)
    {

        if (confirm("are you sure to delete this Category?"))
        {

            btn = $(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Category/deleteCategoryById")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    alert('Category deleted Successfully');
                    location.reload();
                }

            });
        }
    }
    // When the user clicks * of the modal, close it
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
