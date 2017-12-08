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
	
	include_once("gatewayapi/inc_gatewayapi.php");	
	
	$_POST['amount'] 	= $_SESSION['amount'];
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
<title><? print $mer_name ?>- Payment Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="phpgatewayapi.css">
<script language="JavaScript">
	var nVisaCardType 				= 0;
	var nMastercardCardType 		= 1;
	var nDiscoverCardType			= 2;
	var nAmexCardType				= 3;
	var nDinersClubCardType			= 4;
	var nCarteBlancheCardType		= 5;
	var nEnRouteCardType			= 6;
	var nJCBCardType				= 7;
	var nUnknownCardType			= 8;
	var cardPics = new Array();

	cardPics[nVisaCardType] = new Image();
	cardPics[nVisaCardType].src="images/cards/visa.jpg";
	cardPics[nMastercardCardType] = new Image();
	cardPics[nMastercardCardType].src="images/cards/mastercard.jpg";
	cardPics[nDiscoverCardType] = new Image();
	cardPics[nDiscoverCardType].src="images/cards/discover.jpg";
	cardPics[nAmexCardType] = new Image();
	cardPics[nAmexCardType].src="images/cards/amex.jpg";
	cardPics[nDinersClubCardType] = new Image();
	cardPics[nDinersClubCardType].src="images/cards/dinersclub.jpg";
	cardPics[nCarteBlancheCardType] = new Image();
	cardPics[nCarteBlancheCardType].src="images/cards/carteblanche.jpg";
	cardPics[nEnRouteCardType] = new Image();
	cardPics[nEnRouteCardType].src="images/cards/enroute.jpg";
	cardPics[nJCBCardType] = new Image();
	cardPics[nJCBCardType].src="images/cards/jcb.jpg";
	cardPics[nUnknownCardType] = new Image();
	cardPics[nUnknownCardType].src="images/cards/invalid.gif";

	//
	// Algorithm to verify a credit number is valid
	//
	function checkLuhn10(number) {
  	  if (number.length > 19)
    	    return (false);

  	  sum = 0; mul = 1; l = number.length;
  	  for (i = 0; i < l; i++) {
    	    digit = number.substring(l-i-1,l-i);
	    tproduct = parseInt(digit ,10)*mul;
	    if (tproduct >= 10)
	      sum += (tproduct % 10) + 1;
	    else
	      sum += tproduct;
	    if (mul == 1)
	      mul++;
	    else
	      mul--;
	  }

	  if ((sum % 10) == 0)
	    return (true);
	  else
	    return (false);
	}

	//
	// Determine the credit card type from the credit card number
	//
	function getCardType(number) {
		var numLength = number.length;

		if(numLength > 4)
		{
			if((number.charAt(0) == '4') && ((numLength == 13)||(numLength==16)))
				return(cardPics[nVisaCardType].src);
			else if((number.charAt(0) == '5' && ((number.charAt(1) >= '1') && (number.charAt(1) <= '5'))) && (numLength==16))
				return(cardPics[nMastercardCardType].src);
			else if(number.substring(0,4) == "6011" && (numLength==16))
				return(cardPics[nDiscoverCardType].src);
			else if((number.charAt(0) == '3' && ((number.charAt(1) == '4') || (number.charAt(1) == '7'))) && (numLength==15))
				return(cardPics[nAmexCardType].src);
			else if((number.charAt(0) == '3') && (numLength==16))
				return(cardPics[nJCBCardType].src);
			else if(((number.substring(0, 4) == "2131") || (number.substring(0, 4) == "1800")) && (numLength==15))
				return(cardPics[nJCBCardType].src);
			else if(((number.substring(0, 4) == "2014") || (number.substring(0, 4) == "2149")) && (numLength==15))
				return(cardPics[nEnRouteCardType].src);
			else if((number.charAt(0) == '3') && (number.charAt(1) == '8') && (numLength == 14))
				return(cardPics[nCarteBlancheCardType].src);
			else if((number.charAt(0) == '3') && (((number.charAt(1) == '0') && ((number.charAt(2) >= '0') && (number.charAt(2) <= '5')))
				|| (number.charAt(1) == '6')) && (numLength == 14))
				return(cardPics[nDinersClubCardType].src);

	    }

	    return(cardPics[nUnknownCardType].src);
	}


	function handleCCTyping (field, event) {
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;

      if (field.cardnum.value.length >= 13)
      {
      	if(!checkLuhn10(field.cardnum.value))
			{
				field.cardimage.src=cardPics[nUnknownCardType].src;
			}
			else
			{
				field.cardimage.src=getCardType(field.cardnum.value);
			}
		} else {
			field.cardimage.src=cardPics[nUnknownCardType].src;
		}

		return true;
	}


	function copyAddress()
	{
		if(document.form1.sInfo.checked == true )
		{
			document.form1.shipping_name.value 		= document.form1.name.value ;
			document.form1.shipping_address1.value 		= document.form1.address1.value ;
			document.form1.shipping_address2.value 		= document.form1.address2.value ;
			document.form1.shipping_city.value 			= document.form1.city.value ;
			document.form1.shipping_zip.value 			= document.form1.zip.value ;
			document.form1.shipping_state.value 		= document.form1.state.value ;
			<? if(!$GatewaySettings['AllowInternational']) { ?>
				document.form1.shipping_state.selectedIndex  = document.form1.shipping_state.selectedIndex;
			<? } ?>
			document.form1.shipping_country.value 		= document.form1.country.value ;
			document.form1.shipping_country.selectedIndex = document.form1.country.selectedIndex;
		}
	}


</script>
<script language="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=590,height=245,left = 490,top = 312');");
}
// End -->
</script>
<script language="JavaScript">
<!--
function showProgress() 
	{
	document.getElementById("progress").style.visibility = 'visible';
	}
//-->
</script>
<script language="JavaScript">
<!--
function submitonce(form1)
	{
	if (document.all||document.getElementById){
		for (i=0;i<form1.length;i++)
	{
		var tempobj=form1.elements[i]
	if(tempobj.type.toLowerCase()=="submit"||tempobj.type.toLowerCase()=="reset")
	tempobj.disabled=true
	}
	}
}
function showProgress()
	{
	document.getElementById("progress").style.visibility = 'visible';
	}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<style type="text/css">
<!--
.style2 {
	color: #990000;
	font-style: italic;
}
#Layer1 {
	position:absolute;
	left:701px;
	top:115px;
	width:101px;
	height:180px;
	z-index:1;
}
.style4 {font-size: 9px}
.style5 {
	color: #CC6600;
	font-weight: bold;
	font-style: italic;
}


-->
</style>
</head>
<meta http-equiv="pragma" content="no-cache">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form method="post" onSubmit="submitonce(this)" name="form1" action="process_transaction.php">
  <input type="hidden" name="rnum" value="<?php echo $rnum; ?>" />
  <p align="center">&nbsp;</p>
  <p align="center"><strong>PAYMENT FORM </strong></p>
  <p align="center">Please enter your billing and shipping information below
    and click submit to process the transaction.<br>
    <span class="style2">Items marked with an &quot;*&quot; are required </span> </p>
  <table width="481" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr class="background">
      <td width="512"><table width="499" border="0" cellpadding="3" cellspacing="1" class="front">
          <tr>
            <td colspan="2" class="highlight">Billing Information</td>
          </tr>
          <tr>
            <td width="143">*Name on Card : </td>
            <td width="341"><input name="name" type="text" id="name" size="40" maxlength="50" value="<? print $_REQUEST['name']; ?>">            </td>
          </tr>
          <tr>
            <td>*Address 1:</td>
            <td><input name="address1" type="text" id="address1" size="40" maxlength="50" value="<? print $_REQUEST['address1']; ?>">            </td>
          </tr>
          <tr>
            <td>&nbsp;Address 2: </td>
            <td><input name="address2" type="text"  size="40" maxlength="60" value="<? print $_REQUEST['address2']; ?>">            </td>
          </tr>
          <tr>
            <td>*City: </td>
            <td><input name="city" type="text" size="40" maxlength="40" value="<? print $_REQUEST['city']; ?>">            </td>
          </tr>
          <tr>
            <td>*State: </td>
            <td><? if($GatewaySettings['AllowInternational']) { ?>
              <input name="state" type="text" size="40" maxlength="40" value="<? print $_REQUEST['state']; ?>">
              <? } else { ?>
              <select name="state" id="select">
                <? print printStateDropdown($_REQUEST['state']); ?>
              </select>
              <? } ?>            </td>
          </tr>
          <tr>
            <td>*Zip: </td>
            <td><input name="zip" type="text" size="10" maxlength="20" value="<? print $_REQUEST['zip']; ?>">            </td>
          </tr>
          <tr>
            <td>*Country: </td>
            <td><select name="country" id="select2">
                <? if($GatewaySettings['AllowInternational']) { ?>
                <option value="">Select a country</option>
                <? print_ISOSelectOptions($ISO3166TwoToName, true, $_REQUEST['country']); ?>
                <? } else { ?>
                <option value="USA">United States</option>
                <? } ?>
              </select>            </td>
          </tr>
          <tr>
            <td>&nbsp;Phone Number: </td>
            <td><input name="phone" type="text"  size="20" maxlength="25" value="<? print $_REQUEST['phone']; ?>">            </td>
          </tr>
          <tr>
            <td>*Email Address: </td>
            <td><input name="email" type="text"  size="40" maxlength="248" value="<? print $_REQUEST['email']; ?>">            </td>
          </tr>
          <tr>
            <td>*Credit Card Number: </td>
            <td><input name="cardnum" type="text"  size="22"  maxlength="22" onChange="handleCCTyping(this.form, event);" onKeyUp="handleCCTyping(this.form, event);" >
              <img src="images/cards/invalid.gif" alt="card_logo" name="cardimage" width="36"  height="24" hspace="10" vspace="0" align="middle">
              <div align="center"></div></td>
          </tr>
          <tr>
            <td>*Expiration Date:</td>
            <td>Mo.
              <select name="exp_month" id="select3">
                <? print printMonthDropdown($_REQUEST['expmo']); ?>
              </select>
              Yr.
              <select name="exp_year" id="select4">
                <? print printYearDropdown($_REQUEST['expyr']); ?>
              </select></td>
          </tr>
          <tr>
            <td>*Security Code:</td>
            <td><input name="CVV2" type="text" size="4" maxlength="4" value="<? print $_REQUEST['CVV2']; ?>">
            <A HREF="javascript:popUp('cvv.html')">What is this?</A></td>
          </tr>
          <tr>
            <td>&nbsp;Total Amount:</td>
            <td><font color="#FF0000"><b><i> $ <? print $_SESSION['amount']; ?></i></b></font></td>
          </tr>
          <!--     <tr>
          <td colspan="2"><div align="right"><img src="images/vbv_mc_.gif" alt="vbv_mcsc" width="315" height="24" border="0" usemap="#Map">
              <map name="Map">
                <area shape="rect" coords="191,3,248,21" href="https://usa.visa.com/personal/security/vbv/index.html" target="_blank" alt="Verified by VISA">
                <area shape="rect" coords="252,3,311,21" href="http://www.mastercard.com/us/personal/en/cardholderservices/securecode/index.html" target="_blank" alt="MasterCard Secure Code">
                </map>
          </div></td>
        </tr>
 -->
          <tr>
            <td colspan="2" class="highlight">Shipping Information</td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td colspan="2"><input type="checkbox" name="sInfo" id="sInfo2" onClick=" copyAddress()">
              Click here if shipping information is the same as billing information.</td>
          </tr>
          <tr>
            <td>&nbsp;Shipping Name : </td>
            <td><input name="shipping_name" type="text" id="shipping_name" size="40" maxlength="50" value="<? print $_REQUEST['shipping_name']; ?>">            </td>
          </tr>
          <tr>
            <td>&nbsp;Shipping Address 1: </td>
            <td><input name="shipping_address1" type="text" id="shipping_address1" size="40" maxlength="50" value="<? print $_REQUEST['shipping_address1']; ?>">            </td>
          </tr>
          <tr>
            <td>&nbsp;Shipping Address 2: </td>
            <td><input name="shipping_address2" type="text" size="40" maxlength="60" value="<? print $_REQUEST['shipping_address2']; ?>">            </td>
          </tr>
          <tr>
            <td>&nbsp;Shipping City: </td>
            <td><input name="shipping_city" type="text" size="40" maxlength="40" value="<? print $_REQUEST['shipping_city']; ?>">            </td>
          </tr>
          <tr>
            <td>&nbsp;Shipping State: </td>
            <td><? if($GatewaySettings['AllowInternational']) { ?>
              <input name="shipping_state" type="text" size="40" maxlength="40" value="<? print $_REQUEST['shipping_state']; ?>">
              <? } else { ?>
              <select name="shipping_state" id="select5">
                <? print printStateDropdown($_REQUEST['shipping_state']); ?>
              </select>
              <? } ?>            </td>
          </tr>
          <tr>
            <td>&nbsp;Shipping Zip: </td>
            <td><input name="shipping_zip" type="text" size="10" maxlength="20" value="<? print $_REQUEST['shipping_zip']; ?>">            </td>
          </tr>
          <tr>
            <td>&nbsp;Shipping Country: </td>
            <td><select name="shipping_country" id="select6">
                <? if($GatewaySettings['AllowInternational']) { ?>
                <option value="">Select a country</option>
                <? print_ISOSelectOptions($ISO3166TwoToName, true, $_REQUEST['shipping_country']); ?>
                <? } else { ?>
                <option value="US">United States</option>
                <? } ?>
              </select>            </td>
          </tr>
          <tr>
            <td height="27"><div align="right"></div></td>
            <td align="right" valign="middle"><div align="left">
                <p align="right" class="style2">
                  <input class="button" type="submit" name="submit" value="Submit" onClick="javascript:showProgress();"/>
                  <span id="progress" style="visibility:hidden"/> <img src="images/ajax-loader.gif" alt="processing" width="148" height="19" align="absmiddle" />              </div></td>
           		  <input type="hidden" name="amount" value="amount">
       	  </tr>
          <tr>
            <td colspan="2" align="center" valign="baseline"><div align="right"><span class="style4">transactions processed by<span class="style5"> <a href="http://www.jetpay.com">JetPay</a></span></span></div></td>
          </tr>
          <tr>
            <td height="45" colspan="2" align="center" valign="middle">
              <div align="right"><img src="images/lock_ok.jpg" alt="ssl secure" width="21" height="21" align="middle"><img src="images/508WAI_Approved.jpg" alt="508/wai" width="85" height="26" align="middle"></div>
            <div align="right"></div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
</body>
</html>
