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

                            </div>
                            <div class="card-body ">



                                    <button id="searchbyorderid" onclick="searchbydorder()" class="btn btn-info">
                                        Search By OrderID
                                    </button>


                                    <div id="order" style="display: none">
                                        <div class="col-md-6 col-sm-6" >
                                            <div class="form-group" >

                                                <label for="date">Order ID</label>
                                                <input type="text" id="searchOrderId" class="form-control " name="orderid" placeholder="Order ID">
                                            </div >

                                        </div>
                                        <div class="btn-group col-md-3 col-sm-3" >

                                            <button style="margin-top: 30px"  type="submit"  onclick="searchByOrderId()" class="btn btn-info">
                                                submit
                                            </button>
                                            <a href="Admin-Orders">
                                                Reload
                                            </a>
                                        </div>
                                    </div>

                                <div class="table table-responsive">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                    <tr >
                                        <th width="3%"class="center"> Sr.NO </th>
                                        <th width="3%"class="center"> Order Id </th>
                                        <th width="15%"class="center"> User & Order Tacker Name</th>
                                        <th width="10%"class="center"> Order Type & Date</th>

                                        <th width="5%"class="center"> Payment Type</th>
                                        <th width="44%"class="center"> Items </th>

                                        <th width="20%"class="center"> Print & Order Status </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i=1;foreach($orders as $orders) { ?>

                                        <tr class="odd gradeX">

                                            <td><?php echo $i;?></td>
                                            <td><?php echo $orders->id;?></td>
                                            <td class="center"><?php echo $orders->userName; ?>

                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-xs" style="z-index: inherit" data-panel-id="<?php echo $orders->fkUserId ?>"onclick="ShowUserInfo(this)">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </div><hr>

                                               <b>Order Taker:</b> <?php echo $orders->orderTaker; ?>
                                            </td>
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

                                                            <td><?php echo $discount=$orderItem->discount?></td>
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
                                                    <?php $total=$total+$price;}}} ?>
                                                    <tr>

                                                        <td style="color: red" colspan="5">Total=(<?php $delivaryFee=0; if (!empty($orders->deliveryfee)){?>delevery fee:$<?php echo $delivaryFee=$orders->deliveryfee;}else{?>delevery fee:$<?php echo $delivaryFee; }?> + vat:$<?php echo $orders->vat?>

                                                            <?php foreach ($pointUsed as $pu){
                                                                if ($pu->fkOrderId == $orders->id ){

                                                                    if (!empty($pu->expedPoints)) {
                                                                        echo " - Points Used :" . $pu->expedPoints;
                                                                    }
                                                                }

                                                            } ?> )
                                                        </td>

                                                        <td colspan="1">

                                                            <?php $pointToMoney=0;foreach ($pointUsed as $pu){
                                                                if ($pu->fkOrderId == $orders->id ){

                                                                    if (!empty($pu->expedPoints)) {
                                                                        $pointToMoney= ($pu->expedPoints/10);

                                                                    }
                                                                }

                                                            }?>
                                                            <?php echo $Ftotal=(($total+$orders->deliveryfee+$orders->vat)-$pointToMoney);?>

                                                        </td>
                                                        <td>
                                                            <button data-panel-id="<?php echo $orders->id ?>" onclick="addNewItemOrder(this)" style="width: 100%; margin:0 auto" class="btn btn-success btnorder"><i style="font-size: 20px; " class="fa fa-plus-circle"></i></button>
                                                        </td>
                                                    </tr>

                                                </table>
                                                    
                                                </div>

                                            </td>

                                            <td class="center">

                                                <a href="<?php echo  base_url()?>Admin/PdfMaker/OrderBillPdf/<?php echo $orders->id?>" target="_blank">
                                                    <i class="fa fa-print"></i> Print </a>

                                                <hr>


                                                <?php if ($StatusDelivered->id != $orders->fkOrderStatus){?>
                                                            <select class="form-control input-height" id="<?php echo $orders->id ?>"  name="orderStatus" required onchange="changeStatus(this.id)">
                                                                <option value="">Select</option>

                                                                <?php foreach ($ordersStatus as $Status){?>

                                                                    <option <?php if (!empty($orders->fkOrderStatus) && $orders->fkOrderStatus==$Status->id) echo 'selected = "selected"';?>value="<?php echo $Status->id?>"><?php echo $Status->statusTitle?></option>
                                                                <?php }?>



                                                            </select>
                                                <?php }else{?>
                                                Already Delivery
                                                <?php } ?>

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
    function discount() {
        var itemId=document.getElementById('itemId').value;
        var promocode = document.getElementById('promocode').value;
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Admin/Orders/setDiscount")?>',
            data: {id: itemId,promocode: promocode},
            cache: false,
            success: function (data) {

                document.getElementById("ItemDiscount").value = data;

            }

        });

    }

    function showItemPriceByItemSizeId(x)
    {

        var itemSizeId=document.getElementById('itemSizeId').value;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Admin/Orders/getItemPriceByItemSize")?>',
            data: {id: itemSizeId },
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

    function searchByOrderId()
    {
        var orderId=document.getElementById("searchOrderId").value;

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Orders/searchByOrderId" )?>',
            data:{orderid:orderId},
            cache: false,
            success:function(data)
            {
                $('#example4').html(data);
            }

        });

    }

    function searchbydorder(){

        document.getElementById('order').style.display='block';

        document.getElementById('searchbyorderid').style.display='none';
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
                    //alert(data);

                }
            });
        }

    }
</script>
