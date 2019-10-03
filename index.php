<?php
include ("functions.php");
$connection = connect();

$continents = getContinents($connection);
//print_r($continents);

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
<div class="row">
    <?php foreach ($continents as $continentItem): ?>
    <div class="col-6 col-md-4" ">
    <div class="card p-2 mb-2">
        <img class="card-img-top" src="images/images/continents/<?= strtolower ($continentItem['code']) ?>.png" alt="Africa">
        <div class="card-body">
            <h4 class="card-title">
                <a href="continent.php?code=<?= $continentItem['code'] ?>">
                <?= $continentItem['name'] ?>
                </a>
            </h4>
            <p class="card-text"><?= $continentItem['description'] ?></p>
        </div>
    </div>
    </div>
<?php endforeach; ?>
</div>
    </div>
</main>
<?php include ("footer.php");?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>