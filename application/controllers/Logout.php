<?php
class Logout extends CI_Controller{
    function index(){
        session_start();
        session_unset();
        redirect('pizza');
    }
}