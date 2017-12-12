<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width="3%"class="center"> Sr.NO </th>
        <th width="3%"class="center"> Order Id </th>
        <th width="15%"class="center"> User & Order Tacker Name</th>
        <th width="10%"class="center"> Order Type & Date</th>

        <th width="5%"class="center"> Payment Type</th>
        <th width="39%"class="center"> Items </th>
        <th width="20%"class="center">Order Delivery Time & Status</th>
        <th width="5%"class="center">Print & Cancel</th>
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
                elseif($orders->orderType=="home"){echo "Home Delivery";}?><hr>
                <?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($orders->orderDate)),1);?>
            </td>

            <td class="center"><?php if ($orders->paymentType=="cs"){echo "Cash";}
                elseif($orders->paymentType=="crd"){echo "Card";}?>
            </td>

            <td class="center">
                <div class="table table-responsive">
                    <?php if ($StatusCancel->id != $orders->fkOrderStatus){?>
                        <?php if ($StatusDelivered->id != $orders->fkOrderStatus){?>
                            <table style="margin-bottom: 5px" class="orderexmple table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                <tr>
                                    <th width="50%"class="center">Name</th >
                                    <th width="10%"class="center">Size</th >
                                    <th width="10%"class="center">Quantity</th >
                                    <th width="10%"class="center">Rate</th >
                                    <th width="10%"class="center">Discount($)</th >
                                    <th width="10%"class="center">Total</th >
                                    <th width="5%"class="center">Actions</th >
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

                                    <td style="color: red" colspan="5">Total=(<?php $delivaryFee=0; if (!empty($orders->deliveryfee)){?>delevery fee:$<?php echo $delivaryFee=$orders->deliveryfee;}else{?>delevery fee:$<?php echo $delivaryFee; }?> + sales tax:$<?php echo $orders->vat?>

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

                        <?php }else{ ?>

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



                                        foreach ( $query1->result() as $res ){ ?>

                                            <tr>
                                                <td><?php echo $res->itemName?></td>
                                                <td><?php echo $res->itemSize?></td>
                                                <td><?php echo $orderItem->quantity?></td>
                                                <td><?php echo $orderItem->rate?></td>

                                                <td><?php echo $discount=$orderItem->discount?></td>
                                                <td><?php echo $price=(($orderItem->quantity*$orderItem->rate)-$discount)?></td>



                                            </tr>
                                            <?php $total=$total+$price;}}} ?>
                                <tr>

                                    <td style="color: red" colspan="5">Total=(<?php $delivaryFee=0; if (!empty($orders->deliveryfee)){?>delevery fee:$<?php echo $delivaryFee=$orders->deliveryfee;}else{?>delevery fee:$<?php echo $delivaryFee; }?> + sales tax:$<?php echo $orders->vat?>

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

                                </tr>

                            </table>



                        <?php }}else{ ?>

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



                                    foreach ( $query1->result() as $res ){ ?>

                                        <tr>
                                            <td><?php echo $res->itemName?></td>
                                            <td><?php echo $res->itemSize?></td>
                                            <td><?php echo $orderItem->quantity?></td>
                                            <td><?php echo $orderItem->rate?></td>

                                            <td><?php echo $discount=$orderItem->discount?></td>
                                            <td><?php echo $price=(($orderItem->quantity*$orderItem->rate)-$discount)?></td>



                                        </tr>
                                        <?php $total=$total+$price;}}} ?>
                            <tr>

                                <td style="color: red" colspan="5">Total=(<?php $delivaryFee=0; if (!empty($orders->deliveryfee)){?>delevery fee:$<?php echo $delivaryFee=$orders->deliveryfee;}else{?>delevery fee:$<?php echo $delivaryFee; }?> + sales tax:$<?php echo $orders->vat?>

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

                            </tr>

                        </table>




                    <?php }?>

                </div>

            </td>


            <td class="center">

                <?php if ($StatusCancel->id != $orders->fkOrderStatus){?>
                    <?php if ($orders->orderType != "have"){?>
                        <label>Delivery time</label>
                        <?php if ($StatusDelivered->id != $orders->fkOrderStatus){?>
                            <select class="form-control input-height"  id="<?php echo $orders->id?>" onChange="deliveryTime(this.id)" name="delivery_schedule_time"<?php if ($orders->deliveryTime != null){echo 'disabled = "disabled"';}?>>
                                <option value="">Select time</option>
                                <option <?php if ($orders->deliveryTime == 15){ echo 'selected = "selected"';}?> value="15">15 min</option>
                                <option <?php if ($orders->deliveryTime == 30){ echo 'selected = "selected"';}?> value="30">30 min</option>
                                <option <?php if ($orders->deliveryTime == 45){ echo 'selected = "selected"';}?> value="45">45 min</option>
                                <option <?php if ($orders->deliveryTime == 60){ echo 'selected = "selected"';}?> value="60">1 hour</option>
                                <option <?php if ($orders->deliveryTime == 75){ echo 'selected = "selected"';}?> value="75">1 hour 15 min</option>
                                <option <?php if ($orders->deliveryTime == 90){ echo 'selected = "selected"';}?> value="90">1 hour 30 min</option>
                                <option <?php if ($orders->deliveryTime == 105){ echo 'selected = "selected"';}?> value="105">1 hour 45 min</option>
                                <option <?php if ($orders->deliveryTime == 120){ echo 'selected = "selected"';}?> value="120">2 hour</option>
                                <option <?php if ($orders->deliveryTime == 135){ echo 'selected = "selected"';}?> value="135">2 hour 15 min</option>
                                <option <?php if ($orders->deliveryTime == 150){ echo 'selected = "selected"';}?> value="150">2 hour 30 min</option>
                                <option <?php if ($orders->deliveryTime == 165){ echo 'selected = "selected"';}?> value="165">2 hour 45 min</option>
                                <option <?php if ($orders->deliveryTime == 180){ echo 'selected = "selected"';}?> value="180">3 hour</option>
                                <option <?php if ($orders->deliveryTime == 195){ echo 'selected = "selected"';}?> value="195">3 hour 15 min</option>
                                <option <?php if ($orders->deliveryTime == 210){ echo 'selected = "selected"';}?> value="210">3 hour 30 min</option>
                                <option <?php if ($orders->deliveryTime == 225){ echo 'selected = "selected"';}?> value="225">3 hour 45 min</option>
                                <option <?php if ($orders->deliveryTime == 240){ echo 'selected = "selected"';}?> value="240">4 hour</option>
                                <option <?php if ($orders->deliveryTime == 255){ echo 'selected = "selected"';}?> value="255">4 hour 15 min</option>
                                <option <?php if ($orders->deliveryTime == 270){ echo 'selected = "selected"';}?> value="270">4 hour 30 min</option>
                                <option <?php if ($orders->deliveryTime == 285){ echo 'selected = "selected"';}?> value="285">4 hour 45 min</option>
                                <option <?php if ($orders->deliveryTime == 300){ echo 'selected = "selected"';}?> value="300">5 hour</option>
                            </select>
                        <?php }else{ ?>

                            <select class="form-control input-height"  disabled id="<?php echo $orders->id?>" onChange="deliveryTime(this.id)" name="delivery_schedule_time"<?php if ($orders->deliveryTime != null){echo 'disabled = "disabled"';}?>>
                                <option value="">Select time</option>
                                <option <?php if ($orders->deliveryTime == 15){ echo 'selected = "selected"';}?> value="15">15 min</option>
                                <option <?php if ($orders->deliveryTime == 30){ echo 'selected = "selected"';}?> value="30">30 min</option>
                                <option <?php if ($orders->deliveryTime == 45){ echo 'selected = "selected"';}?> value="45">45 min</option>
                                <option <?php if ($orders->deliveryTime == 60){ echo 'selected = "selected"';}?> value="60">1 hour</option>
                                <option <?php if ($orders->deliveryTime == 75){ echo 'selected = "selected"';}?> value="75">1 hour 15 min</option>
                                <option <?php if ($orders->deliveryTime == 90){ echo 'selected = "selected"';}?> value="90">1 hour 30 min</option>
                                <option <?php if ($orders->deliveryTime == 105){ echo 'selected = "selected"';}?> value="105">1 hour 45 min</option>
                                <option <?php if ($orders->deliveryTime == 120){ echo 'selected = "selected"';}?> value="120">2 hour</option>
                                <option <?php if ($orders->deliveryTime == 135){ echo 'selected = "selected"';}?> value="135">2 hour 15 min</option>
                                <option <?php if ($orders->deliveryTime == 150){ echo 'selected = "selected"';}?> value="150">2 hour 30 min</option>
                                <option <?php if ($orders->deliveryTime == 165){ echo 'selected = "selected"';}?> value="165">2 hour 45 min</option>
                                <option <?php if ($orders->deliveryTime == 180){ echo 'selected = "selected"';}?> value="180">3 hour</option>
                                <option <?php if ($orders->deliveryTime == 195){ echo 'selected = "selected"';}?> value="195">3 hour 15 min</option>
                                <option <?php if ($orders->deliveryTime == 210){ echo 'selected = "selected"';}?> value="210">3 hour 30 min</option>
                                <option <?php if ($orders->deliveryTime == 225){ echo 'selected = "selected"';}?> value="225">3 hour 45 min</option>
                                <option <?php if ($orders->deliveryTime == 240){ echo 'selected = "selected"';}?> value="240">4 hour</option>
                                <option <?php if ($orders->deliveryTime == 255){ echo 'selected = "selected"';}?> value="255">4 hour 15 min</option>
                                <option <?php if ($orders->deliveryTime == 270){ echo 'selected = "selected"';}?> value="270">4 hour 30 min</option>
                                <option <?php if ($orders->deliveryTime == 285){ echo 'selected = "selected"';}?> value="285">4 hour 45 min</option>
                                <option <?php if ($orders->deliveryTime == 300){ echo 'selected = "selected"';}?> value="300">5 hour</option>
                            </select>



                        <?php } ?>

                        <hr>
                    <?php } ?>


                    <?php if ($StatusDelivered->id != $orders->fkOrderStatus){?>

                        <select class="form-control input-height" id="<?php echo $orders->id ?>"  name="orderStatus" required onchange="changeStatus(this.id)">
                            <option value="">Select</option>

                            <?php foreach ($ordersStatus as $Status){?>

                                <option <?php if (!empty($orders->fkOrderStatus) && $orders->fkOrderStatus==$Status->id) echo 'selected = "selected"';?>value="<?php echo $Status->id?>"><?php echo $Status->statusTitle?></option>
                            <?php }?>



                        </select>

                    <?php }else{?>
                        Already Delivered
                    <?php }}else{?>

                    <label>Delivery time</label>

                    <select class="form-control input-height"  id="<?php echo $orders->id?>" disabled onChange="deliveryTime(this.id)" name="delivery_schedule_time"<?php if ($orders->deliveryTime != null){echo 'disabled = "disabled"';}?>>
                        <option value="">Select time</option>
                        <option <?php if ($orders->deliveryTime == 15){ echo 'selected = "selected"';}?> value="15">15 min</option>
                        <option <?php if ($orders->deliveryTime == 30){ echo 'selected = "selected"';}?> value="30">30 min</option>
                        <option <?php if ($orders->deliveryTime == 45){ echo 'selected = "selected"';}?> value="45">45 min</option>
                        <option <?php if ($orders->deliveryTime == 60){ echo 'selected = "selected"';}?> value="60">1 hour</option>
                        <option <?php if ($orders->deliveryTime == 75){ echo 'selected = "selected"';}?> value="75">1 hour 15 min</option>
                        <option <?php if ($orders->deliveryTime == 90){ echo 'selected = "selected"';}?> value="90">1 hour 30 min</option>
                        <option <?php if ($orders->deliveryTime == 105){ echo 'selected = "selected"';}?> value="105">1 hour 45 min</option>
                        <option <?php if ($orders->deliveryTime == 120){ echo 'selected = "selected"';}?> value="120">2 hour</option>
                        <option <?php if ($orders->deliveryTime == 135){ echo 'selected = "selected"';}?> value="135">2 hour 15 min</option>
                        <option <?php if ($orders->deliveryTime == 150){ echo 'selected = "selected"';}?> value="150">2 hour 30 min</option>
                        <option <?php if ($orders->deliveryTime == 165){ echo 'selected = "selected"';}?> value="165">2 hour 45 min</option>
                        <option <?php if ($orders->deliveryTime == 180){ echo 'selected = "selected"';}?> value="180">3 hour</option>
                        <option <?php if ($orders->deliveryTime == 195){ echo 'selected = "selected"';}?> value="195">3 hour 15 min</option>
                        <option <?php if ($orders->deliveryTime == 210){ echo 'selected = "selected"';}?> value="210">3 hour 30 min</option>
                        <option <?php if ($orders->deliveryTime == 225){ echo 'selected = "selected"';}?> value="225">3 hour 45 min</option>
                        <option <?php if ($orders->deliveryTime == 240){ echo 'selected = "selected"';}?> value="240">4 hour</option>
                        <option <?php if ($orders->deliveryTime == 255){ echo 'selected = "selected"';}?> value="255">4 hour 15 min</option>
                        <option <?php if ($orders->deliveryTime == 270){ echo 'selected = "selected"';}?> value="270">4 hour 30 min</option>
                        <option <?php if ($orders->deliveryTime == 285){ echo 'selected = "selected"';}?> value="285">4 hour 45 min</option>
                        <option <?php if ($orders->deliveryTime == 300){ echo 'selected = "selected"';}?> value="300">5 hour</option>
                    </select>

                    <hr>

                    <select class="form-control input-height" id="<?php echo $orders->id ?>"  name="orderStatus" required onchange="changeStatus(this.id)">
                        <option value="">Select</option>

                        <?php foreach ($ordersStatus as $Status){?>

                            <option <?php if (!empty($orders->fkOrderStatus) && $orders->fkOrderStatus==$Status->id) echo 'selected = "selected"';?>value="<?php echo $Status->id?>"><?php echo $Status->statusTitle?></option>
                        <?php }?>



                    </select>

                <?php }?>







            </td>
            <td>
                <a href="<?php echo  base_url()?>Admin/PdfMaker/OrderBillPdf/<?php echo $orders->id?>" target="_blank">
                    <i class="fa fa-print"></i> Print </a>

                <hr>
                <?php if ($StatusDelivered->id != $orders->fkOrderStatus){?>
                    <?php if ($StatusCancel->id != $orders->fkOrderStatus){?>

                        <a href="<?php echo  base_url()?>Admin/Orders/cancelOrder/<?php echo $orders->id?>" onclick="return confirm('Are you sure To Cancel This Order?')">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>Cancel</a>

                    <?php }else{ ?>

                        Cancelled

                    <?php }}else{ ?>

                    Delivered

                <?php } ?>

            </td>

        </tr>

        <?php $i++;} ?>

    </tbody>
</table>