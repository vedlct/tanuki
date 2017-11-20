<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width=""class="center"> SL</th>
        <th width=""class="center"> Campain Title </th>
        <th width=""class="center"> Promo Code </th>
        <th width=""class="center"> Star Date </th>
        <th width=""class="center"> End Date</th>
        <th width=""class="center"> Item</th>
        <th width=""class="center"> Status</th>
        <th width=""class="center"> Action </th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1;foreach($promotions as $promotion) { ?>

        <tr class="odd gradeX">

            <td><?php echo $i; ?></td>
            <td class="center"><?php echo $promotion->campainTitle; ?></td>
            <td class="center"><?php echo $promotion->promoCode; ?></td>
            <td class="center"><?php echo $promotion->startDate; ?></td>
            <td class="center"><?php echo $promotion->endDate; ?></td>
            <td class="center">
                <table style="margin-bottom: 5px" class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                    <?php

                    //echo $s->type_id;
                    foreach ( $promotionsItem as $pitem ) {?>
                        <?php if ($promotion->id == $pitem->fkPromotionId) {?>
                        <tr>
                            <td><?php echo $pitem->itname ?></td>
                            <td><?php echo $pitem->discountAmount ?></td>
                            <td width="20%"><button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $pitem->pitemId ?>" onclick="selectid2(this)">

                                    <i class="fa fa-edit"></i>
                                </button>

                                <button type="button" data-panel-id="<?php echo $pitem->pitemId ?>" onclick="selectid5(this)"class="btn btn-danger btn-xs">

                                    <i class="fa fa-trash "></i>
                                </button>
                            </td>
                        </tr>
                    <?php } }?>

                </table>
                <button style="width: 100%; margin:0 auto"  class="btn btn-success " data-panel-id="<?php echo $promotion->id?>" onclick="selectid6(this)"><i style="font-size: 30px; margin-top: 5px;"   class="fa fa-plus-circle"></i></button>
            </td>

            <td class="center">
                <?php if ($promotion->activationStatus==1){echo "Active";}
                elseif ($promotion->activationStatus==0){echo "In-Active";}?>
            </td>

            <td class="center">
                <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $promotion->id ?>" onclick="selectid4(this)">

                    <i class="fa fa-pencil"></i>
                </button>

                <button type="button" data-panel-id="<?php echo $promotion->id ?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                    <i class="fa fa-trash-o "></i>
                </button>
            </td>
        </tr>

        <?php $i++;} ?>
    </tbody>
</table>
