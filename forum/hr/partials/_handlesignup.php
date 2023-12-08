<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $korisnik_email = $_POST['signupEmail'];
    $korisnicko_ime = $_POST['signupUname'];
    $lozinka = $_POST['signupPassword'];
    $potvrda_lozinke = $_POST['signupcPassword'];

    // Provjera postoji li već ovaj email
    $sqlPostojiEmail = "SELECT * FROM `users` WHERE user_email = '$korisnik_email'";
    $rezultat = mysqli_query($conn, $sqlPostojiEmail);
    $brojRedova = mysqli_num_rows($rezultat);
    if($brojRedova > 0){
        $showError = "Email već u upotrebi";
    }
    else{
        if($lozinka == $potvrda_lozinke){
            $hash = password_hash($lozinka, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_name`, `user_pass`, `timestamp`) VALUES ( '$korisnik_email', '$korisnicko_ime', '$hash', current_timestamp())";
            $rezultat = mysqli_query($conn, $sql);
            
            if($rezultat){
                $showAlert = true;
                header("Location: /forum/hr/indexhr.php?signupsuccess=true");
                exit();
            }

        }
        else{
            $showError = "Lozinke se ne podudaraju"; 
            
        }
    }
    header("Location: /forum/hr/indexhr.php?signupsuccess=false&error=$showError");

}
?>
