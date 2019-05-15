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

    }