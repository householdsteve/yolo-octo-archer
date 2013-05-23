<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'news';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
  }
  
  public function index($start="")
  {
    // $this->load->library('pagination');
    //    $posts = $this->tumblr->read_posts();
    //    
    //    foreach($posts as $key => $row){
    //      if(isset($row['tag'])){
    //        if(is_array($row['tag'])) $row['tag'] = implode(",", $row['tag']);
    //        if (preg_match("/art-post|tattoo-post|np/i", $row['tag'])) {
    //          unset($posts[$key]);
    //        }
    //      }
    //    }
    //    
    //    
    //    $quantity = 10; // how many per page
    //    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    //    if(!$start) $start = 0; // default to zero if no $start
    // 
    //    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    //    $this->_data['posts'] = array_slice($posts, $start, $quantity);
    // 
    //    $config['base_url'] = base_url().'news/page/';
    //    $config['uri_segment'] = 3;
    //    $config['total_rows'] = count($posts);
    //    $config['per_page'] = $quantity;
    // 
    //    $this->pagination->initialize($config);
    // 
    //    $this->_data['pagination'] = $this->pagination->create_links();
    //    
    //    
    //    //$this->_data['posts'] = $posts;
    //    $this->output->cache(43829);    
    $this->view->set('_uni_title', 'FALSE')->render($this->_data);
  }
  
  public function timer(){
    	if( $this->input->is_ajax_request() )
			{
				// If form token matches
			  $now = new DateTime(); 
				echo json_encode( array("timer"=>$now->format("M j, Y H:i:s O")) );
			}else{
			  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
			}
  }
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */