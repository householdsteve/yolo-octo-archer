<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'events';
    $this->output->cache(44640);
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
  }
  
  public function index($start="")
  {
    $this->_data['sub_nav_selected'] = '';    
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("events/index",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function rome($start="")
  {
    $this->_data['sub_nav_selected'] = 'rome';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("events/rome",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function beijing($start="")
  {
    $this->_data['sub_nav_selected'] = 'beijing';
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("events/beijing",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }

  public function london($start="")
    {
      $this->_data['sub_nav_selected'] = 'london';
      if( $this->input->is_ajax_request() )
  		{
  		  $this->load->view("events/london",$this->_data);
  		}else{
  		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
  		}
    }
    
    public function tokyo($start="")
      {
        $this->_data['sub_nav_selected'] = 'tokyo';
        if( $this->input->is_ajax_request() )
    		{
    		  $this->load->view("events/tokyo",$this->_data);
    		}else{
    		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
    		}
      }
  
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */