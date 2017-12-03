<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tanuki Billing Template</title>
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/invoicePdfstyle.css" media="all" />

    <!--bootstrap -->
    <link href="<?php echo base_url()?>public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>public/js/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div id="header" class="clearfix">
    <div style="float: left" class="col-md-6" id="logo">
        <img src="<?php echo base_url()?>images/logo/logo.png?>">
    </div>

    <div style="float: right"class="col-md-6" id="company">
        <h1 class="name">Tanuki Restaurant</h1>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
    </div>

</div>
<main>
    <?php foreach ($orders as $allOrder){?>
    <div id="details" class="clearfix">

        <div id="client">
            <div class="to">INVOICE TO:</div>
            <h2 class="name"><?php echo $allOrder->userName?></h2>
            <div class="address"><?php echo $allOrder->address?>,<?php echo $allOrder->postalCode?>,<?php echo $allOrder->cityName?>,US</div>
            <div class="email"><a href="mailto:<?php echo $allOrder->email?>"><?php echo $allOrder->email?></a></div>
        </div>

        <div id="invoice">
            <h1>ORDER# <?php echo $allOrder->id ?></h1>
            <div class="date">Date of Invoice: <?php echo date('d/m/Y')?></div>
        </div>

    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="5%" class="no">#</th>
            <th width="25%" class="desc">NAME</th>
            <th width="15%"class="desc">SIZE</th>
            <th width="10%"class="unit">UNIT PRICE</th>
            <th width="10%"class="qty">QUANTITY</th>
            <th width="10%"class="discount">Discount</th >
            <th width="15%"class="total">TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <?php $total=0;$i=1;foreach ($ordersItems as $orderItems){?>
        <tr>
            <td class="no"><?php echo $i?></td>
            <td class="desc"><h3><?php echo $orderItems->itemName?></h3><?php echo $orderItems->description?></td>
            <td class="desc"><h3><?php echo $orderItems->itemSize?></h3></td>
            <td class="unit">$<?php echo $orderItems->rate?></td>
            <td class="qty"><?php echo $orderItems->quantity?></td>
            <?php if (!empty($orderItems->discount)){?>
            <td class="discount">$<?php echo $discount=$orderItems->discount?></td>
            <?php }else{?>
            <td class="discount">$<?php echo $discount=$orderItems->discount?></td>
            <?php } ?>
            <td class="total">$<?php echo $price=(($orderItems->rate * $orderItems->quantity)-$discount) ?></td>
        </tr>
        <?php $i++;$total=($total+$price);} ?>
        </tbody>

        <tfoot>

        <tr>
            <td colspan="2"></td>
            <td colspan="4">SUBTOTAL</td>
            <td>$<?php echo $total?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <?php foreach ($charge as $charges){?>
            <td colspan="4">VAT <?php echo $charges->vat?>%</td>
            <?php }if (!empty($allOrder->vat)){?>
            <td>$<?php echo  $allOrder->vat?></td>
            <?php }else{ ?>
            <td>$0.00</td>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="4">Delevary Fee</td>
            <td>$<?php echo $allOrder->deliveryfee?></td>
        </tr>
        <?php $pointTk=0;if (!empty($pointUsed)){foreach ($pointUsed as $usedPoint){?>
        <tr>
            <td colspan="2"></td>
            <td colspan="4">Used Point <?php echo $usedPoint->expedPoints?></td>
            <td>- $<?php echo $pointTk=($usedPoint->expedPoints/10) ?></td>
        </tr>
        <?php }} ?>
        <tr>
            <td colspan="2"></td>
            <td colspan="4">GRAND TOTAL</td>
            <td>$<?php echo $Total=(($total+$allOrder->deliveryfee+$allOrder->vat)-$pointTk)?></td>
        </tr>

        </tfoot>

    </table>
    <?php }?>


    <div id="thanks">Thank you!</div>
    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div>
</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>