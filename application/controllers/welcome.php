<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('random');
    }
    public function index() {
       $this->template->render();
    }

}
