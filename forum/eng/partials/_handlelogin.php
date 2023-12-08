<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $uname = $_POST['loginUname']; // Adding username field from the form
    $pass = $_POST['loginPass'];

    $sql = "SELECT * FROM users WHERE user_email='$email' AND user_name='$uname'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            $_SESSION['username'] = $row['user_name']; // Set the username in the session

            echo "logged in" . $email;
            header("Location: /forum/indexeng.php");
            exit();
        } else {
            $showError = "Invalid Password";
        }
    } else {
        $showError = "Invalid Credentials";
    }
    
    // Redirect back to login page with error
    header("Location: /forum/indexeng.php?loginError=" . urlencode($showError));
    exit();
}
?>
