<!DOCTYPE html>
<html lang="en">

<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-green">
            <div class="card-head">
                <header>Add new item</header>

            </div>

                <form action="<?php echo base_url()?>Admin/Promotions/addNewselectIdinsert/<?php echo $promotionId?>"  method="post" id="form_sample_1" enctype="multipart/form-data" class="form-horizontal">

                            <div id='TextBoxesGroup'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Item:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <select class="form-control input-height" id="itemlist"  name="itemlist">
                                                    <option value="">Select...</option>
                                                    <?php foreach ($allItem as $item) { ?>
                                                        <option value="<?php echo $item->id?>"><?php echo $item->itemName?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div id = "Item_price" class="form-group">
                                        <label class="control-label col-md-3"> Discount(%):<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="discount" placeholder="Discount(%)" class="form-control input-height" />
                                        </div>

                                    </div>



                                <div  class="form-group">
                                    <div class="form-actions">
                                        <div class="row">

                                            <div class="col-md-offset-3 col-md-4">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                    </form>

            </div>
        </div>
    </div>







<!-- end page content -->

<div id="myModal" class="modal">
    <br/><br/><br/>
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">×</span>

        <div id="txtHint"></div>

    </div>


</div>




</body>

</html>
<?php include ("js.php") ?>






