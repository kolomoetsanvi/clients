
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <link href="Bootstrap/styles/bootstrap.min.css" rel="stylesheet" />
    <script src="Bootstrap/js/jquery-1.11.1.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <link href="css/StyleSheet.css" rel="stylesheet" />
    <script src="JS/jsFun.js"></script>

    <title>Клиенты</title>

    <?php
    require_once "php/func.php";
    ?>

</head>

<body>

<!--------------------------------------------------------------->
<header>
    <div class="container" id="Top">
        <div class="row">
            <div class="col-md-3">
                <p id="topText">Клиенты</p>
            </div>
        </div>
    </div>
</header>

<!--------------------------------------------------------------->

<main class="container">


        <!------------------------------->
        <!-- Форма добавления клиента  -->
        <div class="col-md-4 col-md-offset-1">
              <form method="POST" action="" id="addForm">
                    <input type="hidden" name="query" value="queryAdd">
                            <div class="panel panel-primary" id="panelAdd">
                                <div class="panel-heading">
                                    <h4>Добавить клиента</h4>
                                </div>
                                <div class="panel-body" id="panel-body">
                                    <label for="Name">Имя:</label>
                                    <input class="input form-control" id="Name" name="Name">
                                    <label for="Email">Мейл:</label>
                                    <input class="input form-control" id="Email" name="Email" >
                                    <label for="Phone">Телефон:</label>
                                    <input class="input form-control" id="Phone" name="Phone" placeholder="00000000000" type="number">
                                </div>
                                <div class="panel-footer">
                                    <input class="btn btn-primary form-control" type="submit" value="Записать данные"/><br/>
                                </div>
                            </div>
              </form>
        </div>
        <!------------------------------->
        <!------------------------------->

        <!---------------------->
        <!-- Список клиентов  -->
        <div class="col-md-6">
            <section id="sectionClients">
                <div class="row" >
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <!-- Заголовок панели / формы ввода  -->
                            <div class="panel-heading">
                                <div class="row" >
                                    <div class="col-md-6">
                                         <h4>Список клиентов</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Сортировать по:</h5>
                                        <select class='form-control' name="sortSelect" id="sortSelect" size="1">";
                                              <option value="name">имени</option>
                                              <option value="email">почте</option>
                                              <option value="phone">телефону</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Тело панели / формы ввода -->
                            <div class="panel-body" style="min-height: 200px" >
                                <div id="clientsTable">
                                    <?php

                                    try {
                                        clientsToTable(); //func.php
                                    } catch (Exception $ex)
                                    {
                                        $msg = $ex->getMessage();
                                        $line = $ex->getLine();
                                        echo "<span class='red-text'>$msg</span> в строке $line";
                                    } // try-catch

                                    ?>
                                </div>

                            </div><!--<div class="panel-body" id="Add">-->
                        </div><!--<div class="panel panel-primary" >-->
                    </div>

                </div><!--<div class="row">-->

            </section>
        </div><!--<div class="col-md-6">-->
            <!------------------------------->
            <!------------------------------->


</main>

<!--------------------------------------------------------------->

<footer class="center-block" id="Footer">
    <p class="text-center">
        Коломоец Андрей
        <br />
        <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>
        &nbsp 2019
    </p>
</footer>

<!--------------------------------------------------------------->


<!--------------------------------------------------------------->
<!-- Модальное окно -->
<script>
    modalWindow(); //JS/jsFun.js
</script>

<!--------------------------------------------------------------->

<!--------------------------------------------------------------->
<!--//Ajax запросы-->
<script>
    $(function(){

        // Сохранение данных из формы Добавление клиентов в БД
        $("#addForm").submit(function(event) {
            // Предотвращаем обычную отправку формы
            event.preventDefault();
            $.post('php/ajaxQery.php',
                $("#addForm").serialize(),
                function(data) { // получение данных от сервера
                    $('#myModal').modal('show')
                    $('#modalTxt').text(data)
                });
        });



        // Удаляем клиента по клику
        $("input", "#clientsTable").click(function(event) {
            var idClients = event.target.id;
            // Предотвращаем обычную отправку формы
            event.preventDefault();
            $.post('php/ajaxQery.php',
                {'query':'queryDel', 'idClients':idClients}, // данные, передаваемые на сервер
                function(data) { // получение данных от сервера
                    $('#myModal').modal('show')
                    $('#modalTxt').text(data)
                });
        });



        // Сортировка
        $('#sortSelect').on('change', function(){
            //получаем данные из select
            var argSort  =  $('#sortSelect').val();
            // Ajax запрос
            $.post('php/ajaxQery.php',
                {'query':"querySort", 'argSort':argSort},
                function(data) { // получение данных от сервера
                    $('#clientsTable').html(data);
                }
            );
        });

    });//$(function()
</script>




</body>
</html>