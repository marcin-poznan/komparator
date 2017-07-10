<?php

class Komparator
{
    public $pdo;
    public $internalData;
    public $externalData;
    public function loadInternalData($dbHostname, $dbName, $dbUser, $dbPassword) {
        try {
            $this->pdo = new PDO("mysql:host={$dbHostname};dbname={$dbName}", "{$dbUser}", "{$dbPassword}");
        } catch (PDOExeption $ex) {
            echo $ex->getMessage();
        }

        $statement = $this->pdo->prepare("SELECT * FROM my_data");
        $statement->execute();
        $internalData = $statement->fetchAll(PDO::FETCH_ASSOC);
        $tempArr = [];
        foreach ($internalData as $key => $intArr) {
            $tempArr[$intArr["id"]] = $intArr["name"];
        }
        $this->internalData = $tempArr;
        return $tempArr;
    }

    public function loadExternalData($filePath) {
        $file = file_get_contents($filePath);
        $externalData = json_decode($file, true);
        $tempArr = [];
        foreach ($externalData as $key => $intArr) {
            $tempArr[$intArr["id"]] = $intArr["name"];
        }
        $this->externalData = $tempArr;
        return $tempArr;
    }

    public function check() {
        $intersectArray = array_intersect($this->internalData, $this->externalData);
        return $intersectArray;
    }
}