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

	include_once("inc_gatewayfunctions.php");

	// The scary looking words here just make it so we don't have to redefine these strings for
	// every GatewayTransaction instance.
	// 
	// Edit these error strings as you see fit.
	$GLOBALS['_transient']['static']['GatewayTransaction']->ErrorStrings = array (
			"MISSING_LOGIN"		=>	"The Gateway login information for this store is not configured properly.",
			"MISSING_AMOUNT"	=>	"This transaction requires an amount field.",
			"MISSING_CCNUMBER"	=>	"This transaction requires a credit card number.",
			"MISSING_EXPDATE"	=>	"This transaction requires a credit card expiration date.", 
			"MISSING_ROUTINGNUM"	=>	"This transaction requires a checking account routing number.",
			"MISSING_ACCOUNTNUM"	=>	"This transaction requires a checking account number.",
			"MISSING_TRANSACTIONID"	=>	"This transaction requires a Transaction Id to reference.",
			"MISSING_CURL"		=>	"The socket library for this store is missing or is not configured properly.",
			"MISSING_URL"		=>	"The Gateway url for this store is not configured properly.",
			"MISSING_DATA"		=>	"There seems to be a problem, no data was received for authorization. You have not been charged anything. Please try again or contact support for help.",
			"INVALID_CCNUMBER"	=>	"The credit card number entered is not valid.",
			"INVALID_EXPDATE"	=>	"The credit card expiration date entered is not valid.",
			"INVALID_ROUTINGNUM"	=>	"The checking account routing number entered is not valid.",
			"INVALID_AMEXCVV"	=>	"The security code for American Express cards is found on the front of the card on the right side, and should be 4 digits.",
			"INVALID_CVV"		=>	"The security code for your credit card should be found in the signature area on the back of the card, and should be 3 digits.",
			"INVALID_TYPE"		=> 	"This payment library does not recognize the type of transaction you are attempting. Please contact support for help.",
			"INVALID_METHOD"	=>	"This payment library does not recognize the method of payment you are attempting. Please contact support for help.",
			"UNACCEPTED_CARD"	=>	"We're sorry, we cannot accept this type of card. Please use a different one.",
			"UNACCEPTED_ECHECKS"	=>	"We're sorry, we cannot currently accept electronic checks as payment. Please select a different payment option.",
			"AMOUNT_TOOLOW"		=>	"We're sorry, we cannot accept transactions less than $1.00.",
			"AMOUNT_TOOHIGH"	=>	"We're sorry, we cannot accept transactions of $100,000 or more. Please split up your payments, or contact support for help.",
			"EXPIRED_EXPDATE"	=>	"We're sorry, this credit card has expired. Please use a different card or change the expiration date if you have received an updated card.",
			);

	$GLOBALS['_transient']['static']['GatewayTransaction']->GatewayFieldNames = array (
		/* (Gateway Field Name,		Max Length,	Pre-Processing Callback Function, 	Field name to send to GatewayTransaction Class) */
		array ("x_bank_aba_code",			9,		StripNonNumeric,			"check_aba_code"),
		array ("x_bank_acct_num",			20,		StripNonNumeric,			"check_acct_num"),
		array ("x_bank_acct_type",			8,		NULL,					"check_acct_type"),
		array ("x_bank_name",				50,		NULL,					"check_bank_name"),
		array ("x_bank_acct_name",			40,		NULL,					"check_acct_name"),
		array ("x_echeck_type",				3,		NULL,					"check_type"),	
		array ("x_name",				50,		NULL,					"name"),
		array ("x_address1",				50,		NULL,					"address1"),
		array ("x_address2",				60,		NULL,					"address2"),
		array ("x_city",				40,		NULL,					"city"),
		array ("x_state",				40,		NULL,					"state"),
		array ("x_zip",					20,		NULL,					"zip"),
		array ("x_country",				60,		NULL,					"country"),
		array ("x_phone",				25,		NULL,					"phone"),
		array ("x_customer_ip",				15,		NULL,					"customer_ip"),
		array ("x_email",				248,		NULL,					"email"),
		array ("x_header_email_receipt",		1024,		NULL,					"header_email_receipt"),
		array ("x_footer_email_receipt",		1024,		NULL,					"footer_email_receipt"),
		array ("x_ship_to_name",			50,		NULL,					"shipping_name"),
		array ("x_ship_to_address1",			50,		NULL,					"shipping_address1"),
		array ("x_ship_to_address2",			60,		NULL,					"shipping_address2"),
		array ("x_ship_to_city",			40,		NULL,					"shipping_city"),
		array ("x_ship_to_state",			40,		NULL,					"shipping_state"),
		array ("x_ship_to_zip",				20,		NULL,					"shipping_zip"),
		array ("x_ship_to_country",			60,		NULL,					"shipping_country"),
		array ("x_amount",				15,		NULL				"amount"),
	);
	
	
	
	class GatewayTransaction
	{
		// Email Settings
		var $email_customer;
		var $merchant_email;
		var $header_email_receipt;
		var $footer_email_receipt;
		
		// Customer Information
		var $name;
		var $address1;
		var $address2;
		var $phone;
		var $city;
		var $state;
		var $zip;
		var $country;
		var $email;
		var $customer_ip;
	
		// Shipping Information
		var $shipping_name;
		var $shipping_address1;
		var $shipping_address2;
		var $shipping_city;
		var $shipping_state;
		var $shipping_zip;
		var $shipping_country;
			
		// Transaction Information
		var $amount;
		var $tran_id;				// Gateway Transaction to reference for credit, void or prior_auth_capture
			
		// E-Check Information
		var $check_type;
		var $check_acct_name;
		var $check_bank_name;
		var $check_acct_type;
		var $check_acct_num;
		var $check_aba_code;
	
		
		var $ErrorStrings;
		var $GatewayFieldNames;
	
		function GatewayTransaction($variables, $ipaddress)
		{
			global $GatewaySettings;
			
			$this->ErrorStrings = & $GLOBALS['_transient']['static']['GatewayTransaction']->ErrorStrings;		
			$this->GatewayFieldNames = & $GLOBALS['_transient']['static']['GatewayTransaction']->GatewayFieldNames;					
			
			// Gateway options
			$this->method = "CC";   
			if($variables['method'])
				$this->method = $variables['method'];
				
			$this->type = "AUTH_CAPTURE"; 		
			if($variables['type'])
				$this->type = $variables['type'];
		
					
			// Email Settings
			$this->email_customer 	= $GatewaySettings['email_customer'];
			if($variables['email_customer'])
				$this->email_customer = $variables['email_customer'];
			
			$this->merchant_email	= $GatewaySettings['merchant_email'];
			if($variables['merchant_email'])
				$this->merchant_email = $variables['merchant_email'];
			
			$this->header_email_receipt = $GatewaySettings['header_email_receipt'];
			if($variables['header_email_receipt'])
				$this->header_email_receipt = $variables['header_email_receipt'];
				
			$this->footer_email_receipt = $GatewaySettings['footer_email_receipt'];
			if($variables['footer_email_receipt'])
				$this->footer_email_receipt = $variables['footer_email_receipt'];
			
			
			// Contact Information
			$this->name	= $variables['name']; 
			$this->phone		= $variables['phone'];
			$this->address1		= $variables['address1'];
			$this->address2		= $variables['address2'];
			$this->city		= $variables['city']; 
			$this->state		= $variables['state'];
			$this->zip		= $variables['zip'];
			$this->country		= $variables['country'];
			$this->company		= $variables['company'];
			$this->email		= $variables['email'];
			$this->customer_ip	= $ipaddress;
			
			
			// Transaction Information 
			$this->card_num			= StripNonNumeric($variables['card_num']);
			$this->exp_month		= StripNonNumeric($variables['exp_month']);
			$this->exp_year			= StripNonNumeric($variables['exp_year']);
			$this->card_code		= StripNonNumeric($variables['card_code']);
			$this->amount			= StripNonMoney($variables['amount']);
			$this->customer_id		= $variables['customer_id']; // For your reference; not used by JetPay.
			$this->invoice_num		= $variables['invoice_num'];
			$this->description		= $variables['comments'];
			$this->tran_id			= StripNonNumeric($variables['tran_id']);
			$this->recurring_billing	= $variables['recurring_billing'];
			$this->currency_code		= $variables['currency_code'];
			
			
			// Shipping Information 
			$this->shipping_company 	= $variables['shipping_company'];
			$this->shipping_first_name 	= $variables['shipping_first_name'];
			$this->shipping_last_name	= $variables['shipping_last_name'];
			$this->shipping_address 	= $variables['shipping_address'];
			$this->shipping_city 		= $variables['shipping_city'];
			$this->shipping_state 		= $variables['shipping_state'];
			$this->shipping_zip 		= $variables['shipping_zip'];
			$this->shipping_country		= $variables['shipping_country']; 
			
			
			// E-Check Information 
			$this->check_aba_code	= StripNonNumeric($variables['check_aba_code']);  	// Customer Routing Number
			$this->check_acct_num	= StripNonNumeric($variables['check_acct_num']);  	// Customer Account Number
			$this->check_acct_type	= $variables['check_acct_type']; 	// Customer Account Type ("CHECKING" or "SAVINGS")
			$this->check_bank_name	= $variables['check_bank_name'];  	// Customer Bank Name
			$this->check_acct_name	= $variables['check_acct_name']; 	// Customer Bank Account Owner
			$this->check_type	= $variables['check_type'];   		// Must be "CHECKING", if anything.
			
			
		
		function VerifyFields(&$errorCode)
		{
			global $GatewaySettings;
				
			// Check for required settings
			if(!$this->username || (!$this->tran_key && !$this->password))
			{
				$errorCode = "MISSING_LOGIN";
				return(false);
			}	
				
			// Check for required Transaction data
			if($this->type == "SALE" 
				|| $this->type == "AUTH_ONLY"
				|| $this->type == "CREDIT")
			{
				// Check for an amount
				if(!VerifyAmount($this->amount, $errorCode))
					return(false);
				
				// Check for a payment method
				if($this->type != "CREDIT")
				{
					if($this->method == "CC")
					{
						if(!VerifyCCNumber($this->card_num, $errorCode))
							return(false);
							
						if(!VerifyExpirationDate($this->exp_month, $this->exp_year, $errorCode))
							return(false);
						else
							$this->exp_date = $this->exp_month . $this->exp_year;
							
						if($this->card_code)
							if(!VerifyCVVCode($this->card_code, $this->card_num, $errorCode))
								return(false);
					}
					else if($this->method == "ECHECK")
					{
						if(!$GatewaySettings['AllowEChecks'])
						{
							$errorCode = "UNACCEPTED_ECHECKS";
							return(false);
						}
						
						if(!VerifyRoutingNumber($this->check_aba_code, $errorCode))
							return(false);
							
						if(!VerifyCheckingAccountNumber($this->check_acct_num, $errorCode))
							return(false);
					}
					else
					{
						$errorCode = "INVALID_METHOD";
						return(false);
					}
				}
				else
				{
					if($this->tran_id === "")
					{
						$errorCode = "MISSING_TRANSACTIONID";
						return(false);
					}
				}
			}
			else if($this->type == "VOID"
					|| $this->type == "PRIOR_AUTH_CAPTURE")
			{
					if($this->tran_id === "")
					{
						$errorCode = "MISSING_TRANSACTIONID";
						return(false);
					}				
			}
			else
			{
				$errorCode = "INVALID_TYPE";
				return(false);
			}
			
			return(true);
		}		
			
			
		function CreatePostString()
		{
			global $GatewaySettings;
			
			$postString = "";
			
			$numFields = count($this->GatewayFieldNames);
			for($iField = 0; $iField < $numFields; $iField++)
			{
				list($gField, $maxLength, $callback, $classField) = $this->GatewayFieldNames[$iField];
				
				// Run special formatting functions
				if($callback)
					$value = $callback($this->$classField);
				else
					$value = $this->$classField;
					
				if($value !== "")
				{	
					// Truncate to maximum length for field
					$value = substr($value, 0, $maxLength);
					
					// Append value to request
					$postString .= $gField . "=" . rawurlencode($value) . "&";
				}
			}
			
			return($postString);
		}
		
		
		function ProcessTransaction(&$response, &$errorCode)
		{
			global $GatewaySettings;
			
			if(!$this->VerifyFields($errorCode))
				return(false);
				
			$postString = $this->CreatePostString();
			
			if(!SendHTTPPostData($postString, $GatewaySettings['url'], $response, $errorCode))
				return(false);
				
			return(true);
		}
		
		
		function GetErrorString($errorCode)
		{
			return($this->ErrorStrings[$errorCode]);
		}
	};




?>
