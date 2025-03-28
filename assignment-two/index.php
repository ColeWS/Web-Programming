<?php
    // create page title and description and use the header template
    $pageTitle = "Sign in or up";
    $pageDescription = "This is the page where you sign in to your account";
    require("./includes/header.php");
    require_once('./includes/database.php');
?>
        <!-- main page content -->
        <main>
            <!-- sign in form -->
            <section id="form-container">
                <form id="sign-in-form" method="post">
                    <h2>Sign In to Your Account</h2>
                    <label for="signInEmail">Email</label>
                    <input type="email" id="signInEmail" name="signInEmail">
                    <label for="signInPass">Password</label>
                    <input type="password" id="signInPass" name="signInPass">
                    <button type="submit" name="sign-in-submit">Sign In</button>
                    <?php
                        if (isset($_POST['sign-in-submit'])) {
                            $email = $_POST['signInEmail'];
                            $password = hash('sha512', $_POST['signInPass']);

                            $query = $connection->prepare("SELECT id FROM a2_accounts WHERE email = '$email' AND userPass = '$password'");
                            $query->execute();
                            $find = $query->rowCount();

                            if ($find == 1) {
                                foreach ($query as $data) {
                                    session_start();
                                    $_SESSION['id'] = $data['id'];
                                    Header('Location: ./success.php');
                                }
                            }
                            else {
                                echo "Account info not found";
                            }
                            $connection = null;
                        }
                    ?>
                </form>
                <form id="sign-up-form" method="post">
                    <h2>Create an Account</h2>
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <button type="submit" name="sign-up-submit">Sign Up</button>
                    <?php
                        if (isset($_POST['sign-up-submit'])) {
                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $password = hash('sha512', $password);

                            if ($firstName == "") {
                                echo "First Name field is empty";
                            }
                            elseif ($lastName == "") {
                                echo "Last Name field is empty";
                            }
                            elseif ($email == "") {
                                echo "Email field is empty";
                            }
                            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo "Invalid email";
                            }
                            else {
                                $query = $connection->prepare("INSERT INTO a2_accounts (firstName, lastName, email, userPass) VALUES ('$firstName', '$lastName', '$email', '$password')");
                                $query->execute();
                                echo "Account successfully created, sign in above.";
                                $connection = null;
                            }
                        }
                    ?>
                </form>
            </section>
        </main>
<?php
    // use the footer template
    require("./includes/footer.php");
?>