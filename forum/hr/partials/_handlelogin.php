<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $uname = $_POST['loginUname']; // Dodavanje polja za korisničko ime iz obrasca
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
            $_SESSION['username'] = $row['user_name']; // Postavljanje korisničkog imena u sesiji

            echo "prijavljen/a kao: " . $email;
            header("Location: /forum/index.php");
            exit();
        } else {
            $showError = "Neispravna lozinka";
        }
    } else {
        $showError = "Neispravni podaci za prijavu";
    }
    
    // Preusmjeri natrag na stranicu za prijavu s greškom
    header("Location: /forum/index.php?loginError=" . urlencode($showError));
    exit();
}

?>
