<?php
    require_once 'database.php';
    class crud extends database {
        // function to call the database connection
        public function connectToDatabase() {
            parent::connectToDatabase();
        }

        // function to execute database queries
        public function executeQuery($databaseQuery) {
            $databaseResult = $this->connect->query($databaseQuery);
            if ($databaseResult == false) {
                echo "<p>Unable to execute</p>";
                return false;
            }
            else {
                return true;
            }
        }

        // escape string function
        public function escapeString($string) {
            return $this->connect->real_escape_string($string);
        }
    }
?>