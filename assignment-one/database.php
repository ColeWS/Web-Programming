<?php
    class database {
        protected $connect;

        public function __construct() {
            $this->connectToDatabase();
        }
    
        public function connectToDatabase() {
            $this->connect = mysqli_connect('localhost', 'root', 'mysql', 'assignment_one');
            if (mysqli_connect_error()) {
                die("Failed to connect" . mysqli_connect_error());
            }
        }
    }
?>