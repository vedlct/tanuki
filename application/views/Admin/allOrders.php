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

                                    <div class="col-md-12 col-sm-12 col-xs-12">
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
                                <div class="table table-responsive">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                    <tr >
                                        <th width="3%"class="center"> Sr.NO </th>
                                        <th width="15%"class="center"> User & Order Tacker Name</th>
                                        <th width="8%"class="center"> Order Type</th>
                                        <th width="13%"class="center"> Order Date </th>
                                        <th width="5%"class="center"> Payment Type </th>
                                        <th width="41%"class="center"> Items </th>

                                        <th width="15%"class="center"> Order Status </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i=1;foreach($orders as $orders) { ?>

                                        <tr class="odd gradeX">

                                            <td><?php echo $i;?></td>
                                            <td class="center"><?php echo $orders->userName; ?>

                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-xs" data-panel-id="<?php echo $orders->fkUserId ?>"onclick="ShowUserInfo(this)">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </div><hr>

                                               <b>Order Taker:</b> <?php echo $orders->orderTaker; ?>
                                            </td>
                                            <td class="center"><?php  if ($orders->orderType=="have"){echo "Restaurant";}
                                                                elseif($orders->orderType=="take"){echo "Take Away";}
                                                                elseif($orders->orderType=="home"){echo "Online";}?>
                                            </td>
                                            <td class="center">
                                                <?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($orders->orderDate)),1);?>
                                            </td>
                                            <td class="center"><?php if ($orders->paymentType=="cs"){echo "Cash";}
                                                                 elseif($orders->paymentType=="crd"){echo "Card";}?>
                                            </td>
                                            <td class="center">
                                                <div class="table table-responsive">
                                                <table style="margin-bottom: 5px" class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                    <tr>
                                                        <th width="50%"class="center">Name</th >
                                                        <th width="10%"class="center">Size</th >
                                                        <th width="10%"class="center">Quantity</th >
                                                        <th width="10%"class="center">Rate</th >
                                                        <th width="10%"class="center">Discount($)</th >
                                                        <th width="10%"class="center">Total</th >
                                                        <th width="5%"class="center">Action</th >
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
<!--                                                            <td>--><?php //echo $orderItem->discount?><!--</td>-->
                                                            <td><?php echo $discount=(($orderItem->quantity*$orderItem->rate)*($orderItem->discount/100))?></td>
                                                            <td><?php echo $price=(($orderItem->quantity*$orderItem->rate)-$discount)?></td>
                                                            <td width="20%">
                                                                <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $orderItem->id ?>" onclick="editOrderItemsId(this)">

                                                                    <i class="fa fa-edit"></i>
                                                                </button>

                                                                <button type="button" data-panel-id="<?php echo $orderItem->id?>" onclick="deleteOrderItemsId(this)"class="btn btn-danger btn-xs">

                                                                    <i class="fa fa-trash "></i>
                                                                </button>
                                                            </td>


                                                        </tr>
                                                    <?php $total=$total+$price;}}}?>
                                                    <tr>
                                                        <td style="color: red" colspan="5">Total-(including delevery fee: <?php echo $orders->deliveryfee; ?>$) : </td>
                                                        <td colspan="1"><?php echo $totalWithDelevery=$total+$orders->deliveryfee?></td>
                                                    </tr>

                                                </table>
                                                    <button data-panel-id="<?php echo $orders->id ?>" onclick="addNewItemOrder(this)" style="width: 100%; margin:0 auto" class="btn btn-success "><i style="font-size: 30px; margin-top: 5px;" class="fa fa-plus-circle"></i></button>
                                                </div>

                                            </td>

                                            <td class="center">

                                                            <select class="form-control input-height" id="<?php echo $orders->id ?>"  name="orderStatus" required onchange="changeStatus(this.id)">
                                                                <option value="">Select</option>
                                                                <?php foreach ($ordersStatus as $Status) { ?>
                                                                    <option <?php if (!empty($orders->fkOrderStatus) && $orders->fkOrderStatus==$Status->id) echo 'selected = "selected"';?>value="<?php echo $Status->id?>"><?php echo $Status->statusTitle?></option>
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

    function editOrderItemsId(x)
    {
        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Orders/editOrderItems" )?>',
            data:{id:btn},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
    }

    function deleteOrderItemsId(x)
    {
        if (confirm("are you sure to delete this Category?"))
        {
            btn = $(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Orders/deleteOrderedItemsId")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    alert(' Selected Order Item deleted Successfully');
                    location.reload();

                }
            });
        }


    }

    function addNewItemOrder(x)
    {

            btn = $(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Orders/NewOrderItems")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }

            });
        modal.style.display = "block";

    }

    function showItemByCategory(x)
    {

        var catId=document.getElementById('categoryName').value;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Admin/Orders/getAllItemsByCategory")?>',
            data: {id: catId},
            cache: false,
            success: function (data) {

                document.getElementById("itemId").innerHTML = data;

            }

        });
    }

    function showItemSizesByItem(x)
    {

        var itemId=document.getElementById('itemId').value;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Admin/Orders/getAllItemSizesByItem")?>',
            data: {id: itemId},
            cache: false,
            success: function (data) {

                document.getElementById("itemSizeId").innerHTML = data;

            }

        });
    }

    function showItemPriceByItemSizeId(x)
    {

        var itemSizeId=document.getElementById('itemSizeId').value;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Admin/Orders/getItemPriceByItemSize")?>',
            data: {id: itemSizeId},
            cache: false,
            success: function (data) {


                var quantity=document.getElementById("ItemQuantity").value = "1";

                document.getElementById("ItemRate").value = (quantity*data);

            }

        });
    }

    function ShowUserInfo(x)
    {
        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Orders/showAllInfo" )?>',
            data:{id:btn},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
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

<script>
    function changeStatus(v) {

        if (confirm("are you sure to Change this Oder Status?")) {

            var option = document.getElementById(v).value;


            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Orders/changeOrderStatus/")?>' + v,
                data: {status: option},
                cache: false,
                success: function (data) {

                    location.reload();

                }
            });
        }

    }
</script>
