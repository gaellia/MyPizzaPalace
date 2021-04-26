<?php

	session_start();

	echo "1. OID  = {$_SESSION['OID']}<br>";
		
	$time = date("H:i:s"); 
	$time = "{$time}";

	$date = date("F j, Y, g:i a");
		
	$tempOID = session_id();
	$tempOID = "{$time}{$date}";
	$tempOID = crc32($tempOID);
											
											
	if ($tempOID < 0)
		$tempOID *= -1;

	if ($tempOID < 100000000)
		$tempOID *= 9;

	$OID = substr($tempOID, 0, 9);
	
	$_SESSION['OID'] = $OID;

	echo "2. OID  = {$_SESSION['OID']}<br>";

?>