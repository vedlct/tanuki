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

	// Gateway Settings
	
	// Card Acceptance - true if the merchant takes the card type | false if the mrechant does not take the card type.
		$GatewaySettings['AllowMC']				= true;
		$GatewaySettings['AllowVisa']				= true;
		$GatewaySettings['AllowAmex']				= false;
		$GatewaySettings['AllowDiscover']			= false;
		$GatewaySettings['AllowJCB']				= false;
		$GatewaySettings['AllowDiners']				= false;
		$GatewaySettings['AllowCarteBlanche']			= false;
		$GatewaySettings['AllowEnRoute']			= false;

	// ACH (E_Checks) Acceptans - "true" if the merchant takes the ACH | "false" if the mrechant does not take ACH.
	// (Future Implementation)
	//  $GatewaySettings['AllowEChecks']			= true;
	
	// Merchant to accept international transactions true if the merchant does international | false if the mrechant does not accept international.
		$GatewaySettings['AllowInternational']			= false;

	// Transaction Type Setting
		$transactionType = "SALE";
		
	// Enter the Terminal ID or "TID" as for this merchnat
	// NOTE: TID is case sensitive
		$tid = "TESTTERMINAL";
	
	// Version and Subscriber information **DO NOT EDIT**
		$verSub = "Jp API 1.0";
				
	//Minium transaction amount ***this amount must reflect the amount *100 i.e 1.00 = 100, 10.00 = 1000 etc.***
		$minTransAmount = "100";
		$maxTransAmount = "50000";
	
	// This is the merchant information that will apper on the thankyou.php when a transaction has been approved. 
	// **Note** change only the information in single quotes exp. $mer_domain = 'CHANGETHIS';
	// **Note** $mer_name will also populate the page header for each web page.
	
		$mer_domain = 'jetpay.com';
		$mer_name = 'Test Merchant';
		$mer_address1 = '3361 Boyington Dr';
		$mer_address2 = 'Suite 180';
		$mer_city = 'Carrollton';
		$mer_state = 'Texas';
		$mer_zip = '75006';
		$mer_phone = '972-503-8900';
		$mer_fax = '972-503-9100';
		$mer_tag = '"Thanks For Shopping With Us!"';
		
	// Email Settings
		$GatewaySettings['email_customer']			= "FALSE";		// "TRUE"/"FALSE"
		$GatewaySettings['merchant_email']			= "dlantz@jetpay.com";			// Your Email address to send copy of receipts to, if you want them.
		$GatewaySettings['header_email_receipt']		= "Thanks for your purchase!";
		$GatewaySettings['footer_email_receipt']		= "Please come again!";

	// Environment Configuration
		$GatewaySettings['url']				= "https://test1.jetpay.com/jetpay"; // Test url (Post XML)
	//	$GatewaySettings['url']				= "https://gateway17.jetpay.com/jetpay"; //Production url (Post XML)
	
	//------DO NOT EDIT BELOW THIS LINE-----------
	// If the curl extension is not loaded in your php setup, you can use the curl command line tool.
	// If you do not have the curl command line tool and you want to use it instead of adding the curl
	// 	PHP extension, you can download it from: http://curl.haxx.se/download.html
		$GatewaySettings['curl_location']			= "/usr/bin/curl";

	// If transaction approved send to Approval Page
		$GatewaySettings['PaymentApprovedPage']			= "thankyou.php"; 	// Approval Page
	
	// If transaction not approved send to Decline page
		$GatewaySettings['PaymentDeniedPage']			= "failed.php";     // Failure Page

	// If wrong MathLab answer entered send to 404 page
		$GatewaySettings['404MathLab']				= "404.php";		//404 Error Page
?>
