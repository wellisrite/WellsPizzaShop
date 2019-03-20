<?php
class Contact extends CI_Controller{
    function index(){
        $this->load->view('header');
        $this->load->view('contact');
        $this->load->view('footer');
    }
}
