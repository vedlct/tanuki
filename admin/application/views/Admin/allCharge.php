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
                                <header>All Charge LIst</header>

                            </div>
                            <div class="card-body ">

                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                    <tr >
                                        <th width="10%"class="center"> Sr.NO </th>
                                        <th width="50%"class="center"> Delivery Fee </th>
                                        <th width="30%"class="center">Vat</th>
                                        <th width="10%"class="center"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;foreach($charge as $c) { ?>

                                        <tr class="odd gradeX">

                                            <td><?php echo $i; ?></td>
<!--                                            <td class="center">--><?php //echo $c->id; ?><!--</td>-->
<!--                                            <td class="center">-->
                                            <td class="center"><?php echo $c->deliveryfee; ?></td>
                                            <td class="center"><?php echo $c->vat; ?></td>

<!--                                            </td>-->

                                            <td class="center">
                                                <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $c->id ?>" onclick="selectid2(this)">

                                                    <i class="fa fa-pencil"></i>
                                                </button>

                                                <button type="button" data-panel-id="<?php echo $c->id ?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                                                    <i class="fa fa-trash-o "></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <?php $i++;} ?>
                                    </tbody>
                                </table>
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



    function selectid2(x)
    {

        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Charge/getChargeById")?>',
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

        if (confirm("are you sure to delete this Charge detail?"))
        {

            btn = $(x).data('panel-id');
//             alert(btn);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Charge/deleteChargeById")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    alert('Charge deleted Successfully');
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
