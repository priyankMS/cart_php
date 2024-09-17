<?php

 class User {
    private $conn;
    private $table_name = "users";

    public function  __construct($db) {
        $this->conn = $db;
    }

    //find by email

    public function findByEmail($email){
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $smpt = $this->conn->prepare($query);
        $smpt->bindParam(':email',$email);
        $smpt->execute();
        return $smpt->fetch(PDO::FETCH_ASSOC);
    }



    public function create($first_name, $last_name, $email, $gender, $password) {
    $sql = "INSERT INTO users (first_name, last_name, email, gender, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $gender, $password]);
}
 }

?>