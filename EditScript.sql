

/*//////////////////////////////////////1. Создание БД///////////////////////////////*/ 
-- удаление базы данных
drop database if exists clients_db;

-- создание базы данных и таблиц, задать кодировку и тип сортировки
create database if not exists  clients_db charset utf8 collate utf8_general_ci;

use clients_db;    -- БД clients_db стала текущей


-- Создаем таблицу с клиентами
create table if not exists clients (
	id         int primary key auto_increment,  
    name       varchar(255) not null,      
    email      varchar(255) not null,      
    phone      varchar(255) not null,
    flagDelete boolean      not null        -- пометка на удаление
)engine=InnoDB char set=UTF8;


	   
/*///////////////////////////////2. Заполняет БД данными ///////////////*/
use clients_db; 
     
 
insert into clients values
	(null, 'Андрей',     'andrey@mail.ru',   '79001234567', false),
	(null, 'Сергей',     'serg@mail.ru',     '79011237854', false),
	(null, 'Александр',  'alex@mail.ru',     '79011238544', false),
	(null, 'Татьяна',    'tat@mail.ru',      '79004545222', false),
	(null, 'Ольга',      'olga@mail.ru',     '79021234567', false),
	(null, 'Константин', 'kostya@mail.ru',   '79581472552', false),
	(null, 'Иван',       'ivan@mail.ru',     '79005249746', false),
	(null, 'Марина',     'mary@mail.ru',     '79581225496', false),
	(null, 'Анна',       'an@mail.ru',       '79001255567', false),
	(null, 'Светлана',   'svetlana@mail.ru', '79011265267', false)
    ;



