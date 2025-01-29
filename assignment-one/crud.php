<?php
    require_once 'database.php';
    class crud extends database {
        public function connectToDatabase() {
            parent::connectToDatabase();
        }

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

        public function escapeString($string) {
            return $this->connect->real_escape_string($string);
        }
    }
?>