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
                                <header>Report</header>

                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <form method="post" action="<?php echo base_url()?>Admin/Report/searchByItemsDate">
                                        <div class="col-md-3 col-sm-3" >
                                            <div class="form-group" >

                                                <label for="date">Start Date</label>
                                                <input type="text" class="form-control docs-date" name="startdate" placeholder="Pick a date">
                                            </div >
                                        </div>
                                        <div class="col-md-3 col-sm-3" >
                                            <div class="form-group" >

                                                <label for="date">End Date</label>
                                                <input type="text" class="form-control docs-date" name="enddate" placeholder="Pick a date">
                                            </div>



                                        </div>
                                        <div class="btn-group col-md-3 col-sm-3">

                                            <button style="margin-top: 30px"  id="addRow" onclick="" class="btn btn-info">
                                                submit
                                            </button>
                                        </div>




                                    </form>


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
                            </div>
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
    function selectid1(x)
    {
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Category/newCategory" )?>',
            data:{},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }
        });
        modal.style.display = "block";
    }
    function selectid2(x)
    {
        btn = $(x).data('panel-id');
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Category/getCategoryById")?>',
            data:{id:btn},
            cache: false,
            success:function(data) {
                $('#txtHint').html(data);
            }
        });
        modal.style.display = "block";
    }
    function selectid3(x)
    {
        if (confirm("are you sure to delete this Category?"))
        {
            btn = $(x).data('panel-id');
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Category/deleteCategoryById")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    alert('Category deleted Successfully');
                    location.reload();
                }
            });
        }
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