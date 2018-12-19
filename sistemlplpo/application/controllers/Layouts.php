<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Layouts extends CI_Controller{
//index layout untuk meload templete dan layout
  function index()
  {
    $this->template->load('template', 'layouts');
  }
 
}