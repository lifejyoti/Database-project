<?php
// Vishruti Patel [8702093]
// Jiwan Jyoti [8749893]
?>

<?php
define('DB_USER', 'root');
define('DB_PASSWORD', '12345');
define('DB_HOST', 'localhost');
define('DB_NAME', 'patel_jyoti_pizzastore');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	OR die('Could not connect to MySQL: ' . mysqli_connect_error());

function prepare_string($dbc, $string) {
        $string = mysqli_real_escape_string($dbc, trim($string));
        return $string;
    }
?>