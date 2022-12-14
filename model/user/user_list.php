<?php 
include_once ("user_model.php"); 
include_once (str_replace("user", "", __DIR__  . "database/query.php")); 
include_once (str_replace("user", "", __DIR__  . "function.php")); 
include_once (str_replace("user", "", __DIR__  . "standard_class.php")); 
class user_list extends standard_class{

    private $user_list;

    /**
     * Get the value of user_list
     */
    public function getUserList()
    {
        return $this->user_list;
    }

    /**
     * Set the value of user_list
     */
    public function setUserList($user_list): self
    {
        $this->user_list = $user_list;

        return $this;
    }


    public function get_user_list_from_BBDD() {
        $select = select_Object("SELECT * FROM user");
        $this->user_list = cast_array($select, new user_model());

        return $this->user_list;
    }


    public function get_active_users() {
        $result_list = array();
           foreach ($this->user_list as $user) {
                if ($user->getLogintries() > 0 && $user->getAdmin() == 0) {
                    array_push($result_list,$user->getObjvars());
                }
           }
        return $result_list;
    }

    public function get_inactive_users() {
        $result_list = array();
           foreach ($this->user_list as $user) {
                if ($user->getLogintries() == 0) {
                    array_push($result_list,$user->getObjvars());
                }
           }
        return $result_list;
    }

    public function get_administrators() {
        $result_list = array();
           foreach ($this->user_list as $user) {
                if ($user->getAdmin() > 0) {
                    array_push($result_list,$user->getObjvars());
                }
           }
        return $result_list;
    }

}
?>