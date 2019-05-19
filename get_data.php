<?php

    require_once("bootstrap/bootstrap.php");

    if( !empty($_POST['amount']) ) {

        $userId = User::getUserId();
    	$amount = $_POST['amount'];
        Device::addAmount($amount, $userId);
        
	}

?>