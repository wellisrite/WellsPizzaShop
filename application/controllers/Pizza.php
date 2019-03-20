<?php
class Pizza extends CI_Controller{
    function index(){
        redirect('pizza/page');
    }
    function input(){
        $this->load->view('header');
        $this->load->view('input_pizza');
        $this->load->view('footer');
    }
    function save_pizza(){
        $products=array(
          'kodeP' => $this->input->post('kodeP'),
          'namaP' => $this->input->post('namaP'),
          'image' => $this->input->post('image'),
          'harga' => $this->input->post('harga'),
          'stock' => $this->input->post('stock'),
          'description' => $this->input->post('description')
        );
        $this->db->insert('tblProducts',$products);
        redirect('products');
    }
    function edit(){
      $this->load->model('pizza_model');
      $this->load->view('header');
      $productK=$this->uri->segment(3);
      $data['pizza']=$this->pizza_model->getPizza($productK)->row_array();
      if($data['pizza']['kodeP']==""){
        $this->load->view('not_found');
        $this->load->view('footer');
      }
      else{
      $this->load->view('edit_products',$data);
      $this->load->view('footer');
      }
    }
    function edit_products(){
      $kode=$this->input->post('kodeP');
      //echo $kode;
      $data=array(
        'kodeP' => $kode,
        'namaP' => $this->input->post('namaP'),
        'image' => $this->input->post('image'),
        'harga' => $this->input->post('harga'),
        'stock' => $this->input->post('stock'),
        'description' => $this->input->post('description')
      );
      //echo print_r($data);
      $this->db->where('kodeP',$kode);
      $this->db->update('tblProducts',$data);
      redirect('products');
    }
    function delete(){
        $kode=$this->uri->segment(3);
        $this->db->where('kodeP',$kode);
        $this->db->delete('tblProducts');
        redirect('products');
    }
    function page(){
      $this->load->model('shop_model');
      $status=$this->shop_model->getStatus();
      $data['status']=$status['status'];
      $this->db->select()->from('tblProducts')->order_by('nbought','desc');
      $data['best']=$this->db->get()->result();
      if($status['status']=="force closed"){
        $this->load->view('header');
        $this->load->view('closed');
        $this->load->view('footer');
      }
      else{
      $this->load->view('header',$data);
       $this->load->view('index',$data);
       $this->load->view('footer');
      }
    }
}
