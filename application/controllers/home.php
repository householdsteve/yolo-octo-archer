<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'news';
    $this->_data['sub_nav_selected'] = '';
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
    $this->_data['rows'] = 4;
    $this->_data['columns'] = 4;
    $this->_data['events'] = array();
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,5,30,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/may_30.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"GIORGIO ARMANI",
                                      "subtitle"=>"A Tribute to Rome",
                                      "type"=>"WATCH NOW");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,5,31,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/Tornatore.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"false",
                                      "title"=>"GIUSEPPE TORNATORE",
                                      "subtitle"=>"VIDEO INTERVIEW",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,1,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"1.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,2,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"2.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,3,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"3.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,4,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"4.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,5,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "classes"=>"event",
                                      "custom-date"=>"LIVE",
                                      "title"=>"SEE THE EVENT LIVE",
                                      "subtitle"=>"5.6.2013",
                                      "type"=>"countdown");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,6,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"6.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,7,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"7.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,8,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"8.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,9,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"9.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,10,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"10.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,11,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"11.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,12,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"12.6.2013",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,13,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"13.6.2013",
                                      "type"=>"");

    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,14,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg",
                                      "link"=>"/home/countdown",
                                      "enabled"=>"false",
                                      "available"=>"false",
                                      "title"=>"CONTENT COMING:",
                                      "subtitle"=>"14.6.2013",
                                      "type"=>"");
    
    $this->view->set('_uni_title', 'FALSE')->render($this->_data);
  }
  
  public function countdown($id){
    if( $this->input->is_ajax_request() )
		{
      parse_str($_SERVER['QUERY_STRING'], $_GET);
      $this->_data['w'] = $_GET['w'];
      $this->_data['h'] = $_GET['h'];    
      $this->_data['isAjax'] = true;      
      echo json_encode( array("html"=>$this->load->view("home/".$id.".php", $this->_data, true)) );
    }else{
      $this->_data['w'] = "100%"; // incase internet explorer gets it
      $this->_data['h'] = "100%";
      $this->_data['id'] = $id;
      $this->_data['isAjax'] = false;
      $this->_data['data'] = $this->_data;      
      //$this->load->view("home/".$id.".php", $this->_data);
      $this->view->set('_uni_title', 'FALSE')->render($this->_data);
    }  
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
  
  public function waiting(){
    	$this->load->view("layouts/static.php");
  }
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */