<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'contact';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
  }
  
  public function index()
  {
      $this->load->library('tumblr');
  	  $pages = $this->tumblr->read_pages();
  	  $usekey = null;
  	  foreach($pages as $key => $page){
  	    if (preg_match("/contact/i", $page['url'])) {
          $usekey = $key;
        }
  	  }
 
      $this->_data['posts'] =  $pages[$usekey]['body'];
      $this->output->cache(43829);
      $this->view->render($this->_data);
  
  }
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */