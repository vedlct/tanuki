<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
    <thead>
    <tr >
        <th width=""class="center"> Sr.NO </th>
        <th width=""class="center"> Item Image </th>
        <th width=""class="center"> Item Name </th>
        <th width=""class="center"> Item Size & Price </th>


        <th width=""class="center"> Status</th>
        <th width=""class="center"> Action </th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1;foreach($items as $items) { ?>

        <tr class="odd gradeX">

            <td><?php echo $i; ?></td>
            <td class="center"><img height="80px" width="80px" src="<?php echo base_url()?>images/itemImages/<?php echo $items->image; ?>"></td>
            <td class="center"><?php echo $items->itemName; ?></td>
            <td class="center">
                <table style="margin-bottom: 5px" class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                <?php


                $query1= $this->db->query("select `id` AS itemSizeId ,`itemSize`,`price` from `itemsizes` WHERE `fkItemId` ='$items->id'");
                foreach ( $query1->result() as $res ) {?>
                <tr>
                    <td><?php echo $res->itemSize;?></td>
                    <td><?php echo $res->price;?></td>
                    <td width="20%"><button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $res->itemSizeId ?>" onclick="selectid1(this)">

                            <i class="fa fa-edit"></i>
                        </button>

                        <button type="button" data-panel-id="<?php echo $res->itemSizeId ?>" onclick="selectid4(this)"class="btn btn-danger btn-xs">

                            <i class="fa fa-trash "></i>
                        </button></td>


                </tr>
                <?php }?>

                </table>
                <button data-panel-id="<?php echo $items->id ?>" onclick="selectid5(this)" style="width: 100%; margin:0 auto" class="btn btn-success "><i style="font-size: 30px; margin-top: 5px;" class="fa fa-plus-circle"></i></button>
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