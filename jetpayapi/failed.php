<?PHP
		
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
		
	include_once("gatewayapi/inc_gatewaysettings.php");
	
	$_SESSION['amount'] = $_SESSION['amount'] / 100;
	$amount = $_SESSION['amount'];
	$amount = $amount * 100;		
	$_SESSION['address1'];
    $_SESSION['address2'];
	$_SESSION['city'];
	$_SESSION['state'];
	$_SESSION['zip'];
	$_SESSION['country'];
	$_SESSION['name'];
	$_SESSION['email'];
	
?>
<html>
<head>
<title><? print $mer_name ?>- Transaction Declined</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#333333" link="#333333" vlink="#666666" alink="#333333" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<br>
<table width="580" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#003366">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="580" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr bgcolor="#F5F5F5" class="text">
          <td><p align="center">&nbsp;</p></td>
        </tr>
        <tr bgcolor="#FFFFFF" class="text">
          <td><table width="100%" border="0" cellpadding="13" cellspacing="0">
              <tr>
                <td><p class="text">We're Sorry, we can not process your transaction at this time for the following reason: <br>
                    <br>
                    <font color="ff0000"><?php echo $_REQUEST['gateway_error']; ?></font> <br>
					<!--<font color="#FF0000"><b><? print $_SESSION['amount']; ?></b></font>-->
                    <br>
                    Please <a href="javascript:history.go(-1)">click here</a> to submit your transaction again. <span class="text"><br>
                    </span> </p></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="center"><font size="1">We really appreciate your business <? print $mer_name; ?>.</font></div></td>
              </tr>
              <tr>
                <td><div align="right"></div></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
