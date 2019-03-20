<?php
class Products extends CI_Controller{
    function index(){
        $this->load->model('pizza_model');
        $this->load->model('shop_model');
        $status=$this->shop_model->getStatus();
        $data['status']=$status['status'];
        if($status['status']=="force closed"){
        $this->load->view('header');
        $this->load->view('closed');
        $this->load->view('footer');
      	}
      	else{
        $this->load->view('header');
        $data['products']=$this->pizza_model->list_products()->result();
        $this->load->view('products',$data);
        $this->load->view('footer');
    	}
    }
}
