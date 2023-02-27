<?PHP
declare(strict_types=1);
?>
<script src="scripts/addscript.js" type="text/javascript" defer></script>
<body class="d-flex flex-column min-vh-100">
  <iframe name="votar" style="display:none;"></iframe>
  <form id='cars' name='cars' class="d-flex flex-column p-3" autocomplete="off" target="votar">
    <div class="form-group w-80 m-1">
      <label for="nameInput" class="d-flex w-80 gap-1 justify-content-between">
        <p class="text-warning font-weight-bold">Nazwa samochodu: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="nameCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" name="name" id="name" placeholder="Wpisz nazwę samochodu">
    </div>
    <div class="form-group w-80 m-1">
      <label for="speedInput" class="d-flex w-70 gap-3 justify-content-between">
        <p class="text-warning font-weight-bold">Prędkość maksymalna[km/h]: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="max_speedCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" pattern="^[-+]?([0-9]+(\.[0-9]+)?|\.[0-9]+)$"
        name="max_speed" id="max_speed" placeholder="Wprowadź prędkość maksymalną">
    </div>
    <div class="form-group w-80 m-1">
      <label for="engineInput" class="d-flex w-100 gap-3 justify-content-between">
        <p class="text-warning font-weight-bold">Silnik: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="engineCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" name="engine" id="engine"
        placeholder="Wprowadź nazwę silnika">
    </div>
    <div class="form-group w-80 m-1">
      <label for="massInput" class="d-flex w-100 gap-3 justify-content-between">
        <p class="text-warning font-weight-bold">Masa [KG]: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="massCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" name="mass" id="mass" placeholder="Wprowadź masę pojazdu"
        pattern="^[-+]?([0-9]+(\.[0-9]+)?|\.[0-9]+)$">
    </div>
    <div class="form-group w-80 m-1">
      <label for="priceInput" class="d-flex w-100 gap-3 justify-content-between">
        <p class="text-warning font-weight-bold">Cena [PLN]: </p>
        <div class="checker pt-3 font-weight-bold text-danger flex-grow-1" id="priceCheck"></div><br>
      </label>
      <input type="text" required class="form-control w-50" pattern="^[-+]?([0-9]+(\.[0-9]+)?|\.[0-9]+)$" name="price"
        id="price" placeholder="Wprowadź cenę pojazdu">
      <button type='submit' action="create-action.php" class='send btn btn-dark form-group w-50 mt-3'>Zapisz</button>
    </div>
  </form>
</body>

</html>