<?php

require_once './voste_db connection.php';
require_once './collect.php';
require_once './new_update.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: home_steve.php');
    exit;
}

if (isset($_POST['user_name']) && isset($_POST['user_email'])) {

    $update_data = updateUser($connect, $_GET['id'], $_POST['u_name'], $_POST['u_email']);

    if ($update_data === true) {
        header('Location: home_steve.php');
        exit;
    }
}

$theUser = fetchUser($connect, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP CRUD Application</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

<div class="container">
    <header class="header">
        <h1 class="title">PHP CRUD Application</h1>
        <p>By <a href="//www.w3jar.com">w3jar.com</a></p>
    </header>
    <div class="wrapper edit-wrapper">
        <div class="form">
            <form method="POST">
                <label for="userName">Full Name</label>
                <input type="text" name="user_name" value="<?php echo htmlspecialchars($theUser['name']); ?>" id="userName" placeholder="Name" autocomplete="off" required>
                <label for="userEmail">Email</label>
                <input type="email" name="user_email" value="<?php echo htmlspecialchars($theUser['email']); ?>" id="userEmail" placeholder="Email" autocomplete="off" required>
                <?php if (isset($update_data) && $update_data !== true) {
                    echo '<p class="msg err-msg">' . $update_data . '</p>';
                }
                ?>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</div>

</body>

</html>