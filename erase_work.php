<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: home_steve.php');
    exit;
}
require_once './voste_db connection.php';
$id = trim(mysqli_real_escape_string($connect, $_GET['id']));
$delete_user = mysqli_query($connect, "DELETE FROM `users` WHERE id='$id'");
header('Location: home_steve.php');
exit;
?>
