<?php
require_once "rest.php";
require_once "func.php";

$query = $_POST['query'];

//Ajax запрос
switch($query){
    case "queryAdd":
        saveClients(); //func.php
    break;

    case "queryDel":
        delClients(); //func.php
    break;

    case "querySort":
        $argSort = $_POST['argSort'];
        clientsToTable($argSort); //func.php
    break;

}//switch($query)



