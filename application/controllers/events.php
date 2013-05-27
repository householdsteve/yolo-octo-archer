<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'events';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
  }
  
  public function index($start="")
  {
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("events/index");
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function roma($start="")
  {
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("events/roma");
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function beijing($start="")
  {
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("events/beijing");
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */