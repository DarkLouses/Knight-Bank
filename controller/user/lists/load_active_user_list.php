<?php 
include_once ("../../../model/user/user_model.php"); 
session_start();

if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {//medida de seguridad

    $user_list = new user_model();

    //$user_list->get_user_list_from_BBDD();
    $active_users = $user_list->get_active_extra_list();

    echo json_encode($active_users);
} else {
    echo json_encode("no admin");
}
?>