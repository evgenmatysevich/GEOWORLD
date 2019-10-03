<?php
include ("functions.php");

$connection = connect();
$code = $_GET['code'];

$country = getCountry($connection, $code);

$zoom = zoomCountry($country['area']);

$country['flag'] = "<img src='images/images/countries/png100px/{$country['code']}.png' style='border: 1px solid black'>" ;
$coords = json_decode($country['coords']);
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
        <div class="col">
        <br class="list-group">
            <div class="list-group-item list-group-item-secondary"><h1 class="text-primary" style="text-align: center"><b><a target="_blank" href="https://en.wikipedia.org/wiki/<?=$country['name']?> "><?=$country['name'] ?></a></b></h1></div></br>
    </div>
<div class="container">
    <div class="row">
        <div class="col">
            <table  class="table table-bordered">
                <tbody>
                <?php foreach ($country as $key=>$value): ?>
                    <tr>
                        <td> <b><?=changeWords($key) ?></b></td>
                        <td>
                            <?= $value ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
<!--                <tr><td>Zoom:</td><td>--><?//= $zoom ?><!--</td></tr>-->
                </tbody>
            </table>
        </div>
        <div class="col text-center">
            <div id="map_canvas" style="height: 400px"></div>
            <script>
                function initialize() {
                    var myLatlng = new google.maps.LatLng(<?= $coords[0]; ?>, <?= $coords[1]; ?>);
                    var myOptions = {
                        zoom: <?=$zoom?>,
                        center: myLatlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize" async defer></script>
        </div>
    </div>
</div>




</main>

<?php include ("footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>