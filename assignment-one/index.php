<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="This is assignment one for web programming">
        <meta name="robots" content="noindex, nofollow">
        <title>Assignment One | Web Programming</title>
        <!-- css -->
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/style.css">
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- header -->
        <header>
            <div>
                <img src="./images/awesome-logo.jpg" alt="the most awesome logo" width="150" height="150">
            </div>
            <nav>
                <menu>
                    <li><a href="#form">Add an employee</a></li>
                </menu>
            </nav>
        </header>
        <section class="masthead">
            <h1>Employee Portal</h1>
        </section>
        <!-- main content -->
        <main>
            <section id="form">
                <h2>Add Employee</h2>
                <!-- form -->
                <form method="post">
                    <div>
                        <label for="input1">First Name</label>
                        <input type="text" name="firstName" id="input1" required>
                    </div>

                    <div>
                        <label for="input2">Last Name</label>
                        <input type="text" name="lastName" id="input2" required>
                    </div>

                    <div>
                        <label for="input3">Email</label>
                        <input type="email" name="email" id="input3" required>
                    </div>

                    <div>
                        <label for="input4">Hours Worked</label>
                        <input type="number" name="hoursWorked" id="input4" required>
                    </div>

                    <div id="button">
                        <input type="submit" name="submit" value="Add Employee">
                    </div>
                </form>
                <div>
                    <!-- php to add data to the database -->
                    <?php
                        include_once ('crud.php');
                        include_once ('validate.php');
                        $crud = new crud();
                        $validation = new validate();
                        if(isset($_POST['submit'])) {
                            $firstname = $crud->escapeString($_POST['firstName']);
                            $lastname = $crud->escapeString($_POST['lastName']);
                            $email = $crud->escapeString($_POST['email']);
                            $hoursworked = $crud->escapeString($_POST['hoursWorked']);
                            $hoursWorkedMessage = $validation->checkHoursWorked($_POST['hoursWorked']);
                            $emailMessage = $validation->checkEmail($_POST['email']);
                            if ($hoursWorkedMessage != "") {
                                echo "<p>$hoursWorkedMessage</p>";
                            }
                            elseif ($emailMessage != "") {
                                echo "<p>$emailMessage</p>";
                            }
                            else {
                                $result = $crud->executeQuery("INSERT INTO employees(firstName, lastName, email, hoursWorked) VALUES('$firstname', '$lastname', '$email', '$hoursworked')");
                                echo "<p>Employee has been added</p>";
                            }
                        }
                    ?>
                </div>
            </section>
        </main>
        <!-- footer -->
        <footer>
            <p><small>Copyright: Employee Portal</small></p>
        </footer>
    </body>
</html>