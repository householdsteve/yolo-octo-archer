<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eccentrico extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'eccentrico';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
  }
  
  public function index($start="")
  {
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("eccentrico/index");
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function hong_kong($start="")
  {
    $this->_data['sub_nav_selected'] = 'hong-kong';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("eccentrico/hong_kong");
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */