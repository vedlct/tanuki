<!--	
		
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


	
-->
<?php

	include_once("gatewayapi/inc_gatewaysettings.php"); 
	 
	$_SESSION['amount'];
	$_REQUEST['amount'];
	$_SESSION['address1'];
    $_SESSION['address2'];
	$_SESSION['city'];
	$_SESSION['state'];
	$_SESSION['zip'];
	$_SESSION['country'];
	$_SESSION['name'];
	$_SESSION['email'];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><? print $mer_name ?>Error 404</title>
</head>
<body bgcolor="#FFFFFF" text="#333333" link="#333333" vlink="#666666" alink="#333333" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<br>
<table width="585" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#003366">
  <tr>
    <td width="583">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="580" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr bgcolor="#F5F5F5" class="text">
          <td><p align="center"><? print $mer_name ?> Error 404 </p></td>
        </tr>
        <tr bgcolor="#FFFFFF" class="text">
          <td height="181" align="left" valign="top"><p align="center"> <br>
              We're sorry but we were not able to properly authenticate your login credentials. <br>
              If you fill that you have reached this page in error please <a href="javascript:history.go(-2)">click here</a> to return. </p>
            <p align="center">&nbsp;</p></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>