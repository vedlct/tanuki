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
                <?php $catData = $this->session->flashdata('catData');?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-red">
                            <div class="card-head">
                                <header>Promotions List</header>

                            </div>

                            <div class="card-body ">




                                <div id = "promotypediv" class="form-group">
                                    <label class="control-label col-md-3">Promotions Type: </label>
                                    <div class="col-md-5">
                                        <select class="form-control input-height"  id="promotype" name="promotype" onchange="promotypefync()">
                                            <option value="">Select...</option>
                                            <option value="a">All Item</option>
                                            <option value="s">Selected Item</option>

                                        </select>
                                    </div>
                                </div>

                                <div  class="form-group" id="tableid" style="display: block">

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
    </div>


    <!-- end page container -->

    <?php include ("footer.php") ?>

</div>


</body>

</html>
<?php include ("js.php") ?>
<script>
   function promotypefync(){
       var type = document.getElementById('promotype').value;
 //alert(type);
          $.ajax({
              type:'POST',
              url:'<?php echo base_url("Admin/Promotions/getAllPromotions/")?>'+type,
              data:{type:type},
              cache: false,
              success:function(data) {

                  $('#tableid').html(data);
               // alert(data);
              }
          });

   }

</script>



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
            url:'<?php echo base_url("Admin/Items/getItemById")?>',
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

        if (confirm("are you sure to delete this Item ?"))
        {

            btn = $(x).data('panel-id');
            var catId= document.getElementById('categoryName').value;


            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Items/deleteItemById")?>',
                data: {id: btn,catId:catId},
                cache: false,
                success: function (data) {

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

<script>
    function showtable() {
        var x = document.getElementById('categoryName').value;

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Items/showItemsTable/")?>'+x,
            data:{id:x},
            cache: false,
            success:function(data)
            {
                $('#tableid').html(data);

            }
        });

        document.getElementById("tableid").style.display ="block";
    }
</script>

<script>
    function showtable2(x) {
        // var x = document.getElementById('categoryName').value;

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Items/showItemsTable/")?>'+x,
            data:{id:x},
            cache: false,
            success:function(data)
            {
                $('#tableid').html(data);

            }
        });

        document.getElementById("tableid").style.display ="block";
    }
</script>
