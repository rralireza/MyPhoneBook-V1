<?php 

    class Contacts extends Log {
        public $name;
        public $phone;
        public $email;

        public function addContact($user_id , $name , $phone , $email) {
            $myObject = new Log();
            $connect = $myObject->config();
            $result = $connect->prepare("INSERT INTO contacts(user_id , name , phonenumber , email) VALUES (? , ? , ? , ?)");
            $result->bindValue(1 , $user_id);
            $result->bindValue(2 , $this->name = $name);
            $result->bindValue(3 , $this->phone = $phone);
            $result->bindValue(4 , $this->email = $email);
            $result->execute();
        }

        public function showContacts ($user_id) {
            $connetctionObj = new Log();
            $connect = $connetctionObj->config();
            $result = $connect->prepare("SELECT * FROM contacts INNER JOIN users ON contacts.user_id = users.id WHERE user_id = ?");
            $result->bindValue(1 , $user_id);
            $result->execute();
            $row = $result->fetchAll(PDO::FETCH_OBJ);
            return $row;
        }

        public function deleteContacts ($user_id) {
            $connetctionObj = new Log();
            $connect = $connetctionObj->config();
            $result = $connect->prepare("DELETE FROM contacts WHERE contact_id = ?");
            $result->bindValue(1 , $user_id);
            $result->execute();
            $userData = $connect->prepare("SELECT * FROM users");
            $userData->execute();
            $row = $userData->fetch(PDO::FETCH_OBJ);
            header("location: index.php?id=$row->id");
        }

        public function editContacts($contacts_id , $name , $phonenumber , $email) {
            $connetctionObj = new Log();
            $connect = $connetctionObj->config();
            $result = $connect->prepare("UPDATE contacts SET name = ? , phonenumber = ? , email = ? WHERE contact_id = $contacts_id");
            $result->bindValue(1 , $this->name = $name);
            $result->bindValue(2 , $this->phone = $phonenumber);
            $result->bindValue(3 , $this->email = $email);
            $result->execute();
            $userData = $connect->prepare("SELECT * FROM users");
            $userData->execute();
            $row = $userData->fetch(PDO::FETCH_OBJ);
            header("location: index.php?id=$row->id");
        }
    }