<?php foreach ($orderInformation as $information){?>
    <div class="panel-heading">  <h4 >Order Information</h4></div>
    <div class="panel-body">

        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" >
            <h2 align="center"> Order Id :<b style="color: green"><?php echo $information->id?></b></h2>


        </div>
        <div style="border: 2px solid green"class="col-md-12">
        <div style="border-right: 2px solid green" align="center" class="col-md-4" >

            <h4>Order Type :</h4>
                     <b><?php  if ($information->orderType=="have"){echo "Restaurant";}
                        elseif($information->orderType=="take"){echo "Pick Up";}
                        elseif($information->orderType=="home"){echo "Home Delivery";}?></b>


        </div>

        <div  style="border-right: 2px solid green" align="center" class="col-md-4" >

            <h4 >Order Date :</h4>
            <b><?php echo preg_replace("/ /"," ",date('d-m-Y h:i A',strtotime($information->orderDate)),1);?></b>

        </div>

        <div  align="center" class="col-md-4">
            <h4>Payment Type :</h4>
            <b><?php if ($information->paymentType=="cs"){echo "Cash";}
                    elseif($information->paymentType=="crd"){echo "Card";}?>
            </b>
        </div>
        </div>

        <div style=";border: 2px solid green;" class="col-md-12">


                <div class="panel-body">
                    <div class="panel-heading">  <h4 style="text-align: center"><b>Client Info</b></h4></div>
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-4" >
                        <h2><?php echo $information->userName?></h2>
                        <p>Member Card No :<?php echo $information->memberCardNo?></p>

                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-8" >

                        <ul class="container details" >

                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $information->email?></p></li>
                            <li><p><span class="fa fa-address-card-o" style="width:50px;"></span><?php echo $information->address?>&nbsp;
                                    <b>P.O :</b><?php echo $information->postalCode?>&nbsp;
                                    <b>City :</b><?php echo $information->cityName?></p>
                            </li>
                            <li><p><span class="glyphicon glyphicon-phone" style="width:50px;"></span><?php echo $information->contactNo?></p></li>
                        </ul>


                    </div>
                </div>

            <?php if (!empty($information->deliveryAddressId)){



                $this->db->select('address,postalCode,contactNo,city.name as cityName,country');
                $this->db->from('userdeliveryaddress');
                $this->db->join('city ','city.id = userdeliveryaddress.fkCity ','left');
                $this->db->where('userdeliveryaddress.id',$information->deliveryAddressId);
                $query = $this->db->get();
                $userDefaultDelivery=$query->result();

                foreach ($query->result() as $userDeliveryAddress ){?>



                    <hr style="margin: 0px;border: 1px solid green;">

                    <div class="panel-body">

                        <div class="panel-heading">  <h4 style="text-align: center"><b>DeliveryInfo Info</b></h4></div>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" >

                            <ul class="container details" >

                                <!--                        <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>--><?php //echo $information->email?><!--</p></li>-->
                                <li><p><span class="fa fa-address-card-o" style="width:50px;"></span><?php echo $userDeliveryAddress->address?>&nbsp;
                                        <b>P.O :</b><?php echo $userDeliveryAddress->postalCode?>&nbsp;
                                        <b>City :</b><?php echo $userDeliveryAddress->cityName?>&nbsp;
                                        <b>Country :</b><?php echo $userDeliveryAddress->country?></p>
                                </li>
                                <li><p><span class="glyphicon glyphicon-phone" style="width:50px;"></span><?php echo $userDeliveryAddress->contactNo?></p></li>
                            </ul>


                        </div>
                    </div>
                <?php }?>
            <?php  } ?>

            <hr style="margin: 0px;border: 1px solid green;">
            <div class="panel-body">
                <div class="panel-heading">  <h4 style="text-align: center"><b>Order Remarks</b></h4></div>
                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6" >

                    <ul class="container details" >
                        <?php echo $information->orderRemarks; ?>
                    </ul>


                </div>
            </div>

        </div>

        <div align="center" class="col-md-12">

            <h4>Order Tacker :</h4>
            <b>
                <?php echo $information->orderTaker; ?>
            </b>

        </div>



    </div>
<?php } ?>