<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Boutique extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'boutique';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
  }
  
  public function index($start="")
  {
    $this->_data['sub_nav_selected'] = '';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("boutique/index",$this->_data);
		}else{
		  $this->_data['nonasync'] = true;
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */