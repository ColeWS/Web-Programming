<?php
    // create a title and description for the page and use the header template
    $pageTitle = "Success";
    $pageDescription = "This is the page that can only be accessed after logging in";
    require("./includes/header.php");

    session_start();
    if (!isset($_SESSION['id'])) {
        Header('Location: ./index.php');
        exit();
    }
    else {
?>
        <!-- main page content -->
        <main>
            <h1>You Have Successfully Logged Into Your Account</h1>
            <p>You are able to access this page now that you are logged in!</p>
            <form id="log-out-btn" method="post">
                <button name="log-out">Log out</button>
            </form>
        </main>
        <?php
            if (isset($_POST['log-out'])) {
                session_start();
                session_unset();
                session_destroy();
                Header('Location: ./index.php');
            }
        ?>
<?php
    }
    // use the footer template
    require("./includes/footer.php");
?>