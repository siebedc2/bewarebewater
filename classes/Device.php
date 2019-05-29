<?php 
    class Device {
        public static function addDevice($userId, $room, $device) {
            $conn = Db::getConnection();
            $statement = $conn->prepare("insert into device (name, room, user_id) values (:device, :room, :userId)");
            $statement->bindParam(":device", $device);
            $statement->bindParam(":room", $room);
            $statement->bindParam(":userId", $userId);
            return $statement->execute();
            
        }

        public static function addAmount($amount, $userId) {
            $conn = Db::getConnection();
            $statement = $conn->prepare("update device set amount = :amount where user_id = :user_id");
            $statement->bindParam(":amount", $amount);
            $statement->bindParam(":user_id", $userId);
            $statement->execute();
        }

        public static function getMostAmout($userId) {
            $conn = Db::getConnection();
            $statement = $conn->prepare("select * from device where user_id = :user_id order by amount desc limit 3");
            $statement->bindParam(":user_id", $userId);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        public static function removeDevice($deviceId){
            $conn = Db::getConnection();
            $statement = $conn->prepare("delete from device where id = :id");
            $statement->bindParam(":id", $deviceId);
            return $statement->execute();
        }

    }