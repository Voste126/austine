<?php
function updateUser($connect, $id, $user_name, $user_email)
{

    $id = trim(mysqli_real_escape_string($connect, $id));
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
        $check_email = mysqli_query($connect, "SELECT `email` FROM `users` WHERE `email` = '$user_email' AND `id`!='$id'");
        // IF THE EMAIL IS ALREADY IN USE
        if (mysqli_num_rows($check_email) > 0) {
            return 'This email is already registered. Please try another.';
        }

        // UPDATE USER DATA
        $query = mysqli_query($connect, "UPDATE `users` SET `name`='$user_name', `email`='$user_email' WHERE `id`='$id'");
        // IF USER UPDATED
        if ($query) {
            return true;
        }
        return 'sorry something is going wrong!';
    }
}
?>