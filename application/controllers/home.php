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
  public function clear()
  {
    $this->output->clear_all_cache();
    $this->view->set('_uni_title', 'FALSE')->render($this->_data);
  }
  
  public function index($start="")
  {
    $this->_data['rows'] = 4;
    $this->_data['columns'] = 4;
    $this->_data['events'] = array();
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,5,30,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/may_30.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"GIORGIO ARMANI",
                                      "subtitle"=>"A Tribute to Rome",
                                      "type"=>"CLICK TO WATCH");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,5,31,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/Tornatore.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"GIUSEPPE TORNATORE",
                                      "subtitle"=>"VIDEO INTERVIEW",
                                      "type"=>"CLICK TO WATCH");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,1,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/Bova.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"RAOUL BOVA",
                                      "subtitle"=>"VIDEO INTERVIEW",
                                      "type"=>"CLICK TO WATCH");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,2,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/Preziosi.jpg",                                      
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"ALESSANDRO PREZIOSI",
                                      "subtitle"=>"VIDEO INTERVIEW",
                                      "type"=>"CLICK TO WATCH");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,3,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/Lupano.jpg",                                      
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"GIORGIO LUPANO",
                                      "subtitle"=>"VIDEO INTERVIEW",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,4,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/Giorgio-Armani_74-crop.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"Q&A WITH MR. ARMANI",
                                      "subtitle"=>"READ THE INTERVIEW",
                                      "override"=>"true",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,5,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/ga-arrivo-roma.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "classes"=>"event",
                                      "custom-date"=>"THE EVENT",
                                      "title"=>"ARRIVAL IN ROME",
                                      "subtitle"=>"& PRE SHOW FITTING",                                     
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,6,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/ga-sfilata-ono.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"WATCH THE SHOW",
                                      "subtitle"=>"ON DEMAND",
                                      "type"=>"");
                                   
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,7,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/Eccentrico-Roma_allestimento.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"ECCENTRICO",
                                      "subtitle"=>"EXHIBITION & COCKTAIL PARTY",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,8,2013),
                                      "image"=>base_url()."assets/img/catwalk/GA/one_night_only-GA_2.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"FROM THE RUNWAY",
                                      "subtitle"=>"",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,9,2013),
                                      "image"=>base_url()."assets/img/milla-jovovich_interview.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"EXCLUSIVE INTERVIEWS",
                                      "subtitle"=>"FROM THE EVENT",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,10,2013),
                                      "image"=>base_url()."assets/img/muti_interview.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"ITALIAN CELEBRITIES",
                                      "subtitle"=>"EXCLUSIVE INTERVIEWS",
                                      "type"=>"");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,11,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/Giorgio_Armani_boutique_via_Condotti.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"THE NEW STORE",
                                      "subtitle"=>"SEE THE PICTURES",
                                      "classes"=>"white",
                                      "type"=>"CLICK TO SEE");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,12,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/store.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"STORE WALKTHROUGH",
                                      "subtitle"=>"IN VIA CONDOTTI 77/79",
                                      "classes"=>"white",
                                      "type"=>"CLICK TO WATCH");
                                      
    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,13,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/insta-pic.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"THE BEST OF INSTAGRAM",
                                      "subtitle"=>"#ONENIGHTONLYROMA",
                                      "classes"=>"white",
                                      "type"=>"CLICK TO EXPLORE");

    $this->_data['events'][] = array( "date"=>mktime(0,0,0,6,14,2013),
                                      "image"=>"http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/makeup.jpg",
                                      "link"=>"home/countdown",
                                      "enabled"=>"true",
                                      "available"=>"true",
                                      "title"=>"ART BEHIND BEAUTY",
                                      "subtitle"=>"WATCH OUR MAKEUP ARTISTS AT WORK",
                                      "classes"=>"white",
                                      "type"=>"CLICK TO WATCH");
    $this->output->cache(44640);
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
         echo json_encode( array("timer"=>$now->format("Z")) );
			   //echo json_encode( array("timer"=>time()) );
			}else{
			  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
			}
  }
  
  public function waiting(){
      $this->output->cache(44640);
    	$this->load->view("layouts/static.php");
  }
  
  public function live(){
      //$this->output->cache(44640);
    	$this->view->set('_uni_title', 'FALSE')->render($this->_data);
  }
  
  public function more_from_rome(){

    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("home/more_from_rome",$this->_data);
		}else{
		      
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */