<?PHP
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" defer>
  <script src="scripts/script.js" type="text/javascript"></script>
  <title>PHP CRUD</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <div class="container-fluid pt-3">
    <h1>Witaj w bazie samochodów</h1>
    <p>Wybierz, co chcesz zrobić</p>
    <div class="row">
      <div class="rounded add-container col p-3 bg-primary text-white d-flex justify-content-around">
        <p>Dodaj nowy samochód</p><button type='button' class='add btn btn-dark'>Dodaj</button></li>
      </div>
      <div class="rounded edit-container col p-3 bg-dark text-white d-flex justify-content-around">
        <p>Edytuj zaznaczony samochód</p><button type='button' class='edit btn btn-primary'>Edytuj</button></li>
      </div>
      <div class="rounded return col p-3 bg-primary text-white d-flex justify-content-around">
        <p></p>
        </li>
      </div>
    </div>
    <div class="row p-1 bg-gray">
      <h1 class="text-center m-0">Lista samochodów<br><small class="text-muted">Kliknij na rekord aby zaznaczyć go do
          edycji</small></h1>
    </div>
  </div>
  <div id="screen" class="bg-primary rounded flex-grow-1 h-50 d-inline-block">
  </div>
  <div class="text-center p-3 h-25 d-inline-block" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="stopka text-reset fw-bold">Jakub Bielański</a>
  </div>
</body>

</html>