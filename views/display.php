<?PHP
declare(strict_types=1);
include_once '../autoloader/autoloader.php';
?>


<body class="d-flex flex-column min-vh-100">
<script src="scripts/displayscript.js" type="text/javascript" defer></script>
    <?PHP

    use App\Controllers\CarsController;

    $database = new CarsController;
    $database->buildItemList($database->readAll($database->databaseConnect()));
    $database->stopConnection($database->databaseConnect());
        ?>
</body>

</html>