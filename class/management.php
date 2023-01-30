<?php

    class Log {
        
        public $firstname;
        public $lastname;
        public $email;
        public $username;
        public $password;

        public function config() 
        {
            $connect = new PDO('mysql:host=localhost;dbname=phonebook;' , 'root' , '');
            return $connect;
        }

        public function register($firstname , $lastname , $email , $username , $password) 
        {
            $configClass = new Log();
            $connect = $configClass->config();
            $result = $connect->prepare("INSERT INTO users (firstname , lastname , user_email , username , password) VALUES (? , ? , ? , ? , ?)");
            $result->bindValue(1 , $this->firstname = $firstname);
            $result->bindValue(2 , $this->lastname = $lastname);
            $result->bindValue(3 , $this->email = $email);
            $result->bindValue(4 , $this->username = $username);
            $result->bindValue(5 , $this->password = $password);
            $result->execute();
            return $result;
        }

        public function login($username , $password) 
        {
            session_start();
            $configClass = new Log();
            $connect = $configClass->config();
            $result = $connect->prepare("SELECT * FROM users WHERE username = ?");
            $result->bindValue(1 , $this->username = $username);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_OBJ);
            if ($row->password == $this->password = $password) {
                $_SESSION['name'] = $row->firstname;
                header("location: index.php?id=$row->id");
            }
            else {
                header("location: login.php?failed2");
            }
        }

        public function session() 
        {
            if (! isset($_SESSION['name']) ) {
                header("location: login.php?failed");
            }
        }

        public function logout() 
        {
            session_start();
            session_unset();
            session_destroy();
            header("location: login.php");
        }

    }
