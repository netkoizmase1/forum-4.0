<!doctype html>
<html lang="hr">

<head>
    <!-- Obavezni meta tagovi -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Dobrodošli na OpenSesame - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Unos u bazu niti
        $naslov_niti = $_POST['title'];
        $opis_niti = $_POST['desc'];

        $naslov_niti = str_replace("<", "&lt;", $naslov_niti);
        $naslov_niti = str_replace(">", "&gt;", $naslov_niti); 

        $opis_niti = str_replace("<", "&lt;", $opis_niti);
        $opis_niti = str_replace(">", "&gt;", $opis_niti); 

        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$naslov_niti', '$opis_niti', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Uspjeh!</strong> Vaša tema je dodana! Molimo pričekajte da zajednica odgovori.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
        } 
    }
    ?>


    <!-- Kontejner kategorija počinje ovdje -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Dobrodošli na <?php echo $catname;?> forum</h1>
            
        </div>
    </div>

    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">
            <h1 class="py-2">Započnite raspravu</h1> 
            <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Naslov problema</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Naslov neka bude što kraći i jasniji</small>
                </div>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Opišite svoj problem</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Pošalji</button>
            </form>
        </div>';
    }
    else{
        echo '
        <div class="container">
        <h1 class="py-2">Započnite raspravu</h1> 
           <p class="lead">Niste prijavljeni. Molimo prijavite se kako biste mogli započeti raspravu.</p>
        </div>
        ';
    }

    ?>
    
    <div class="container mb-5" id="ques">
        <h1 class="py-2">Pregledajte pitanja</h1>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id"; 
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $naslov = $row['thread_title'];
        $opis = $row['thread_desc']; 
        $thread_time = $row['timestamp']; 
        $thread_user_id = $row['thread_user_id']; 
        $sql2 = "SELECT user_name AS user_name FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);



        echo '<div class="media my-3">
            
            <div class="media-body">'.
             '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. '">'. $naslov . ' </a></h5>
                '. $opis . ' </div>'.'<div class="font-weight-bold my-0"> Postavio: '. $row2['user_name'] . ' u '. $thread_time. '</div>'.
        '</div>';

        }
        // echo var_dump($noResult);
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Nema pronađenih tema</p>
                        <p class="lead">Budite prva osoba koja će postaviti pitanje</p>
                    </div>
                 </div> ';
        }
    ?>

    </div>

    <?php include 'partials/_footer.php';?>
    <!-- Opcionalni JavaScript -->
    <!-- Najprije jQuery, zatim Popper.js, pa Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
