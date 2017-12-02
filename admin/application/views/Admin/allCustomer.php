
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                        <thead>
                                                        <tr>

                                                            <th width="5%"> Serial </th>
                                                            <th width="20%"> Name </th>
                                                            <th width="10%"> Email </th>
                                                            <th width="10%"> MemberCardNo </th>
                                                            <th width="5%"> UserAcivatin Status </th>
                                                            <th width="10%">Password</th>
                                                            <th width="10%">Contact No</th>
                                                            <th width="20%">Address</th>
                                                            <th width="10%">Action </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;foreach($user as $u) { ?>
                                                            <tr class="odd gradeX">
                                                                <td><?php echo $i?></td>
                                                                <td><?php echo $u->name?></td>
                                                                <td class="left"><?php echo $u->email?></td>
                                                                <td class="left"><?php echo $u->memberCardNo?></td>
                                                                <td class="left"> <?php if($u->userActivationStatus==1)
                                                                    {
                                                                        echo "active";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "inactive";
                                                                    }

                                                                    ?></td>
                                                                <td><?php echo $u->password ; ?></td>
                                                                <td class="left"><?php echo $u->contactNo ?></td>
                                                                <td> <?php echo $u->address?>,<?php echo $u->fkcity?>,<?php echo $u->postalCode?>;</td>

                                                                <td class="center">
                                                                    <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $u->id ?>" onclick="selectid2(this)">

                                                                        <i class="fa fa-pencil"></i>
                                                                    </button>

                                                                    <button type="button" data-panel-id="<?php echo $u->id ?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                                                                        <i class="fa fa-trash-o "></i>
                                                                    </button>
                                                                </td>

                                                            </tr>
                                                            <?php  $i++;}	?>
                                                        </tbody>
                                                    </table>


