<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
    
    <?php include ('head.php') ?>
    <title>Tanuki- Japanis Food</title>

</head>

<body>

    <!--[if lte IE 8]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave" id="status">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div><!-- End Preload -->

    <!-- Header ================================================== -->
    <?php include ('menu.php') ?>
	<!-- End Header =============================================== -->

<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_2.jpg" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
	<div id="sub_content">
    	<div id="thumb"><img src="<?php echo base_url()?>public/img/thumb_restaurant.jpg" alt=""></div>
                     <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="<?php echo base_url() ?>feedback">Read Items reviews</a></small>)</div>
                    <h1>Mexican TacoMex</h1>
                    <div><em>Mexican / American</em></div>
                    <div><i class="icon_pin"></i> 135 Newtownards Road, Belfast, BT4 1AB - <strong>Delivery charge:</strong> $10, free over $15.</div>
    </div><!-- End sub_content -->
</div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Home</a></li>
                <li><a href="#0">Tanuki's Dishes</a></li>
                <li>Page active</li>
            </ul>
            <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> Search</a>
        </div>
    </div><!-- Position -->

<!-- Content ================================================== -->
<div class="container-fluid margin_60_35">
		<div class="row">
        
			<div class="col-md-1"></div>
        	<div class="col-md-2">
            <p><a href="list_page.php" class="btn_side">Back to search</a></p>
            <div class="box_style_1">

                <ul id="cat_nav">
                    <?php foreach ($allcategory as $cate) {?>
                        <li><a href="#<?php echo $cate->id ?>" class="active"><?php echo $cate->name ?></a></li>
                        <?php } ?>
                </ul>
            </div><!-- End box_style_1 -->

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>
        </div><!-- End col-md-3 -->
            
			<div class="col-md-5">
				<div class="box_style_2" id="main_menu">
					<h2 class="inner">Menu</h2>
                    <?php foreach ($allcategory as $cate) {?>
					<h3 class="nomargin_top" id="<?php echo $cate->id?>"><?php echo $cate->name?></h3>
					<table class="table table-striped cart-list">
					<thead>
					<tr>
						<th width="60%">
							 Item
						</th>
						<th width="30%">
							 Price
						</th>
						<th width="10%">
							 Order
						</th>
					</tr>
					</thead>
					<tbody>
                    <?php foreach ($allitem as $item) { ?>
                        <?php if ($item->fkCatagory == $cate->id) {?>
					<tr>
						<td width="60%">
                        	<figure class="thumb_menu_list"><img src="<?php echo base_url()?>public/img/menu-thumb-1.jpg" alt="thumb"></figure>
							<h5><a href="<?php echo base_url()?>Feedback/getReview/<?php echo $item->id?>"> <?php echo $item->itemName?></a></h5>
							<p>
                                <?php echo $item->description?>
							</p>
						</td>
						<td width="30%">
							<strong><?php echo $item->price?></strong>
						</td>
						<td class="options" width="10%">
                        <div class="dropdown dropdown-options">
							<?php foreach ($alldefault as $defualt){?>
                            	<?php if ($item->id == $defualt->fkItemId) {?>
									<?php if ($defualt->itemSize == "default" && $defualt->itemsizeStatus == "1" ) {?>
										<a href="#0"> <i class="icon_plus_alt2"  data-panel-id="<?= $item->id ?>" onclick="addcart(this)"></i></a>
							<?php } else { ?>
										<a href="#" class="dropdown-toggle"   data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>

                            <?php	} } }?>


                            <div class="dropdown-menu">
                                <h5>Select an option</h5>
								<?php foreach ($allitemsize as $itemsize) { ?>
								<?php if ($itemsize->fkItemId == $item->id && $itemsize->itemSize != "default") { ?>
                                <label>
                                <input type="checkbox"id="check1" value="<?php echo $itemsize->id?>" class="chk" name="options_1"><?php echo $itemsize->itemSize?><span> $<?php echo $itemsize->price?> </span>
                                </label>
								<?php } }?>
                                <a href="#0" class="add_to_basket" onclick="addcartwithitemsize()" >Add to cart</a>
                            </div>

                        </div>
                    </td>
					</tr>
					<?php } } }  ?>
					</tbody>
					</table>
				</div><!-- End box_style_1 -->
			</div><!-- End col-md-6 -->
            
			<div class="col-md-3" id="sidebar">
            <div class="theiaStickySidebar">
				<div id="cart_box" >
					<h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
					<table id="cart_table" class="table table_summary">
					<tbody>
				<?php	$subtotal = 0 ;foreach ($this->cart->contents() as $c) {

				    ?>
					<tr>
						<td>
							<input type="button"  class="btn btn-default" style="background:#ec008c; text-align: center; width:19px; color: #fff; font-weight: bold; padding:6px 0px;  border-radius:0px; float: left" data-panel-id="<?= $c['rowid'] ?>" onclick="minus(this)" value="-"/>
                            <input type="text"  name="qty" id="<?php echo $c['rowid']?>" class="form-control" style="text-align: center; border-right:none; border-left:none; border-radius:0px; width: 20px; padding:6px 2px; height:auto; float: left" value="<?php echo $c['qty']?>"/>
							<input type="button" class="btn btn-default"data-panel-id="<?= $c['rowid'] ?>" onclick="plus(this)"  style="background:#ec008c; font-weight: bold; color: #fff; text-align: center; border-radius:0px; width: 19px; padding: 6px 0px; float: left" value="+">
                        </td>
                        <td><?php echo htmlspecialchars($c['name'])?>
                        <?php echo $c['id']?>
                        </td>
                        <td> <?php  if ($c['options']['Size'] == "defualt"){}else
							{echo $c['options']['Size'];}?></td>
						<td>
							<strong class="pull-right"><?php echo $c['subtotal'];?></strong>
						</td>
					</tr>
					<?php

				$subtotal = $subtotal + $c['subtotal'];
				} ?>
					</tbody>
					</table>
					<hr>
					<div class="row" id="options_2">
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
						<a href="#0" onclick="takeaway()">	<img style="width: 40px; margin-left: 16px" src="<?php echo base_url()?>public/img/takeaway.jpg"><br>Take Away</a>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
							<a href="#0" onclick="homedelivary()"> <img style="width: 40px; margin-left: 16px" src="<?php echo base_url()?>public/img/homedeli.png"><br>Home Deliver</a>
						</div>
					</div>
					<hr>
					<div class="row" id="options_2">
						<div class="col-lg-6">
							<label>Promo Code :</label>

						</div>
						<div class="col-lg-6">
							<input id="promocode" type="textbox" value="" style="   margin-left: -50px" name="option_2"  onfocusout="discount()" >
						</div>
					</div><!-- Edn options 2 -->
                    
					<hr>
					<table class="table table_summary" id="total_table">
					<tbody>
					<tr>
					<td>
						Oder Type <span class="pull-right"><?php echo $this->session->userdata('orderType') ?></span>
					</td>
					</tr>
					<tr>
						<td>
							 Subtotal <span class="pull-right"><?php echo $subtotal?></span>
						</td>
					</tr>
					<tr>
						<td>
							Discount <span class="pull-right">
<!--                                --><?php //if ( $this->session->userdata('discount') == null)
//							{ echo 0.00;} else{
//									echo $this->session->userdata('discount');
//								} ?><!-- </span>-->
                                <?php $totaldis = 0 ;foreach ($this->cart->contents() as $c){
                                    $totaldis= ((float)$c['coupon'])+ ((float)$totaldis);
                                } echo $totaldis;?>
                            </span>
						</td>
					</tr>
					<tr>
						<td>
							 Delivery fee <span class="pull-right">
								<?php $dfee = 0; $vat = 0; foreach ($charges as $char){
									$dfee = $char->deliveryfee;
									$vat = $char->vat;
								}?>
								<?php echo $dfee ; ?></span>
						</td>
					</tr>

					<tr>
						<td>
							Vat(<?php echo $vat."%"?>) <span class="pull-right"><?php echo  $vatt =(($subtotal-$totaldis)*$vat)/100?></span>
                            <?php
                            $data = array(
                                'vat' => $vatt,

                            );
                            $this->session->set_userdata($data);
                            ?>
						</td>
					</tr>
					<tr>
						<td class="total">
							 TOTAL <span class="pull-right"><?php echo $subtotal+$dfee+$vatt-$totaldis?></span>
						</td>
					</tr>
					</tbody>
					</table>
					<hr>
					<div id="ordertypediv">
					<?php if($this->session->userdata('orderType') != null){ ?>
					<a class="btn_full" href="<?php echo base_url()?>Items/cart">Order now</a>
					<?php }else { ?>
						<a class="btn_full" href="#0" onclick="orderwarning()">Order now</a>
					<?php } ?>
					</div>
				</div><!-- End cart_box -->
                </div><!-- End theiaStickySidebar -->
			</div>
            <!-- End col-md-3 -->
            
		</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
	<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->
    
<?php include ('login_logout.php')?>
    
    <!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_close"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon-search-6"></i>
			</button>
		</form>
	</div>
	<!-- End Search Menu -->
    
<!-- COMMON SCRIPTS -->
<script src="<?php echo base_url()?>public/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url()?>public/js/common_scripts_min.js"></script>
<script src="<?php echo base_url()?>public/js/functions.js"></script>
<script src="<?php echo base_url()?>public/assets/validate.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script  src="<?php echo base_url()?>public/js/cat_nav_mobile.js"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="<?php echo base_url()?>public/js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
      additionalMarginTop: 80
    });
</script>
<script>
$('#cat_nav a[href^="#"]').on('click', function (e) {
			e.preventDefault();
			var target = this.hash;
			var $target = $(target);
			$('html, body').stop().animate({
				'scrollTop': $target.offset().top - 70
			}, 900, 'swing', function () {
				window.location.hash = target;
			});
		});
</script>

<script>
	function addcart(x) {
	    //alert("hellasdasdado");
		btn = $(x).data('panel-id');

		//alert(btn);

		$.ajax({
			type:'POST',
			url:'<?php echo base_url("Items/insertCart/")?>'+btn,
			data:{'id':btn},
			cache: false,
			success:function(data)
			{
				$('#cart_table').load(document.URL +  ' #cart_table');
				$('#total_table').load(document.URL +  ' #total_table');
			}

		});
	}
    function minus(x) {

        var btn = $(x).data('panel-id');
        var x = parseInt(document.getElementById(btn).value);
        var newx= x-1;

        document.getElementById(btn).value = newx;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/updateCart/")?>' + btn,
            data: {'id':btn, 'amount':newx },
            cache: false,
            success: function (data) {
                // $('#txt').html(data);
                //  alert(data);
				$('#cart_table').load(document.URL +  ' #cart_table');
				$('#total_table').load(document.URL +  ' #total_table');
            }

        });

    }
    function plus(x) {

        var btn = $(x).data('panel-id');

        var x = parseInt(document.getElementById(btn).value);
        var newx= x+1;


        document.getElementById(btn).value = newx;
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Items/updateCart/")?>' + btn,
            data: {'id':btn, 'amount':newx },
            cache: false,
            success: function (data) {
                // $('#txt').html(data);
				$('#cart_table').load(document.URL +  ' #cart_table');
				$('#total_table').load(document.URL +  ' #total_table');

            }

        });


    }

	function addcartwithitemsize() {

        //    alert("hellow");
        var chkArray = [];
        var i;
        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".chk:checked").each(function () {
            chkArray.push($(this).val());
        });


        for (i = 0; i < chkArray.length; i++) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Items/insertItemSizeCart/")?>' + chkArray[i],
                data: {'id': chkArray[i]},
                cache: false,
                success: function (data) {
                    // $('#txt').html(data);
                    //alert(data);
                      $('#cart_table').load(document.URL +  ' #cart_table');
					$('#total_table').load(document.URL +  ' #total_table');
                }

            });
             $("input:checkbox").attr('checked', false);

        }
    }

    function discount() {

		var promocode = document.getElementById("promocode").value;

			$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Items/promocode/")?>' ,
			data: {'promocode': promocode},
			cache: false,
			success: function (data) {
				if (data == "00"){
					alert ("Promo code not Valid");
				}else  {
					$('#cart_table').load(document.URL +  ' #cart_table');
					$('#total_table').load(document.URL +  ' #total_table');
				}
			}

		});
	}

	function takeaway() {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Items/takeaway/")?>' ,
			cache: false,
			success: function (data) {
				$('#cart_table').load(document.URL +  ' #cart_table');
				$('#total_table').load(document.URL +  ' #total_table');
				$('#ordertypediv').load(document.URL +  ' #ordertypediv');
			}

		});
	}

	function homedelivary() {

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Items/homedelivary/")?>' ,
			cache: false,
			success: function (data) {
				$('#cart_table').load(document.URL +  ' #cart_table');
				$('#total_table').load(document.URL +  ' #total_table');
				$('#ordertypediv').load(document.URL +  ' #ordertypediv');

			}

		});
	}

	function orderwarning() {
		alert("Please Select A Order Type")
	}
</script>
</body>
</html>