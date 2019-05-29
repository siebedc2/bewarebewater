<?php
    require_once("../bootstrap/bootstrap.php");

    if(!empty($_POST)){
        $memberId = $_POST['memberId'];
        $response = [];
        
        if(User::removeFamilyMember($memberId)){
            $response = [
                "status" =>  "Success",
                "message" => "Family member deleted"
            ];
        }else{
            $response = [
                "status" => "Error",
                "message" => "Couldn't delete family member"
            ];
        }

        echo json_encode($response);
    }
    

