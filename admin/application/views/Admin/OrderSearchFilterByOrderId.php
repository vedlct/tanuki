

                                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                        <thead>
                                        <tr >
                                            <th width="3%"class="center"> Sr.NO </th>
                                            <th width="3%"class="center"> Order Id </th>
                                            <th width="15%"class="center"> User & Order Tacker Name</th>
                                            <th width="8%"class="center"> Order Type</th>
                                            <th width="8%"class="center"> Order Date </th>
                                            <th width="5%"class="center"> Payment Type </th>
                                            <th width="41%"class="center"> Items </th>

                                            <th width="20%"class="center"> Order Status </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=1;foreach($orders as $orders) { ?>

                                            <tr class="odd gradeX">

                                                <td><?php echo $i;?></td>
                                                <td><?php echo $orders->id;?></td>
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
                                                                <td>
                                                                    <button data-panel-id="<?php echo $orders->id ?>" onclick="addNewItemOrder(this)" style="width: 100%; margin:0 auto" class="btn btn-success btnorder"><i style="font-size: 20px; " class="fa fa-plus-circle"></i></button>
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>

                                                </td>

                                                <td class="center">


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
