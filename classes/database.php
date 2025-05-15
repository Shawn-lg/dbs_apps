<?php
 
class database{
 
    function opencon(){
        return new PDO(
            'mysql:host=localhost;
            dbname=dbs_apps',
            username: 'root',
            password: '');
    }
 
    function signupUser($first_name, $last_name ,$username, $password) {
        $con = $this->opencon();
 
        try{
    $con->beginTransaction();
    $stmt = $con->prepare("INSERT INTO Admin(admin_FN, admin_LN, admin_username, admin_password) VALUES(?,?,?,?)");
    $stmt->execute([$first_name, $last_name ,$username, $password]);
    $userID = $con-> lastInsertId();
    $con->commit();
 
    return $userID;
 
        }catch (PDOExecption $e){
            $con->rollBack();
            return false;
        }
        function isUsernameExists($username){
            $con = $this->opencon();
            $stmt = $con->prepare("SELECT COUNT(*) FROM Admin WHERE admin_username = ?");
            $stmt->execute([$username]);
            $count = $stmt-> fetchColumn();
            return $count > 0;
        }
    }
}