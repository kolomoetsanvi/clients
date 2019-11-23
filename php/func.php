<?php
// Файл содержит различные функции для оптимизации кода


//выводим список клиентов
// по умолчанию сортируем по имени
function clientsToTable($argSort = 'name')
{
	require_once "rest.php";

	// считываем клиентов из БД
	$clients = readClients(); //rest.php
	// сортируем массив по заданному полю
	// по умолчанию поле "name"
	$clients = clientsSort($clients, $argSort);

	echo "<table class='table table-striped table-hover'><thead><tr><td>Имя</td><td>Мейл</td><td>Телефон</td><td>Удалить</td></thead></tr><tbody id=\"clientsTable\">";
	echo "<form method=\"POST\" action=\"\" id=\"delForm\">";


	foreach($clients as $item){
			echo "<tr>";
	   		echo "<td>".$item['name']."</td>";
			echo "<td>".$item['email']."</td>";
			echo "<td>".$item['phone']."</td>";
			echo "<td> <input class=\"btn btn-danger \" type=\"submit\" value=\"Удалить\" id=\"".$item['id']."\"/></td>";
			echo "</tr>";
		}
	echo "</tbody></table>";
//
}//function clientsToTable()


//Функция для сортировки клиентов
function clientsSort($clients, $argSort)
{

	if ($argSort == 'name'){
		function cmp_function($a, $b){
			return ($a['name'] > $b['name']);
		}
	}else if ($argSort == 'email') {
		function cmp_function($a, $b)
		{
			return ($a['email'] > $b['email']);
		}
	}else{
		function cmp_function($a, $b) {
		return ($a['phone'] > $b['phone']);
		}
	}//if

	uasort($clients, 'cmp_function');

	return $clients;
//
}//function clientsSort()

?>
 
 