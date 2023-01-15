<?php 
include_once ("../../../model/user/user_list.php"); 
session_start();

if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {

    $user_list = new user_list();
    $user_list->get_user_list_from_BBDD();
    //$users = $user_list->getArrayObjVars("user_list");
    $users = $user_list->get_full_extra_list();
    $loged_user = array_search($_SESSION['NIF'], array_column($users, 'NIF'));
    unset($users[$loged_user]); //quitamos el usuario que esta loegeado

    echo json_encode($users);
} else {
    echo json_encode("no admin");
}
?>