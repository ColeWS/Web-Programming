<?php
    class database {
        protected $connect;

        // function to call the database connection
        public function __construct() {
            $this->connectToDatabase();
        }
    
        // function to connect to the database
        public function connectToDatabase() {
            $this->connect = mysqli_connect('localhost', 'root', 'mysql', 'assignment_one');
            if (mysqli_connect_error()) {
                die("Failed to connect" . mysqli_connect_error());
            }
        }
    }
?>