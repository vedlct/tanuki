<?
		
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
	
$localDate=getdate();
$minYear = $localDate["year"];
$maxYear = $minYear + 15;

function printYearDropdown($sel='')
{
  global $minYear, $maxYear;

  $output =  "<option value=''>--</option>";
  for($i=$minYear; $i<$maxYear; $i++) {
    $output .= "<option value='". substr($i, 2, 2) ."'".($sel==(substr($i, 2, 2))?' selected':'').
	">". $i ."</option>";
  }
  return($output);
}

function printMonthDropdown($sel='')
{
  $output =  "<option value=''>--</option>";
  for($i=1; $i<13; $i++) {
    if($i<10)
	$value = "0" . $i;
    else
	$value = $i;
    $output .= "<option value='". $value."'".($sel==$i?' selected':'').
	">". $value ."</option>";
  }
  return($output);
}

?>
