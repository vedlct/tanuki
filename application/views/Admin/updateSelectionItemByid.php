<!DOCTYPE html>
<html lang="en">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-green">
                            <div class="card-head">
                                <header>Update Promotion  Items info</header>

                            </div>
                            <div class="card-body ">
                                <?php foreach ($PromotionSelected as $s) { ?>

                                <form action="<?php echo base_url()?>Admin/Promotions/updateSelectionId/<?php echo $s-> pitemId?> "  method="post" id="form_sample_1" enctype="multipart/form-data" class="form-horizontal">

                                    <div id="showattr" >
                                        <div id='TextBoxesGroup'>
                                            <div id="TextBoxDiv1" >
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Item #1:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <select class="form-control input-height" id="itemlist"  name="itemlist">
                                                                <?php foreach ($itemsinfo as $itemsinfo ) { ?>
                                                                    <option value="<?php echo $itemsinfo->id ?>"<?php if (!empty($s->itname) && $itemsinfo->itemName==$s->itname) echo 'selected="selected"'?> ><?php echo $itemsinfo->itemName ?></option>
                                                                <?php } ?>
                                                        </select>

                                                </div>
                                                </div>

                                                <div id = "Item_price" class="form-group">
                                                    <label class="control-label col-md-3"> Discount(%):<span class="required"> * </span></label>
                                                    <div class="col-md-5">
                                                        <input type="text" name="discount" placeholder="Discount(%)"  value="<?php echo $s->discountAmount ?>" class="form-control input-height" />
                                                    </div>

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

                                <?php }  ?>

                            </div>
                        </div>
                    </div>
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

    </div>

</div>


</body>

</html>
<?php include ("js.php") ?>


<!---->
<!--<script>-->
<!--    var modal = document.getElementById('myModal');-->
<!--    var span = document.getElementsByClassName("close")[0];-->
<!---->
<!--    function selectid2() {-->
<!--        var x = document.getElementById('promotype').value;-->
<!--        {-->
<!---->
<!--            document.getElementById('showattr').style.display = "block";-->
<!--            document.getElementById('Item_price').style.display = "none";-->
<!--//        document.getElementById('Item_Status').style.display = "none";-->
<!--            document.getElementById('add_remove_button').style.display = "block";-->
<!--            return false;-->
<!--//        }else {-->
<!--//            document.getElementById('showattr').style.display = "none";-->
<!--//            document.getElementById('Item_price').style.display = "block";-->
<!--////        document.getElementById('Item_Status').style.display = "none";-->
<!--//            document.getElementById('add_remove_button').style.display = "none";-->
<!--//            return false;-->
<!--        }-->
<!--        // When the user clicks * of the modal, close it-->
<!--        span.onclick = function () {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--        // When the user clicks anywhere outside of the modal, close it-->
<!--        window.onclick = function (event) {-->
<!--            if (event.target == modal) {-->
<!--                modal.style.display = "none";-->
<!--            }-->
<!--        }-->
<!--    }-->
</script>



