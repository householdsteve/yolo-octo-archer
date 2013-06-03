<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preview extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'preview';
    $this->_data['sub_nav_selected'] = '';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
    
  }
  
  public function index($id){
      $this->_data['id'] = $id;
      $this->_data['data'] = $this->_data;      
      $this->view->set('_uni_title', 'FALSE')->render($this->_data);  
  }
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */