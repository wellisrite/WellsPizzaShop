<?php
class Pizza_model extends CI_Model{
    function list_products(){
        $products=$this->db->get('tblProducts');
        return $products;
    }
    function getPizza($product){
        $data=$this->db->get_where('tblProducts',array('kodeP'=> $product));
        return $data;
    }
}
?>