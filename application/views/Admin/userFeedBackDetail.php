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
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">UserFeedback</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a class="parent-item" href="#">UserFeedback</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">User Feedback List</li>
                        </ol>
                    </div>
                </div>

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
                                <header>User Feedback</header>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="btn-group pull-right">
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <table class="orderexmple table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                    <tr >
                                        <th width="10%"class="center"> Sr.NO </th>
                                        <th width="10%"class="center">Item Name </th>
                                        <th width="10%"class="center">Customer Name </th>
                                        <th width="20%"class="center"> Feedback Detail</th>
                                        <th width="10%"class="center"> Customer Rating</th>
                                        <th width="20%"class="center"> Feedback Time date(d-m-y)</th>
                                        <th width="20%"class="center"> Action </th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php $i=1; foreach($userFeedback as $f) { ?>
                                        <tr class="odd gradeX">

                                            <td> <?php echo $i?></td>
                                            <td class="center"> <?php echo $f->itemName?> </td>
                                            <td class="center"> <?php echo $f->name ?></td>
                                            <td class="center"> <?php echo $f->feedback ?></td>
                                            <td class="center"> <?php echo $f->userRating ?></td>
                                            <td class="center"> <?php echo $f->feedbackTime ?></td>
<!--                                            <td class="center"> --><?php //echo $f->fkUserId ?><!--</td>-->


                                            <td  class="center">
                                                <button style="margin-top:3px;"  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $f->fid ?>" onclick="selectid2(this)">

                                                    <i class="fa fa-pencil"></i>
                                                </button>

                                                <button style="margin-top:3px;" type="button" data-panel-id="<?php echo $f->fid ?>" onclick="selectid8(this)"class="btn btn-danger btn-xs">

                                                    <i class="fa fa-trash-o "></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php  $i++;}	?>
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
            url:'<?php echo base_url("Admin/Feedback/updateUserFeedback")?>',
            data:{id:btn},
            cache: false,
            success:function(data) {

                $('#txtHint').html(data);

            }
        });
        modal.style.display = "block";

    }

    function selectid8(x)
    {

        if (confirm("are you sure to delete this  Feedback?"))
        {

            btn = $(x).data('panel-id');
//            alert(btn);

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Feedback/deleteUserfeedbackById")?>',
                data: {id:btn},
                cache: false,
                success: function (data) {

                    location.reload();
                    //alert(data)


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
