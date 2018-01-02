



<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width="" class="center"> SL </th>
        <th width="" class="center"> Item Name </th>
        <th width="" class="center"> Item Size</th>
        <th width="" class="center"> Total Sold </th>



    </tr>
    </thead>
    <tbody>
    <?php $count = 1;  foreach ($allreportitem as $ar) {  ?>

        <tr>
            <td class="center"><?php echo $count ?></td>
            <td class="center"><?php echo $ar->itemname ?></td>
            <td class="center">
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle">
                    <tr>
                        <th class="center">Item Size</th>
                        <th class="center">Total Sold</th>
                    </tr>
                    <?php foreach ($allreportitemsize as $ris){
                        if ($ar->itemid == $ris->itemid){
                            ?>
                            <tr>
                                <td class="center"><?php echo $ris->itemsize?></td>
                                <td class="center"><?php echo $ris->totalsize?></td>
                            </tr>
                        <?php } }?>
                </table>
            </td>
            <td class="center"><?php echo $ar->totalitem ?></td>


        </tr>
        <?php  $count++;} ?>

    </tbody>
</table>