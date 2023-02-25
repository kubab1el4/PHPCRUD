<?PHP 
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="script.js" type="text/javascript"></script>
    <title>Show data</title>
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container-fluid mt-3">
  <h1>Welcome to the car page</h1>
  <p>What do you want to do</p>
  <div class="row">
    <div class="col p-3 bg-primary text-white d-flex justify-content-around">Add a new car<button type='button' id='Add ' class='btn btn-dark'>Add</button></li></div>
    <div class="col p-3 bg-dark text-white d-flex justify-content-around">Edit an existing car<button type='button' id='Edit' class='btn btn-primary'>Edit</button></li></div>
  </div>
<div class="row" style="padding:10px"><h1 class="text-center">Car list below</h1></div>
</div>
<div id="screen" class="bg-primary flex-grow-1 h-50 d-inline-block">
</div>
<div class="text-center p-4 h-25 d-inline-block" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold">Jakub Bielański</a>
  </div>
</body>
</html>