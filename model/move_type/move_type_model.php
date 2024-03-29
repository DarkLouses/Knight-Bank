<?php

include_once ("move_type_class.php"); 

include_once (str_replace("move_type", "", __DIR__  . "database/query.php")); 
include_once (str_replace("move_type", "", __DIR__  . "function.php")); 

class move_type_model extends move_type_class {

    private $objmove_typeType;

//------------------------------------------------------------------
//CRUD (SIN SELECT)
//------------------------------------------------------------------

    public function insert_move_type () {
        return insert("insert into move_type (name) values ('$this->name')");
    }

    public function delete_move_type () {
       return delete('move_type',$this->id_moveType);
    }

    public function update_move_type () {
        return update("update move_type set name='$this->name' WHERE id_moveType = $this->id_moveType");
    }
//------------------------------------------------------------------
//OBTENCION DE DATOS DE LA BBDD
//------------------------------------------------------------------
    public function get_move_type_by_id ($id) {
       return single_row_object_select("select * from move_type where id = $id", new move_type_model());
    }

    public function get_move_type_by_name () {
        return single_row_object_select("select * from move_type where name = '$this->name'",new move_type_model());
    }



}

?>