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
                        <div class="card card-topline-red">
                            <div class="card-head">
                                <header>New Item</header>

                            </div>
                            <div class="card-body ">

                                <form action="<?php echo base_url()?>Admin-insertItem"  method="post" id="form_sample_1" enctype="multipart/form-data" class="form-horizontal">


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Category
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <select class="form-control input-height" required name="categoryName">
                                                <option value="">Select...</option>
                                                <?php foreach ($categoryNameId as $category) { ?>
                                                    <option value="<?php echo $category->id?>"><?php echo $category->name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Item Name<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="itemname" placeholder="Item name" required class="form-control input-height" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Item Description

                                        </label>
                                        <div class="col-md-5">
                                            <textarea name="itemDescription"  class="form-control-textarea"  rows="5" ></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="control-label col-md-3">If you want to add any Size click </label>
                                        <div class="col-md-5">
                                            <input class="btn btn-success" type="button" name = 'add' value='Add' onclick="selectid2()">
                                        </div>
                                    </div>

                                    <div id="showattr" style="display: none">
                                        <div id='TextBoxesGroup'>
                                            <div id="TextBoxDiv1" >
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Size/Extra #1 : </label>
                                                    <div class="col-md-5">
                                                        <input class="form-control input-height" type='textbox' id='textbox1' name="textbox[]" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Price #1 : </label>
                                                    <div class="col-md-5">
                                                        <input class="form-control input-height" type='textbox' id='textimage1' name="textprice[]">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Status #1: </label>
                                                    <div class="col-md-5">
                                                        <select class="form-control input-height"  name="itemsizeStatus[]">
                                                            <option value="">Select...</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>

                                                        </select>
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
                                        <label class="control-label col-md-3"> Item Price<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="itemPrice" placeholder="Item Price"  class="form-control input-height" />
                                        </div>


                                    </div>

                                    <div id = "Item_Status" class="form-group">
                                        <label class="control-label col-md-3">Status: <span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <select class="form-control input-height" required name="itemStatus">
                                                <option value="">Select...</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>

                                            </select>
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <label class="control-label col-md-3">Upload Photo</label>
                                        <div class="col-md-5">
                                            <input type="file" name="itemPhoto" placeholder="Item Image"  class="form-control input-height" />
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
        document.getElementById('showattr').style.display = "block";
        document.getElementById('Item_price').style.display = "none";
//        document.getElementById('Item_Status').style.display = "none";
        document.getElementById('add_remove_button').style.display = "block";
        return false;
    }
    // When the user clicks * of the modal, close it
    span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<script type="text/javascript">
    $(document).ready(function(){
        var counter = 2;
        $("#addButton").click(function () {
            if(counter>10){
                alert("Only 10 textboxes allow");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
//
//                newTextBoxDiv.after().html('<label class="control-label col-md-3">Size/Extra #'+ counter + ' : </label>' +
//                    '<input class="form-control input-height" type="text" name="textbox[]' + counter +
//                    '" id="textbox' + counter + '" value="" >'+
//                    '<label>Price #'+ counter + ' : </label>' +
//                    '<input class="form-control input-height" type="text" name="textprice[]' + counter +
//                    '" id="textprice' + counter + '" value="" >'
//
//                );
            newTextBoxDiv.after().html('<div class="form-group">'+
                '<label class="control-label col-md-3">Size/Extra #'+ counter + ' : </label>'+
                '<div class="col-md-5">'+
                '<input class="form-control input-height" type="textbox" id="textbox1" name="textbox[]" >'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Price #'+ counter + ' : </label>'+
                '<div class="col-md-5">'+
                '<input class="form-control input-height" type="textbox" id="textimage1" name="textprice[]">'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Status: #' +counter+'</label>'+
                '<div class="col-md-5">'+
                '<select class="form-control input-height"  name="itemsizeStatus[]">'+
                '<option value="">Select...'+'</option>'+
                '<option value="1">Active'+'</option>'+
                '<option value="0">Inactive'+'</option>'+
                '</select>'+
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
