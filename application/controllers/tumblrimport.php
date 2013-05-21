<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tumblrimport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('tumblr_import');
		$this->_data['nav_selected'] = 'tumblr_import';
	}

	public function index()
  {
      $this->load->library('tumblr');
  	  //$this->tumblr->tumblr_read_tagged = "art";
      $this->_data['posts'] = $this->tumblr->read_posts();
      $this->_data['all'] = "hi all";
      $this->view->render($this->_data);
  
  }
  
  public function clear()
  {
    $this->output->clear_all_cache();
    $this->view->render($this->_data);
  }
  
  public function create()
  {
    $this->tumblr_import->set_news();
  }
}