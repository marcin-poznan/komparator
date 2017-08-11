<?php

require 'vendor/autoload.php';
require 'Komparator.php';

$bench = new Ubench();
$bench->start();

$komparator = new Komparator();
$dbRows = $komparator->loadInternalData("localhost", "test", "root", "tajne123");
$externalRows = $komparator->loadExternalData("./data.json");

echo "another feature change";

echo "hello";

$check = $komparator->check();

foreach ($check as $key => $val) {
    echo $key;
    echo "<br>";
}

echo "this is new added text";

$bench->end();
echo $bench->getTime();
