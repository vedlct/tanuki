

<?php foreach ($userInfo as $info){?>
            <div class="panel-heading">  <h4 >User Info</h4></div>
            <div class="panel-body">

                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-4" >
                    <h2><?php echo $info->name?></h2>
                    <p>Member Card No :<?php echo $info->memberCardNo?></p>

                </div>
                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-8" >

                    <ul class="container details" >

                        <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $info->email?></p></li>
                        <li><p><span class="fa fa-address-card-o" style="width:50px;"></span><?php echo $info->address?>&nbsp;
                                <b>P.O :</b><?php echo $info->postalCode?>&nbsp;
                                <b>City :</b><?php echo $info->cityName?></p>
                        </li>
                        <li><p><span class="glyphicon glyphicon-phone" style="width:50px;"></span><?php echo $info->contactNo?></p></li>
                    </ul>


                </div>
            </div>
<?php }?>


