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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="script.js" type="text/javascript"></script>
  <title>Show data</title>
</head>
<?PHP
include_once 'autoloader/autoloader.php';
use App\Controllers\CarsController;
use App\Models\Auta;

$cars = new Auta;
$database = new CarsController;
$json = array_key_first($_POST);
$data = json_decode($json, true);
$auto = $cars->read((int) $data['id'], $database->databaseConnect());
$auto = json_decode($auto, true);
$auto = $auto[0];
?>

<body class="d-flex flex-column min-vh-100">
  <iframe name="votar" style="display:none;"></iframe>
  <form id='editcars' name='editcars' class="d-flex flex-column p-3" autocomplete="off" target="votar">
    <div class="form-group w-80 m-1">
      <label for="nameInput" class="d-flex w-70 gap-1 justify-content-between">
        <p class="text-warning font-weight-bold">Nazwa samochodu: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="nameCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" name="name" id="name" value="<?PHP echo $auto['nazwa'] ?>">
    </div>
    <div class="form-group w-80 m-1">
      <label for="speedInput" class="d-flex w-70 gap-3 justify-content-between">
        <p class="text-warning font-weight-bold">Prędkość maksymalna: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="max_speedCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" pattern="^[-+]?([0-9]+(\.[0-9]+)?|\.[0-9]+)$"
        name="max_speed" id="max_speed" value="<?PHP echo $auto['max_speed'] ?>">
    </div>
    <div class="form-group w-80 m-1">
      <label for="engineInput" class="d-flex w-100 gap-3 justify-content-between">
        <p class="text-warning font-weight-bold">Silnik: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="engineCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" name="engine" id="engine"
        value="<?PHP echo $auto['silnik'] ?>">
    </div>
    <div class="form-group w-80 m-1">
      <label for="massInput" class="d-flex w-100 gap-3 justify-content-between">
        <p class="text-warning font-weight-bold">Masa [KG]: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="massCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" name="mass" id="mass" value="<?PHP echo $auto['masa'] ?>"
        pattern="^[-+]?([0-9]+(\.[0-9]+)?|\.[0-9]+)$">
    </div>
    <div class="form-group w-80 m-1">
      <label for="priceInput" class="d-flex w-100 gap-3 justify-content-between">
        <p class="text-warning font-weight-bold">Cena [PLN]: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="priceCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" pattern="^[-+]?([0-9]+(\.[0-9]+)?|\.[0-9]+)$" name="price"
        id="price" value="<?PHP echo $auto['cena'] ?>">
      <button type='submit' action="create-action.php" class='send btn btn-dark form-group w-50 mt-3'>Zapisz</button>
    </div>
  </form>
</body>

</html>