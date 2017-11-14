<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>

<body class="page-header-fixed sidemenu-closed-hidelogo page-container-bg-solid page-content-white page-md">

<div class="page-wrapper">

    <?php include('topNavigation.php') ?>

    <div class="clearfix"></div>
    <!-- start page container -->
    <div class="page-container">

        <?php include ('leftNavigation.php')?>
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <?php if ($this->session->flashdata('errorMessage')!=null){?>
                    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                <?php }
                elseif($this->session->flashdata('successMessage')!=null){?>
                    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                <?php }?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-green">
                            <div class="card-head">
                                <header>New Promotion</header>

                            </div>
                            <div class="card-body ">

                                <form action="<?php echo base_url()?>Admin/Promotions/insertPromotions"  method="post" id="form_sample_1" enctype="multipart/form-data" class="form-horizontal">

                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Campain Title<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="campain" placeholder="Campain Title name" required class="form-control input-height" />
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Promo Code<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="promocode" placeholder="Promo Code" required class="form-control input-height" />
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Start Date<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control docs-date" name="startdate" placeholder="Pick a date">

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="control-label col-md-3"> End Date<span class="required"> * </span></label>
                                        <div class="col-md-5">

                                            <input type="text" class="form-control docs-date" name="enddate" placeholder="Pick a date">

                                        </div>
                                    </div>

                                    <div id = "Item_Status" class="form-group">
                                        <label class="control-label col-md-3">Promotions Type: </label>
                                        <div class="col-md-5">
                                            <select class="form-control input-height"  id="promotype" name="promotype" onchange="selectid2()">
                                                <option value="">Select...</option>
                                                <option value="1">All Item</option>
                                                <option value="0">Selected Item</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div id="showattr" style="display: none">
                                        <div id='TextBoxesGroup'>
                                            <div id="TextBoxDiv1" >
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Item #1:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <select class="form-control input-height" id="itemlist"  name="itemlist[]">
                                                            <option value="">Select...</option>
                                                            <?php foreach ($allItem as $item) { ?>
                                                                <option value="<?php echo $item->id?>"><?php echo $item->itemName?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div id = "discount" class="form-group">
                                                    <label class="control-label col-md-3"> Discount(%):<span class="required"> * </span></label>
                                                    <div class="col-md-5">
                                                        <input type="text" name="itemDiscount[]" placeholder="Discount(%)"  class="form-control input-height" />
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div id="add_remove_button" class="form-group" style="margin-left: 230px">
                                            <input class="btn btn-success" type='button' value='Add More' id='addButton'>
                                            <input class="btn btn-danger" type='button' value='Remove' id='removeButton'>
                                        </div>

                                    </div>

                                    <div id = "Item_price" class="form-group">
                                        <label class="control-label col-md-3"> Discount(%):<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="discount" placeholder="Discount(%)"  class="form-control input-height" />
                                        </div>

                                    </div>

                                    <div id = "Item_Status" class="form-group">
                                        <label class="control-label col-md-3">Status: </label>
                                        <div class="col-md-5">
                                            <select class="form-control input-height"  name="itemStatus">
                                                <option value="">Select...</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inctive</option>

                                            </select>
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
    <!-- end page container -->

    <?php include ("footer.php") ?>

</div>


</body>

</html>
<?php include ("js.php") ?>



<script>
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];

    function selectid2() {
        var x = document.getElementById('promotype').value;
        if (x == "0") {

            document.getElementById('showattr').style.display = "block";
            document.getElementById('Item_price').style.display = "none";
//        document.getElementById('Item_Status').style.display = "none";
            document.getElementById('add_remove_button').style.display = "block";
            return false;
        }else {
            document.getElementById('showattr').style.display = "none";
            document.getElementById('Item_price').style.display = "block";
//        document.getElementById('Item_Status').style.display = "none";
            document.getElementById('add_remove_button').style.display = "none";
            return false;
        }
        // When the user clicks * of the modal, close it
        span.onclick = function () {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
</script>



<script type="text/javascript">
    $(document).ready(function(){
        var counter = 2;
        $("#addButton").click(function () {
            if(counter>100){
                alert("Only 100 textboxes allow");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);

            newTextBoxDiv.after().html('<div class="form-group">'+'<label class="control-label col-md-3">Item #'+ counter + ' : </label>' +
                '<div class="control-label col-md-5">'+'<select class="form-control input-height"  name="itemlist[] '+ counter +
                '" id="itemlist' + counter +'" data-panel-id="'+ counter+'" value="" required>'+'<option selected value="" >'+'<?php echo "select" ?>'+'</option>'+
                '<?php foreach($allItem as $it){ ?>'+'<option value="<?php echo $it->id ?>" ><?php echo $it->itemName ?>'+'</option>'+'<?php }?>'+
                '</select>'+'</div>'+'</div>'+
                '<div id = "discount" class="form-group">'+
                '<label class="control-label col-md-3"> Discount(%):'+'<span class="required"> * '+'</span>'+'</label>'+
                '<div class="col-md-5">'+
                '<input type="text" name="itemDiscount[]" placeholder="Discount(%)"  class="form-control input-height" />'+
                '</div>'+

                '</div>'
            );


            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
        });
        $("#removeButton").click(function () {
            if(counter==2){
                alert(" textbox to remove");
                document.getElementById('Item_price').style.display = "block";
//                    document.getElementById('Item_Status').style.display = "block";
                document.getElementById('add_remove_button').style.display = "none";
                document.getElementById('showattr').style.display = "none";
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
    });


</script>

