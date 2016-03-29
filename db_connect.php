<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=cs2102 user=postgres password=123")
    or die('Could not connect: ' . pg_last_error());
?>