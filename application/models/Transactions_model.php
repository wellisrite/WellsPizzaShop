<?php
class Transactions_model extends CI_Model{
  function transactions_list(){
    $trans=$this->db->get('tblTransactions');
    return $trans;
  }
  function trans_uses($id){
    $this->db->where('id',$id);
    $this->db->where('status <>','on cart');
    $trans=$this->db->get('tblTransactions');
    return $trans;
  }
  function trans_use($id){
    $trans=$this->db->get_where('tblTransactions',array('id'=>$id,'status'=>'on cart'));
    return $trans;
  }
  function trans_get($kodeT,$kodeP){
  	$trans=$this->db->get_where('tblTransactions',array('kodeT'=>$kodeT));
    return $trans;	
  }
  function getOrders($id){
    $this->db->where('id',$id);
    $this->db->where('status <>','on cart');
    $orders=$this->db->get('tblTransactions');
    return $orders;
  }
  function getTransactionsD($sdate,$edate){
    $this->db->where('tanggalT >=',$sdate);
    $this->db->where('tanggalT <=',$edate);
    $this->db->where('status <>','on cart');
    $trans=$this->db->get('tblTransactions');
    return $trans;
  }
  function getTransactionsU($id){
    $this->db->where('id',$id);
    $this->db->where('status <>','on cart');
    $trans=$this->db->get('tblTransactions');
    return $trans;
  }
}
 ?>
