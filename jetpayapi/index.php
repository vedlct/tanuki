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
	$_SESSION['amount']   = $_POST['amount'];
	
	
	// Start Domain Blocking
	$Referer = getenv("HTTP_REFERER");
	 
// 	if (!strchr($Referer, "http://localhost/")) 
// 	{ 
// 		echo "<script>alert('Access Denied');window.location='ordermod/404.php';</script>"; 
// 	  exit(); 
// 	} 
	
	// Get user information and write to log file 
	// file which the script writes to
	$counter = "merchant_redirects.txt";
	
	// Date
	$today = getdate();
	$month = $today[month];
	$mday = $today[mday];
	$year = $today[year];
	$current_date = $mday . $month . $year;
		
	// writes to file visitor.txt;
	$fp = fopen($counter, "a");
	$line = $REMOTE_ADDR . "|" . $mday . $month . $year . "\n";
	$size = strlen($line);
	fputs($fp, $line, $size);
	fclose($fp);
	
	//this shows up on the page
	// echo "IP Address: " . $_SERVER['REMOTE_ADDR'] . "<br>"; // Display IP address 
	// echo "Referrer: " . $_SERVER['HTTP_REFERER'] . "<br>"; // Display the referrer 
	// echo "Browser: " . $_SERVER['HTTP_USER_AGENT'] . ""; // Display browser type 


?>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><? print $mer_name ?>Security Page</title>

<script type="text/javascript">
<!--
var count = 2; // currently set to 2 seconds - change as necessary

function counter() // this function must be called in the html document as follows: <body onload="counter()">
{
	count--;
	
	if(count == 0) 
	{ 
		window.location = "orderform.php"; // enter the location that you wish to redirect visitors to
	}

	setTimeout("counter()", 1000); // timeout function invokes and loops the function every second.
}
//-->
</script>

<style type="text/css">
<!--
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.style4 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
-->
</style>

</head>
<body bgcolor="#FFFFFF" text="#333333" link="#333333" vlink="#666666" alink="#333333" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="counter()">
<br>
<table width="584" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#003366">
  <tr>
    <td width="582" bgcolor="#006699">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="580" border="0" align="center" cellpadding="5" cellspacing="0">
         <tr bgcolor="#FFFFFF" class="text">
		 
          <td height="181" align="center" valign="middle"><p align="center"><img src="images/icon_security.gif" alt="lock" width="34" height="35" align="absmiddle">Securing Your Session </p>
	      <p align="center"><img src="images/ajax-loader.gif" alt="progress" width="220" height="19"></p>
		  <!--<p align="center"><? print $_SESSION['amount']; ?></p>-->
		  </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
