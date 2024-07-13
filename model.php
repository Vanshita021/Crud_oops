<?php
    // Database connection
    class Model{
        private $servername = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'crud_app';
        private $conn;

        //constructor for connection to db
        function __construct(){
            $this->conn = new mysqli($this->servername,$this->username,$this->password, $this->dbname);

            if($this->conn->connect_error){
                echo 'Connection error';
            }else{
                // echo 'Connected';
                return $this->conn;
            }
        }

        //function for insert
        public function insert($post){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            $sql = "INSERT INTO crud_1(name, email, phone, address, gender,country) VALUES ('$name','$email','$phone','$address','$gender','$country')";
            $result = $this->conn->query($sql);
            if($result){
                header('location:index.php?msg=ins');
            }else{
                echo "Error ".$sql."<br>".$this->conn->error;
            }
        }

        //function for update
        public function update($post){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            $editid = $_POST['hid'];

            $sql = "UPDATE crud_1 SET name = '$name', email = '$email', phone = '$phone', address = '$address', gender = '$gender', country = '$country' WHERE id='$editid'";
            $result = $this->conn->query($sql);
            if($result){
                header('location:index.php?msg=ups');
            }else{
                echo "Error ".$sql."<br>".$this->conn->error;
            }
        }

        //function for display
        public function display(){
            $sql = "SELECT * FROM crud_1";
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;

                }
                return $data;
            }

        }

        public function displayRecordById($editid){
            $sql = "SELECT * FROM crud_1 WHERE id = '$editid' ";
            $result = $this->conn->query(($sql));
            if($result->num_rows==1){
                $row = $result->fetch_assoc();
                return $row;
            }
        }

        //function to delete record
        public function delete($delid){
            $sql = "DELETE FROM crud_1 WHERE id = '$delid' ";
            $result = $this->conn->query($sql);
            if($result){
                header('location:index.php?msg=del');
            }else{
                echo "Error ".$sql."<br>".$this->conn->error;
            }
        }

    }

    //$obj = new Model();
    
?>