<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width="10%"class="center"> Sr.NO </th>
        <th width="50%"class="center"> Item Image </th>
        <th width="50%"class="center"> Item Name </th>
        <th width="50%"class="center"> Item Size & Price </th>


        <th width="30%"class="center"> Status</th>
        <th width="10%"class="center"> Action </th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1;foreach($items as $items) { ?>

        <tr class="odd gradeX">

            <td><?php echo $i; ?></td>
            <td class="center"><img height="80px" width="80px" src="<?php echo base_url()?>images/itemImages/<?php echo $items->image; ?>"></td>
            <td class="center"><?php echo $items->itemName; ?></td>
            <td class="center">
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                <?php

                //echo $s->type_id;
                $query1= $this->db->query("select `id`,`itemSize`,`price` from `itemsizes` WHERE `fkItemId` ='$items->id'");
                foreach ( $query1->result() as $res ) {?>
                <tr>
                    <td><?php echo $res->itemSize?></td>
                    <td><?php echo $res->price?></td>
                </tr>
                <?php }?>
                </table>

            </td>

            <td class="center">
                <?php if ($items->itemStatus==1){echo "Active";}
                elseif ($items->itemStatus==0){echo "InActive";}?>
            </td>

            <td class="center">
                <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $items->id ?>" onclick="selectid2(this)">

                    <i class="fa fa-pencil"></i>
                </button>

                <button type="button" data-panel-id="<?php echo $items->id ?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                    <i class="fa fa-trash-o "></i>
                </button>
            </td>
        </tr>

        <?php $i++;} ?>
    </tbody>
</table>