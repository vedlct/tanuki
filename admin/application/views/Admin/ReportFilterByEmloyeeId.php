<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width="" class="center"> SL </th>
        <th width="" class="center"> Employee Name </th>
        <th width="" class="center"> Employee Membership ID</th>
        <th width="" class="center"> Total Order </th>
        <th width="" class="center"> Total Item </th>
        <th width="" class="center"> Total Amount</th>


    </tr>
    </thead>
    <tbody>
    <?php $count = 1; ;$qun= 0; $rate=0;$discount=0; foreach ($allreportemp as $ar) {  ?>

        <tr>
            <td class="center"><?php echo $count ?></td>
            <td class="center"><?php echo $ar->employee ?></td>
            <td class="center"><?php echo $ar->memberCardNo ?></td>
            <td class="center"><?php foreach ($allorder as $ao){
                    if ($ar->uid == $ao->uid){
                        echo $ao->totalorder ;
                    }
                }?></td>
            <td class="center"><?php echo $ar->totalitem?></td>
            <td class="center"><?php echo $ar->totalammount?></td>

        </tr>
        <?php  $count++;} ?>

    </tbody>
</table>