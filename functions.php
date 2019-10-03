<?php
function connect()
{
    $user = "root";
    $password = "";
    $dsn = "mysql:host=localhost;dbname=geoworld;post=3306;charset=utf8";
    $connection = new PDO($dsn,$user,$password);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    return $connection;
}
function getContinents(PDO $connection)
{
$sql = "SELECT * FROM continents";
$stmt = $connection->prepare($sql);
$stmt->execute();
$continents = $stmt->fetchAll();
return $continents;
}
function getContinent(PDO $connection, $code)
{
    $sql = "SELECT * FROM continents"
        . "WHERE code=?";
    $stmt =$connection->prepare($sql);
    $stmt->execute([$code]);
    $continent = $stmt->fetch();
    return $continent;
}
function getCountriesByContinent(PDO $connection, $code)
{
    $sql = "SELECT * FROM countries WHERE continent_code=?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$code]);
    $countries = $stmt->fetchAll();
    return $countries;
}
function getCountry(PDO $connection, $code)
{
    $sql = "SELECT * FROM countries "
        . "WHERE code=?";

    $stmt = $connection->prepare($sql);
    $stmt->execute([$code]);
    $country = $stmt->fetch();
    return $country;
}
function changeWords($str)
{
    return ucwords(str_replace("_", " ",$str));
}
function zoomCountry($code)
{
    $a=0;
    if($code<=100){
      $a=11;
    }elseif ($code<=10000) {
        $a = 10;
    }elseif ($code<=300000){
       $a=8;
    }elseif ($code<=400000){
        $a=7;
    }elseif ($code<=605000){
        $a=5;
    }elseif ($code<=800000){
        $a=4;
    }elseif ($code<=1000000){
        $a=3;
    }elseif ($code<=18000000){
        $a=2;
    }
return $a;
}