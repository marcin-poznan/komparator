<?php

require 'vendor/autoload.php';
require 'Komparator.php';

$bench = new Ubench();
$bench->start();

$komparator = new Komparator();
$dbRows = $komparator->loadInternalData("localhost", "test", "root", "tajne123");
$externalRows = $komparator->loadExternalData("./data.json");

$check = $komparator->check();

foreach ($check as $key => $val) {
    echo $key;
    echo "<br>";
}

$bench->end();
echo $bench->getTime();