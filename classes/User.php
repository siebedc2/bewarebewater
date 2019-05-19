<?php

    // require the security class for a hashed password
    require_once("Security.php");

class User{
    private $email;
    private $password;
    private $passwordConfirmation;
    private $firstname;
    private $lastname;
    private $image;
    private $description;
     
    /**
     * @return email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        //Check if not empty
        if( empty($email) ){
            throw new Exception("Email cannot be empty.");
        }
        //Check if email is legit
        if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            throw new Exception("Please use a valid email address!");
        }
        //Check if email is not in our DB yet
        if( !User::isEmailAvailable($email) ){
            throw new Exception("A user with this email address is already registered.");
        }
        $this->email = $email;
        return $this;
    }

    /**
     * @return password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        //Check if not empty
        if( empty($password) ){
            throw new Exception("Password cannot be empty.");
        }
        //Check if password has minimum length of 8 chars
        if( User::minLength($password, 8)){
            throw new Exception("Password must be minimum 8 chars long.");
        }
        
        $this->password = $password;
        return $this;
    }

    /**
     * @return passwordConfirmation
     */
    public function getPasswordConfirmation()
    {
        return $this->passwordConfirmation;
    }
    /**
     * @param $passwordConfirmation
     */
    public function setPasswordConfirmation($passwordConfirmation)
    {
        //Check if not empty
        if( empty($passwordConfirmation) ){
            throw new Exception("Password Confirmation cannot be empty.");
        }
        //Do passwords equal?
        if( $this->getPassword() !== $passwordConfirmation){
            //Passwords do not equal, throw exception
            throw new Exception("Password fields are not equal, please enter them again");
        }
        $this->passwordConfirmation = $passwordConfirmation;
        return $this;
    }
    
    /**
     * @return firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    /**
     * @param $firstname
     */
    public function setFirstname($firstname)
    {
        //Check if not empty
        if( empty($firstname) ){
            throw new Exception("Firstname cannot be empty.");
        }
        //Check if firstname is not longer than 30chars
        if( User::maxLength($firstname, 30)){
            throw new Exception("Firstname cannot be longer than 30 characters.");
        }
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    /**
     * @param $lastname
     */
    public function setLastname($lastname)
    {
        //Check if not empty
        if( empty($lastname) ){
            throw new Exception("Lastname cannot be empty.");
        }
        //Check if lastname is not longer than 30chars
        if( User::maxLength($lastname, 30)){
            throw new Exception("Lastname cannot be longer than 30 characters.");
        }
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return image
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * @param $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return description (bio)
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return boolean - true if successful, false if unsuccessful
     */
    public function register(){
        $hash = Security::hash($this->password);
        //echo $hash;

        try{
            $pdo = Db::getConnection();
            
            $statement = $pdo->prepare("insert into user (firstname, lastname, email, password) values (:firstname, :lastname, :email, :password)");
            $statement->bindParam(":firstname", $this->firstname);
            $statement->bindParam(":lastname", $this->lastname);
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":password", $hash);
            $result = $statement->execute();

            return $result;
        }
        catch( Throwable $t){
            $err = $t->getMessage();
            //Write this error to errorLog.txt file
            $file = fopen("errorLog.txt", "a");
            fwrite($file, $err."\n");
            fclose($file);
        }
    }

    public static function canLogin($email, $password){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where email = :email");
        $statement->bindParam(":email", $email); # the email parameter is bound to :email to prevent sql-injection
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    }
    public static function doLogin($email){
        $_SESSION['email'] = $email;
        header("location: index.php");
    }

    /*
    * Returns true if length of a string is longer than given allowedLength
    */
    public static function maxLength($string, $maxLength){
        if( strlen($string) > $maxLength){
            //String is too long, return true for error handling
            return true;
        }
        else{
            return false;
        }
    }

    /*
    * Returns true if length of a string is shorter than given allowedLength
    */
    public static function minLength($string, $minLength){
        if( strlen($string) < $minLength){
            //String is too short, return true for error handling
            return true;
        }
        else{
            return false;
        }
    }

    /*
    * Find a user based on email addres
    */
    public static function findByEmail($email){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where email = :email limit 1");
        $statement->bindParam(":email", $email);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    //Check if a user exists by email address
    public static function isEmailAvailable($email){
        $result = self::findByEmail($email);
        // PDO returns false if no records are found so let's check for that
        if($result == false){
            return true;
        } else {
            return false;
        }
    }

    public static function getUserId(){
        //Get email of loggedin user via session
        $sessionEmail = $_SESSION['email'];
        //Get the ID of current user
        $conn = Db::getConnection();
        $statement = $conn->prepare("select id from user where email = :sessionEmail");
        $statement->bindParam(":sessionEmail", $sessionEmail);
        $statement->execute();
        $user_id = $statement->fetch(PDO::FETCH_ASSOC);
        $user_id = $user_id['id'];
        return $user_id;
    }

    // check if the user is logged in
    public static function userLoggedIn() {
        if( isset($_SESSION['email']) ){ /* User is logged in, no redirect needed! */ }
        else{ /* User is not logged in, redirect to login.php! */ header("location: login.php"); }
    }

    // search members in the db
    public static function searchMember($name) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select id, firstname, lastname from user where firstname like '%" . $name . "%' or lastname like '%" . $name . "%'");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // get all users in the database
    public static function getAllusers($userId) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select id, firstname, lastname from user where not id = :userId");
        $statement->bindParam(":userId", $userId);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // get all family members of the user that is logged in
    public static function getAllMembers($userId) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select user.id, user.firstname, user.lastname, user.avatar from user inner join family on user.id = family.member_id where family.user_id = :userId");
        $statement->bindParam(":userId", $userId);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // get all devices of the user that is logged in
    public static function getAllDevices($userId) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from device where user_id = :userId");
        $statement->bindParam(":userId", $userId);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // get all data of the user that is logged in
    public static function getUserData($userId) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where id = :user_id");
        $statement->bindParam(":user_id", $userId);
        $statement->execute();
        $profile = $statement->fetch(PDO::FETCH_ASSOC);
        return $profile;
    }

    // get the settings of the user
    public static function getSettings($userId) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where id = :user_id");
        $statement->bindParam(":user_id", $userId);
        $statement->execute();
        $settings = $statement->fetch(PDO::FETCH_ASSOC);
        return $settings;
    }

    /* Extra feature */
    public static function doChangeSettings($houseType, $location, $waterCompany) {
        
    }

    public static function getAmountOfFamilyMembers($userId) {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select count(*) as count from family where user_id = :user_id");
        $statement->bindParam(":user_id", $userId);
        $statement->execute();
        $amount = $statement->fetch(PDO::FETCH_ASSOC);
        return $amount;
    }


}