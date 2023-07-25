<?php
require_once('db.php');
require_once('config.php');
include('templates/header.php');
$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
$records = fetchAll($db);
?>

<?php
include('templates/footer.php') 
?>
