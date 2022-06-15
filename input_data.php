<?php
function insertData($connect, $user_name, $user_email)
{
    $user_name = trim(mysqli_real_escape_string($connect, htmlspecialchars($user_name)));
    $user_email = trim(mysqli_real_escape_string($connect, htmlspecialchars($user_email)));

    // IF NAME OR EMAIL IS EMPTY
    if (empty($user_name) || empty($user_email)) {
        return 'Please fill all required fields.';
    }
    //IF EMAIL IS NOT VALID
    elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        return 'Invalid email address.';
    } else {
        $check_email = mysqli_query($connect, "SELECT `email` FROM `users` WHERE `email` = '$user_email'");
        // IF THE EMAIL IS ALREADY IN USE
        if (mysqli_num_rows($check_email) > 0) {
            return 'This email is already registered. Please try another.';
        }

        // INSERTING THE USER DATA
        $query = mysqli_query($connect, "INSERT INTO `users`(`name`,`email`) VALUES('$user_name','$user_email')");
        // IF USER INSERTED
        if ($query) {
            return true;
        }
        return 'Opps something is going wrong!';
    }
}
?>
