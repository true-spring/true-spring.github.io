<?php

if (empty($_GET['name'])) {
    echo "Введите имя";
    return;
}

if (empty($_GET['surname'])) {
    echo "Введите фамилию";
    return;
};

if (empty($_GET['fathername'])) {
    echo "Введите отчество";
    return;
}

if (empty($_GET['phone'])) {
    echo "Введите телефон";
    return;
}

if (empty($_GET['email'])) {
    echo "Введите почту";
    return;
}

if (empty($_GET['passport'])) {
    echo "Введите паспортные данные";
    return;
}

if (empty($_GET['from'])) {
    echo "Введите пункт отправления";
    return;
}

if (empty($_GET['to'])) {
    echo "Введите пункт назначения";
    return;
}

if (empty($_GET['day'])) {
    echo "Введите дату поездки";
    return;
}

$data = date("dmy");

$random1 = rand(0, 9999);
$random2 = rand(0, 9999);
$random3 = rand(0, 9999);

$code = sprintf("%s-%04d-%04d-%04d", $data, $random1, $random2, $random3);

$args = [
    "name" => $_GET['name'],
    "surname" => $_GET['surname'],
    "fathername" => $_GET['fathername'],
    "phone" => $_GET['phone'],
    "email" => $_GET['email'],
    "passport" => $_GET['passport'],
    "from" => $_GET['from'],
    "to" => $_GET['to'],
    "day" => $_GET['day'],
    "code" => $code,
];

$connect = pg_connect("host=localhost dbname=test user=test password=test") or die("Ошибка подключения" . pg_last_error());
pg_insert($connect, "public.pass", $args) or die("Ошибка записи в БД");


echo
    "<p>Ваш код :  $code  </p>" .
    "<p>Фамилия: " . $_GET['surname'] . "</p>" .
    "<p>Имя: " . $_GET['name'] . "</p>" .
    "<p>Отчество:  " . $_GET['fathername'] . "</p>" .
    "<p>Паспорт:  " . $_GET['passport'] . "</p>" .
    "<p> Пропуск действителен :  " . $_GET['day'] . "</p>" .
    "<p>Маошрут передвижения:  " . $_GET['from'] . "-" . $_GET['to'] . "</p>";


pg_close($dbconn);
