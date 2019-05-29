<?php
    require_once("../bootstrap/bootstrap.php");

    if(!empty($_POST)){
        $deviceId = $_POST['deviceId'];
        $response = [];
        
        if(Device::removeDevice($deviceId)){
            $response = [
                "status" =>  "Success",
                "message" => "Device deleted"
            ];
        }else{
            $response = [
                "status" => "Error",
                "message" => "Couldn't delete device"
            ];
        }

        echo json_encode($response);
    }
    

