<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artwork extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->library('tumblr');
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'artwork';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
  }
  
  public function index()
  {
	  $this->tumblr->tumblr_read_tagged = "art-post";
    $this->_data['posts'] = $this->tumblr->read_posts();
    $this->output->cache(43829);
    $this->view->render($this->_data);
  }
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */