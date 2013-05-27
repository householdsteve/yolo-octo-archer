<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social_stream extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'social-stream';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
    $this->load->database();
    set_time_limit(0);
    $this->load->library('twitterlib');
  }
  
  public function index($start="")
  { 
    $this->view->set('_uni_title', 'FALSE')->render($this->_data);
  }
  
  public function find($cachetime=null){
    $this->twitterlib->search($cachetime);
  }
  
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */