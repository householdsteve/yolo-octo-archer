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
    $this->_data['sub_nav_selected'] = '';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("eccentrico/index",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function hong_kong($start="")
  {
    $this->_data['sub_nav_selected'] = 'hong-kong';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("eccentrico/hong_kong",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function milan($start="")
  {
    $this->_data['sub_nav_selected'] = 'milan';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("eccentrico/milan",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function tokyo($start="")
  {
    $this->_data['sub_nav_selected'] = 'tokyo';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("eccentrico/tokyo",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function rome($start="")
  {
    $this->_data['sub_nav_selected'] = 'rome';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("eccentrico/rome",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */