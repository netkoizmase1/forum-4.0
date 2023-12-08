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
        #maincontainer{
            min-height: 100vh;
        }
    </style>
    <title>Dobrodošli na OpenSesame - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    

    <!-- Rezultati pretrage -->
  <div class="container my-3" id="maincontainer">
        <h1 class="py-3">Rezultati pretrage za <em>"<?php echo $_GET['search']?>"</em></h1>

        <?php  
        $nemarezultata = true;
        $upit = $_GET["search"];
        $sql = "select * from threads where match (thread_title, thread_desc) against ('$upit')"; 
        $rezultat = mysqli_query($conn, $sql);
        while($redak = mysqli_fetch_assoc($rezultat)){
            $naslov = $redak['thread_title'];
            $opis = $redak['thread_desc']; 
            $id_niti = $redak['thread_id'];
            $url = "thread.php?threadid=". $id_niti;
            $nemarezultata = false;

            // Prikaži rezultat pretrage
            echo '<div class="result">
                        <h3><a href="'. $url. '" class="text-dark">'. $naslov. '</a> </h3>
                        <p>'. $opis .'</p>
                  </div>'; 
            }
        if ($nemarezultata){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Nema pronađenih rezultata</p>
                        <p class="lead"> Prijedlozi: <ul>
                                <li>Potvrdite točnost svih riječi.</li>
                                <li>Isprobajte različite ključne riječi.</li>
                                <li>Isprobajte općenitije ključne riječi. </li></ul>
                        </p>
                    </div>
                 </div>';
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
