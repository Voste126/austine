<?php
// COLLECT  ALL USERS
function fetchUsers($connect){
    $query = mysqli_query($connect,"SELECT * FROM `users`");
    return mysqli_fetch_all($query,MYSQLI_ASSOC);
};

// COLLECT SINGLE USER ID
function fetchUser($connect, $id){
    $id = mysqli_real_escape_string($connect,$id);
    $query = mysqli_query($connect,"SELECT * FROM `users` WHERE `id`='$id'");
    $data = mysqli_fetch_assoc($query);
    if(!count($data)){
        header('Location: index.php');
        exit;
    }
    return $data;
}
?>
