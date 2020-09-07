<?php

$dbconn = pg_connect("host=localhost dbname=test user=test password=test")
or die('Could not connect: ' . pg_last_error());

$code = $_GET['code'];

$query = "SELECT * FROM public.pass WHERE code='$code';";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

if (pg_num_rows($result) == 0) {
    echo "<p>Такой номер отсутствует в базе</p>";
    return;
}

$line = pg_fetch_array($result, null, PGSQL_ASSOC);
$name = $line['name'];
$surname = $line['surname'];
$fathername = $line['fathername'];
$phone = $line['phone'];
$email = $line['email'];
$passport = $line['passport'];
$from = $line['from'];
$to = $line['to'];
$day = $line['day'];

echo "<p>Такой пропуск есть в базе данных</p>" .
    "<p>Номер пропуска:  $code </p>" .
    "<p>Фамилия:  $surname </p>" .
    "<p>Имя:  $name </p>" .
    "<p>Отчество:  $fathername</p>" .
    "<p>Телефон:  $phone</p>" .
    "<p>Email: $email</p>" .
    "<p>Паспорт:  $passport</p>" .
    "<p> Пропуск действителен : $day</p>" .
    "<p>Маошрут передвижения:  $from- $to</p>";

pg_close($dbconn);
