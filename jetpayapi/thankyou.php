<?php
		
	/************************************************/
	/* JetPay Merchant Transaction Payment Pages    */
	/*              Version 1.09.01                 */
	/* For questions or assistance with this or any */
	/* pages in this package, please contact JetPay */
	/* Customer Service at 800-834-4405 option 2    */
	/* or email to assist@jetpay.com                */
	/* Development Team:                            */
	/* Dave Lantz - Lead Devlopment and Design      */
	/* Shez Virani - Technical Code Review          */
	/* David Wright - Email and Code Review         */
	/* These pages may not be reproduced or 		*/
	/* distributed with out the concent of JetPayLLC*/
	/* All Rights Reserved                          */
	/* Copyright 2006                               */
	/************************************************/

    ini_set('session.gc_probability','100');
    session_start();

   // require 'Mail.php';
//	require 'Mail/mime.php';
	
    include_once("gatewayapi/inc_gatewaysettings.php"); 
	
// 	// get session data for reprinting in thank you message
// 	$amount   = $_REQUEST['amount'];
// 	$address1 = $_SESSION['address1'];
//     $address2 = $_SESSION['address2'];
// 	$city     = $_SESSION['city'];
// 	$state    = $_SESSION['state'];
// 	$zip      = $_SESSION['zip'];
// 	$country  = $_SESSION['country'];
// 	$name     = $_SESSION['name'];
// 	$email    = $_SESSION['email'];
// 	$tran_id  = $_REQUEST['TransactionID'];
// 	$auth_code  = $_REQUEST['ApprovalCode'];
//     // build the order confirmation e-mail
	
// 	$headers = array('From'    => 'orders@jetpay.com',
//                      'Subject' => 'Order Confirmation');
	
// $text_body = <<<_TXT_
// $mer_name Order Confirmation Email

// Name:    $name
// Address: $address1
//          $address2
// 		 $city, $state $zip
// Amount: $amount
// _TXT_;

// $html_body = <<<_HTML_
// $name, thank you for your order.<br>
// <hr>
// <br>
// Transaction Details of your purchase from $mer_name.<br>
// <br>
// <b>Transaction Status:</b> Approved!<br>
// <b>Transaction ID:</b> $tran_id<br>
// <b>Authorizaton Code:</b> $auth_code<br>
// <b>Amount:</b> $amount<br>
// <br>
// <p>
// <b><i>Billing Information</i></b><br>
// <b>Name:</b><br>
// <i>$name</i><br>
// <b>Address:</b><br> 
// <i>$address1<br>
//   $address2<br>
//   $city, $state $zip</i><br>
// <br>

// If you have questions reguarding your order or order status. Please contact us at:<br>
// <a href="mailto:support@merchnat.com">support@merchant.com</a><br>
// or toll free 800-834-4405 Monday - Friday 8am to 5pm CST.

// _HTML_;

//     $mime = new Mail_mime();
//     $mime->setTXTBody($text_body);
// 	$mime->setHTMLBody($html_body);
	
// 	$msg_body    = $mime->get();
// 	$msg_headers = $mime->headers($headers);
	
// 	$mailer = Mail::factory('mail');
// 	$mailer->send($email, $msg_headers, $msg_body);

// ?>
// <!-- 		
		
		
// 	/************************************************/
// 	/* JetPay Merchant Transaction Payment Pages    */
// 	/*              Version 1.09.01                 */
// 	/* For questions or assistance with this or any */
// 	/* pages in this package, please contact JetPay */
// 	/* Customer Service at 800-834-4405 option 2    */
// 	/* or email to assist@jetpay.com                */
// 	/* Development Team:                            */
// 	/* Dave Lantz - Lead Devlopment and Design      */
// 	/* Shez Virani - Technical Code Review          */
// 	/* David Wright - Email and Code Review         */
// 	/* These pages may not be reproduced or 		*/
// 	/* distributed with out the concent of JetPayLLC*/
// 	/* All Rights Reserved                          */
// 	/* Copyright 2006                               */
// 	/************************************************/


// -->
<html>
<head>
<title><? print $mer_name ?>- Transaction Approved</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #003366;
	font: bold;
}
.style3 {
	color: #990000;
	font-weight: bold;
	font-style: italic;
	font-size: 12px;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF" text="#333333" link="#333333" vlink="#666666" alink="#333333" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<br>
<table width="489" height="26" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#003366">
  <tr>
    <td width="487">&nbsp;</td>
  </tr>
  <tr>
  
  <td><table width="485" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr bgcolor="#FFFFFF" class="text">
       <td width="500"><!--<p align="right"><img src="images/printer.gif" alt="print_page" width="20" height="20"></p></td>-->   
      </tr>
      <tr bgcolor="#FFFFFF" class="text">
       <td><table border="0" align="center" cellpadding="13" cellspacing="0">
          <tr>
           <td><p align="center" class="text"><span class="style1">Your transaction has been Approved! </span><br>
              <span class="style3">Please print this page as your receipt.</span> <br>
              <br>
              <? print "$name"; ?>, thank you for your order<br>
              Conformation of this order has been sent to <? print "$email"; ?>.
              <!--<? print "$address1"; ?><br>-->
              <!--<? print "$address2"; ?><br>-->
              <!--<? print "$city, $state $zip"; ?><br><br>-->
              <!--<? print "$email"; ?><br>-->
              <!--<? print $event; ?>-->
            <hr>
            <table width="426" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="171"><div align="right">Total Amount: </div></td>
                <td width="13">&nbsp;</td>
                <td width="242"><font color="#FF0000"><b><i>$ <? print $_REQUEST['amount']; ?></i></b></font></td>
              </tr>
              <tr>
                <td><div align="right">Transaction ID: </div></td>
                <td>&nbsp;</td>
                <td><? print $_REQUEST['TransactionID']; ?></td>
              </tr>
              <tr>
                <td><div align="right">Authorization Code: </div></td>
                <td>&nbsp;</td>
                <td><? print $_REQUEST['ApprovalCode']; ?></td>
              </tr>
<!-- 			    <tr>
                      <td><div align="right">Action Code: </div></td>
                      <td>&nbsp;</td>
                      <td><? print $_REQUEST['ActionCode']; ?></td>
                    </tr>
					<tr>
                      <td><div align="right">Response Message: </div></td>
                      <td>&nbsp;</td>
                      <td><? print $_REQUEST['ResponceText']; ?></td>
                    </tr>
					<tr>
                      <td><div align="right">AVS: </div></td>
                      <td>&nbsp;</td>
                      <td><? print $_REQUEST['AVS']; ?></td>
-->
              </tr>
              
            </table>
            <hr>
            <div align="center"> <b><i><u><font size="5"><? print $mer_name; ?></font></u></i></b> <br>
              <? print $mer_address1; ?><br>
              <? print $mer_address2; ?></br>
              <? print $mer_city; ?><br>
              <? print $mer_state; ?>, <? print $mer_zip; ?> <br>
              <br>
              <font size="2"><i><? print $mer_tag; ?></i></font>
              <br>
              <br>
              If you have any further questions, contact us at <a href="mailto:support@merchnat.com" support@merchant.com">support@merchant.com</a></div>
            </p></td>
          </tr>
          
        </table></td>
      </tr>
      
      <tr bgcolor="#FFFFFF" class="text">
        <td><form action="mer_post_page.html" method="post" name="form1" target="_self">
            <br>
            <div align="right">
              <input name="Done" type="submit" id="Done" value="Done">
            </div>
          </form></td>
      </tr>
    </table></td>
  </tr>
  
</table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    //window.location.assign("http://sakibrahman.com/demo/tanuki/Items/testmail/66")
    $.ajax({
        type:'POST',
        url:'http://sakibrahman.com/demo/tanuki/Items/checkout',
        cache: false,
        success:function(data)
        {
            // $('#checkOut').load(document.URL +  ' #checkOut');
        }
    });

</script>
</html>
