<?php
  class Cart extends CI_Controller{
    function index(){
      $this->load->model('shop_model');
      $status=$this->shop_model->getStatus();
      if($status['status']=="forced open"){
        $this->load->view('header');
        $this->load->model('Transactions_model');
        $this->load->model('Pizza_model');
        $id=$_SESSION['id'];
        $data['transactions']=$this->Transactions_model->trans_use($id)->result();
        //echo print_r($data['transactions']);
        $this->load->view('cart',$data);
        $this->load->view('footer');
      }
      else if($status=="force closed"){
        redirect('pizza');
      }
      else{
      $open=strtotime("07:00:00");
      $close=strtotime("18:00:00");
      $time=strtotime(date('H:i:s'),now());
      $leftime=$open-$time;
      if(date('l')=='Saturday' || date('l')=='Sunday')
      {
        redirect('pizza');
      }
      else if($time<$open){
       redirect('pizza');
      }
      else if($time>$close){
       redirect('pizza');
      }
      else{
        $this->load->view('header');
        $this->load->model('Transactions_model');
        $this->load->model('Pizza_model');
        $id=$_SESSION['id'];
        $data['transactions']=$this->Transactions_model->trans_use($id)->result();
        //echo print_r($data['transactions']);
        $this->load->view('cart',$data);
        $this->load->view('footer');
      }
    }
    }
    function input(){
      session_start();
      $kode=$this->input->post('products');
       $this->load->model('Transactions_model');
       $id=$_SESSION['id'];
       $date= date("Y-m-d h-i-s",now());
      foreach($kode as $i){
        $data=array(
          'idT' => null,
          'kodeT' => $id.date("Y-m-d",now()),
          'id' => $id,
          'kodeP' => $i,
          'tanggalT' =>$date,
          'status' => 'on cart'
        );
        $this->db->insert('tblTransactions',$data);
      }
      redirect('cart');
    }
    function special_input(){ 
      $this->load->model('shop_model');
      $status=$this->shop_model->getStatus();
      if($status['status']=="forced open"){
       session_start();
      $kode=$this->uri->segment(3);
      $this->load->model('Transactions_model');
       $id=$_SESSION['id'];
       $date= date("Y-m-d h-i-s",now());
      $data=array(
          'idT' => null,
          'kodeT' => $id.date("Y-m-d",now()),
          'id' => $id,
          'kodeP' => $kode,
          'tanggalT' =>$date,
          'status' => 'on cart'
      );
      $this->db->insert('tblTransactions',$data);
      redirect('cart'); 
      }
      else if($status=="force closed"){
        redirect('pizza');
      }
      else{
      $open=strtotime("07:00:00");
      $close=strtotime("18:00:00");
      $time=strtotime(date('H:i:s'),now());
      $leftime=$open-$time;
      if(date('l')=='Saturday' || date('l')=='Sunday')
      {
        redirect('pizza');
      }
      else if($time<$open){
       redirect('pizza');
      }
      else if($time>$close){
       redirect('pizza');
      }
      else{
      session_start();
      $kode=$this->uri->segment(3);
      $this->load->model('Transactions_model');
       $id=$_SESSION['id'];
       $date= date("Y-m-d h-i-s",now());
      $data=array(
          'idT' => null,
          'kodeT' => $id.date("Y-m-d",now()),
          'id' => $id,
          'kodeP' => $kode,
          'tanggalT' =>$date,
          'status' => 'on cart'
      );
      $this->db->insert('tblTransactions',$data);
      redirect('cart'); 
    }
    }
  }
    function checkout(){
        $this->load->model('Transactions_model');
        $quantity=array();
        for($i=0;$i<$this->input->post('length');$i++){
            $this->db->where('kodeT',$this->input->post('kodeT'));
            $this->db->where('kodeP',$this->input->post('kodeP'.$i));
            $data=array('quantity'=>$this->input->post('quantity'.$i),
                        'status' => 'checkout');
            $quantity[$i]=$data['quantity'];
            $this->db->update('tblTransactions',$data);
        }
        $data['qtotal']=$this->input->post('qtotal');
        $data['ptotal']=$this->input->post('ptotal');
        $this->load->view('header');
        $id=$_SESSION['id'];
        $data['transactions']=$this->Transactions_model->trans_uses($id)->result();
        $this->load->view('payout',$data);
        $this->load->view('footer');
        $this->load->model('Pizza_model');
        for($i=0;$i<$this->input->post('length');$i++){
          $kode=$this->input->post('kodeP'.$i);
          $stock=$this->Pizza_model->getPizza($kode)->row_array();
          $data=array('stock' => $stock['stock']-$quantity[$i],'nbought'=> $stock['nbought']+$quantity[$i]);
          $this->db->where('kodeP',$kode);
          $this->db->update('tblProducts',$data);
        }
        $this->load->model('users_model');
    }
    function delete(){
      $this->load->model('Transactions_model');
      $kode=$this->uri->segment(3);
      $this->db->where('kodeP',$kode);
      $this->db->delete('tblTransactions');
      redirect('cart');
    }
  }
 ?>
