<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr>
        <th width="" class="center"> SL </th>
        <th width="" class="center"> Customer Name </th>
        <th width="" class="center"> Membership No </th>
        <th width="" class="center"> Earn Point</th>
        <th width="" class="center"> Expense Point </th>
        <th width="" class="center"> Left Point </th>

    </tr>
    </thead>
    <tbody>
    <?php $count = 1; ;$qun= 0; $rate=0;$discount=0; foreach ($allreportearnpoint as $er) {  ?>

        <tr>
            <td class="center"><?php echo $count ?></td>
            <td class="center"><?php echo $er->username ?></td>
            <td class="center"><?php echo $er->memberCardNo ?></td>
            <td class="center"><?php echo $earnpoint = $er->earnpoint ?></td>

            <?php $expensepoint ="0";foreach ($allreportexpensepoint as $en){
                if ($er->uid == $en->uid){?>
                    <td class="center"><?php echo $expensepoint = $en->expensepoint ;?></td>
                <?php }else{ ?>
                    <td class="center"><?php echo $expensepoint ;?></td>
                <?php }?>

                <td class="center"><?php echo ($earnpoint - $expensepoint) ?></td>
            <?php }  ?>



        </tr>
        <?php  $count++;} ?>

    </tbody>
</table>