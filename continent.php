<?php
include ("functions.php");
$connection = connect();

$code = $_GET['code'];
$continent = getContinent($connection, $code);
$countries = getCountriesByContinent($connection, $code);
?>
<html>
<head>
    <title>GeoWorld</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php include ("header.php"); ?>
<main>
    <div class="container">
<div class="list-group">
    <div class="list-group-item list-group-item-secondary">Country List</div>
    <?php foreach ($countries as $countryItem): ?>
    <a href="country.php?code=<?= $countryItem['code'] ?>" class="list-group-item list-group-item-action">
        <img src="images/images/countries/png100px/<?= strtolower($countryItem['code']) ?>.png">
        <?= $countryItem['name'] ?>
    </a>
    <?php endforeach; ?>
</div>
    </div>
</main>
<?php include ("footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>