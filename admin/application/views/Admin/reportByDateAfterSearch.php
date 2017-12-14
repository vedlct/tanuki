<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width="" class="center"> SL </th>
        <th width="" class="center"> OrderId </th>
        <th width="" class="center"> Items </th>

        <th width="" class="center"> Customer</th>
        <th width="" class="center"> Order Taken</th>
        <th width="" class="center"> Order Type</th>
        <th width="" class="center"> Payment Type</th>
        <th width="" class="center"> Date</th>
    </tr>
    </thead>
    <tbody>

    <?php $count = 1; foreach ($allreport as $ar) {

        ?>

        <tr>
            <td class="center"><?php echo $count ?></td>
            <td class="center"><?php echo $ar->fkOrderId ?></td>
            <td class="center">
                <table style="margin-bottom: 5px" class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">

                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th >total</th>
                    </tr>

                    <?php $sumtotal = 0; foreach ($allItemreport as $air) {
                        if ( $ar->tid == $air->fkTransId) { ?>
                            <tr>
                                <td><?php echo  $air->itemName ?></td>
                                <td><?php echo  $air->itemSize ?></td>
                                <td><?php echo  $air->quantity ?></td>
                                <td ><?php echo $air->discount?></td>
                                <td ><?php echo $total=$air->quantity * $air->rate?></td>
                            </tr>

                            <?php  $sumtotal = $sumtotal+$total;  } }?>
                    <tr>
                        <!--                                                            <td style="color: red" colspan="4">sales tax::--><?php //echo $v = $ar->vatTotal;?>
                        <!--                                                            + delivery fee : --><?php //echo $d =$ar->deliveryfee;?>
                        <!--                                                            </td>-->
                        <!--                                                            <td>--><?php //echo $sumtotal+ $v+$d ?><!--</td>-->

                        <td style="color: red" colspan="4">Total=(<?php $delivaryFee=0; if (!empty($ar->deliveryfee)){?>delevery fee:$<?php echo $delivaryFee=$ar->deliveryfee;}else{?>delevery fee:$<?php echo $delivaryFee; }?> + sales tax:$<?php echo $ar->vatTotal?>

                            <?php foreach ($pointUsed as $pu){
                                if ($pu->fkOrderId == $ar->fkOrderId ){

                                    if (!empty($pu->expedPoints)) {
                                        echo " - Points Used :" . $pu->expedPoints;
                                    }
                                }

                            } ?> )
                        </td>

                        <td colspan="1">

                            <?php $pointToMoney=0;foreach ($pointUsed as $pu){
                                if ($pu->fkOrderId == $ar->fkOrderId ){

                                    if (!empty($pu->expedPoints)) {
                                        $pointToMoney= ($pu->expedPoints/10);

                                    }
                                }

                            }?>
                            <?php echo $Ftotal=(($sumtotal+$ar->deliveryfee+$ar->vatTotal)-$pointToMoney);?>

                        </td>


                    </tr>


                </table>
            </td>

            <td class="center"><?php echo $ar->customer ?></td>
            <td class="center"><?php echo $ar->waiter ?></td>
            <td class="center"><?php echo $ar->orderType ?></td>
            <td class="center"><?php echo $ar->paymentType ?></td>
            <td class="center"><?php echo $ar->transDate ?></td>
        </tr>
        <?php  $count++;} ?>

    </tbody>
</table>