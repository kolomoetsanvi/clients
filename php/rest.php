<?php
// Файл содержит функции для создания REST архитектуры


//выбираем клиентов из БД
function readClients()
{

// Подключение к Базе данных
	require "connection.php";

	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database)
	or die("Ошибка " . mysqli_error($link));

	// Запрос к БД получаем информацию о клиентах
	$query ="select
					clients.id,              
					clients.name,
					clients.email,
					clients.phone
				from
					clients 
				where
					clients.flagDelete like false /* не выбыираем клиентов, которые помечены как удаленные*/
				order by
					clients.name
			";


	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

	// $result - массив, выборка записей из БД
	if($result) {
		$rows = mysqli_num_rows($result);   // количество полученных строк


		for ($i = 0; $i < $rows; $i++) {
			$row = mysqli_fetch_row($result);

			$clients[$i] = array("id"=>$row[0],
				"name"=>$row[1],
				"email"=>$row[2],
				"phone"=>$row[3],
			);
		}

		mysqli_free_result($result);
	}//if

	// закрываем подключение
	mysqli_close($link);

	return $clients;

//
}//function readClients()

//#############################################################################################
//#############################################################################################

//Сохраняем данные Клиента в БД
function saveClients()
{

	if (isset($_POST['Name']) &&
		isset ($_POST['Email']) &&
		isset ($_POST['Phone'])
	)
	{

		$name = $_POST['Name'];
		$email = $_POST['Email'];
		$phone = $_POST['Phone'];


//Записываем данные о новом клиенте
// Подключение к Базе данных
		require "connection.php";

		// подключаемся к серверу
		$link = mysqli_connect($host, $user, $password, $database )
		or die("Ошибка " . mysqli_error($link));



		// создание строки запроса на добавление информации
		$query ="insert into clients values(NULL, '$name','$email', '$phone', false)";

		// выполняем запрос
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));


		// закрываем подключение
		mysqli_close($link);

		echo "Данные клиента записаны";
	}
	else{
		echo "Не все поля заполнены)";
	}

}//saveClients()


//#############################################################################################
//#############################################################################################

//Удаляем клиента
function delClients()
{

	if (isset($_POST['idClients']))
	{

		$idClients = $_POST['idClients'];

       // Подключение к основной Базе данных
		require "connection.php";

		// подключаемся к серверу
		$link = mysqli_connect($host, $user, $password, $database)
		or die("Ошибка " . mysqli_error($link));


			// создание строку запроса на удаление клиента
		    // ставим пометку на удаление
			$query ="UPDATE clients SET flagDelete=true WHERE id='$idClients'";
			// выполняем запрос
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

		// закрываем подключение
		mysqli_close($link);

		echo "Клиент удален";
	}
	else{
		echo "Ошибка при передаче данных";
	}

}//delClients()

?>
 
 