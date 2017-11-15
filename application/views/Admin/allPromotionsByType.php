<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width=""class="center"> SL </th>
        <th width=""class="center"> Campain Title </th>
        <th width=""class="center"> Promo Code </th>
        <th width=""class="center"> Start Date </th>
        <th width=""class="center"> End Date</th>
        <th width=""class="center"> Discount(%):  </th>
        <th width=""class="center"> Status  </th>
        <th width=""class="center"> Action  </th>
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
            <td class="center"><?php echo $promotion->discountAmount; ?></td>
            <td class="center"><?php if ($promotion->activationStatus==1){echo "Active";} elseif ($promotion->activationStatus==0){echo "InActive";}?></td>

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