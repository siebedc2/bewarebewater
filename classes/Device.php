<?php 
    class Device {
        public static function addDevice($userId, $room, $device) {
            $conn = Db::getConnection();
            $statement = $conn->prepare("insert into device (name, room, user_id) values (:device, :room, :userId)");
            $statement->bindParam(":device", $device);
            $statement->bindParam(":room", $room);
            $statement->bindParam(":userId", $userId);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        public static function addAmount($amount, $userId) {
            $conn = Db::getConnection();
            $statement = $conn->prepare("update device set amount = :amount where user_id = :user_id");
            $statement->bindParam(":amount", $amount);
            $statement->bindParam(":user_id", $userId);
            $statement->execute();
        }

    }