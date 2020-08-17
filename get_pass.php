<?php

if(empty($_GET['name']))
{
    echo "<p>Введите имя</p>";
    return;
}

if(empty($_GET['surname']))
{
    echo "<p>Введите фамилию</p>";
    return;
}


if(empty($_GET['fathername']))
{
    echo "<p>Введите отчество</p>";
    return;
}


if(empty($_GET['phone']))
{
    echo "<p>Введите номер телефона</p>";
    return;
}


if(empty($_GET['email']))
{
    echo "<p>Введите Email</p>";
    return;
}



if(empty($_GET['passport']))
{
    echo "<p>Введите серию и номер документа</p>";
    return;
}


if(    empty($_GET['private']) && empty($_GET['public']) )
{
    echo "<p>Выберите вид транспорта</p>";
    return;
}

if(empty($_GET['from']))
{
    echo "<p>Введите адрес отправления</p>";
    return;
}

if(empty($_GET['to']))
{
    echo "<p>Введите адрес назначения</p>";
    return;
}

if(empty($_GET['day']))
{
    echo "<p>Введите дату поездки</p>";
    return;
}


//TODO: check other fields
// 0000-0000-0000-0000

$date = date("dm");
$rnd0 = rand(0, 9999);
$rnd1 = rand(0, 9999);
$rnd2 = rand(0, 9999);

$code = sprintf("%s-%04d-%04d-%04d", $date, $rnd0, $rnd1, $rnd2);

// prepare variables
$name = $_GET['name'];
$surname = $_GET['surname'];
$fathername = $_GET['fathername'];
$purpose = '---';
$dbData = date("Y-m-d");
$desc = '---';

$dbconn = pg_connect("host=localhost dbname=test user=test password=test")
or die('Could not connect: ' . pg_last_error());

$args = [
    "date" => $dbData,
    "name" => $name,
    "surname" => $surname,
    "desc" => $desc,
    "code" => $code,
    "fathername" => $fathername,
    "passport" => $passport,
    "from" => $from,
    "to" => $to,

];

pg_insert($dbconn, "public.pass", $args);


/*
$query = 'INSERT INTO public.pass (date, name, surname, purpuse, desc) VALUES';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
*/
echo "<p>Ваш код " . $code . "</p>";