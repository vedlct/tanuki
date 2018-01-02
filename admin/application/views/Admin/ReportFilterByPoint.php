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
                                    <!--                                    <form method="post" action="--><?php //echo base_url()?><!--Report/searchByDate">-->
                                    <div class="col-md-3 col-sm-3" >
                                        <div class="form-group" >

                                            <label for="date">Search For Details</label>
                                            <input type="text" class="form-control" id="memberid" name="memberid" placeholder="Membership ID">
                                        </div >
                                    </div>
                                    <button style="margin-top: 30px"  id="addRow" onclick="searchMember()" class="btn btn-info">
                                        submit
                                    </button>
                                    <!--                                    </form>-->

                                </div>



                                <div class="table table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                        <thead>
                                        <tr>
                                            <th width="" class="center"> SL </th>
                                            <th width="" class="center"> Customer Name </th>
                                            <th width="" class="center"> Membership No </th>
                                            <th width="" class="center"> Earn Point</th>
                                            <th width="" class="center"> Expense Point </th>
                                            <th width="" class="center"> Left Point </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1; ;$qun= 0; $rate=0;$discount=0; foreach ($allreportearnpoint as $er) {  ?>

                                            <tr>
                                                <td class="center"><?php echo $count ?></td>
                                                <td class="center"><?php echo $er->username ?></td>
                                                <td class="center"><?php echo $er->memberCardNo ?></td>
                                                <td class="center"><?php echo $earnpoint = $er->earnpoint ?></td>

                                                <?php $expensepoint ="0";foreach ($allreportexpensepoint as $en){
                                                    if ($er->uid == $en->uid){?>
                                                        <td class="center"><?php echo $expensepoint = $en->expensepoint ;?></td>
                                                    <?php }else{ ?>
                                                        <td class="center"><?php echo $expensepoint ;?></td>
                                                    <?php }?>

                                                    <td class="center"><?php echo ($earnpoint - $expensepoint) ?></td>
                                                <?php }  ?>



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
     </div>





    <!-- end page content -->



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

    function searchMember() {

        var memberid = document.getElementById('memberid').value;



        if (memberid == ""){

            alert('Enter a member Id First');
            return false;
        }
        else
        {
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Report/searchByMemberIdForPoint" )?>',
                data:{'memberid':memberid,},
                cache: false,
                success:function(data)
                {
                    //alert(data);
                    $('#example4').html(data);
                }
            });
        }

    }
</script>