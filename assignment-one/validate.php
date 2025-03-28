<?php
    class validate {
        // function to stop the user from entering a negative number
        public function checkHoursWorked($num) {
            $message = "";
            if ($num < 0) {
                $message = "<p>Cannot enter a negative number</p>";
                return $message;
            }
            else {
                return $message;
            }
        }

        // function to check if the user enters a valid email
        public function checkEmail($email) {
            $message = "";
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $message;
            }
            else {
                $message = "<p>Invalid email</p>";
                return $message;
            }
        }
    }
?>