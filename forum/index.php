<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Slike za preusmjeravanje</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      height: 100vh;
      background-color: #ffffff; /* Bijela pozadina */
    }

    h1, h2 {
      margin-top: 20px;
      text-align: center;
    }

    .image-container {
      text-align: center;
      margin-top: 200px; /* Pomiče sliku na sredinu vertikalno */
    }

    .image-container a {
      display: inline-block;
      position: relative;
      overflow: hidden; /* Skriva sadržaj koji prelazi granice */
      border-radius: 50%; /* Okrugli oblik za slike */
    }

    .image-container img {
      width: 150px;
      height: 150px;
      border-radius: 50%; /* Okrugle slike */
      margin: 20px;
      cursor: pointer;
      transition: transform 0.3s ease; /* Glatka tranzicija */
    }

    .image-container a::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.3); /* Siva transparentna pozadina */
      border-radius: 50%; /* Okrugli oblik */
      transition: opacity 0.3s ease; /* Glatka tranzicija */
      opacity: 0; /* Skriva pozadinu inicijalno */
    }

    .image-container a:hover::after {
      opacity: 1; /* Prikazuje pozadinu kad je miš iznad slike */
    }
  </style>
</head>
<body>

<h1>Odaberite jezik/Choose a language</h1>

<div class="image-container">
  <a href="hr/indexhr.php"><img src="img/hr.png" alt="Slika 1"></a>
  <a href="eng/indexeng.php"><img src="img/eng.jpg" alt="Slika 2"></a>
</div>

</body>
</html>
