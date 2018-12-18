<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Layouts extends CI_Controller{
 
  function index()
  {
    $this->template->load('template', 'layouts');
  }
 
}