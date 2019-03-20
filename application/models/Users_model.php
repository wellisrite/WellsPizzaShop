<?php
class Users_model extends CI_Model{
    function list_users(){
        $users=$this->db->get('tblUsers');
        return $users;
    }
    function get_user($id){
        $account=$this->db->get_where('tblUsers',array('id' => $id));
        return $account;
    }
}