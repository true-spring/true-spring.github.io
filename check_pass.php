<?php

$dbconn = pg_connect("host=localhost dbname=test user=test password=test")
or die('Could not connect: ' . pg_last_error());

$code = $_GET['code'];

$query = "SELECT * FROM public.pass WHERE code='$code';";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

if(pg_num_rows($result) == 0)
{
    echo "<p>Нет такого кода. Наебать мемя сука хочешь</p>";
    return;
}

$line = pg_fetch_array($result, null, PGSQL_ASSOC);
$name = $line['name'];
$surname = $line['surname'];
echo "<p>Код выдан на имя $name $surname</p>>";