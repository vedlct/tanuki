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
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th class="no">#</th>
            <th class="desc">NAME</th>
            <th class="desc">SIZE</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <?php $total=0;$i=1;foreach ($ordersItems as $orderItems){?>
        <tr>
            <td class="no"><?php echo $i?></td>
            <td class="desc"><h3><?php echo $orderItems->itemName?></h3><?php echo $orderItems->description?></td>
            <td class="desc"><h3><?php echo $orderItems->itemSize?></h3></td>
            <td class="unit"><?php echo $orderItems->rate?></td>
            <td class="qty"><?php echo $orderItems->quantity?></td>
            <td class="total"><?php echo $price=($orderItems->rate * $orderItems->quantity) ?></td>
        </tr>
        <?php $i++;$total=($total+$price);} ?>
        </tbody>
        <tfoot>

        <tr>
            <td colspan="2"></td>
            <td colspan="3">SUBTOTAL</td>
            <td>$<?php echo $total?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <?php foreach ($charge as $charges){?>
            <td colspan="3">VAT <?php echo $charges->vat?>%</td>
            <?php }?>
            <td>$<?php echo  $allOrder->vat?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="3">Delevary Fee</td>
            <td>$<?php echo $allOrder->deliveryfee?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="3">GRAND TOTAL</td>
            <td>$<?php echo $Total=($allOrder->deliveryfee+$allOrder->vat)?></td>
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