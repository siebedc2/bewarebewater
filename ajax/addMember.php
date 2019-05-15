<?php
    require_once("../bootstrap/bootstrap.php");

    $respone = [];
    $memberId = $_POST['memberId'];
    $userId = User::getUserId();
    $conn = Db::getConnection();

    
    $countStatement = $conn->prepare("select count(*) as count from family where member_id = :memberId AND user_id = :userId");
    $countStatement->bindParam(":userId", $userId);
    $countStatement->bindParam(":memberId", $memberId);
    $countStatement->execute();
    $amount = $countStatement->fetch(PDO::FETCH_ASSOC);


    if($amount['count'] == 0){
        $statement = $conn->prepare("insert into family (user_id, member_id) values (:userId, :memberId)");
        $statement->bindParam(":userId", $userId);
        $statement->bindParam(":memberId", $memberId);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;  
    
        $response = [
            "status" => "Success",
            "message" => "Added to you family!"
        ];
    }

    else {
        $response = [
            "status" => "Error",
            "message" => "Added not to you family!"
        ];
    }
    