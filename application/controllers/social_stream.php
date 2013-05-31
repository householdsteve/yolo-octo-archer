<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social_stream extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    // add class 'selected' to navigation menu 
    $this->_data['nav_selected'] = 'social-stream';
    $this->_data['sub_nav_selected'] = '';
    // do not do $this->view->render(); here
    // otherwise the 404 error may not work
    $this->load->database();
    set_time_limit(0);
    $this->load->library('twitterlib');
  }
  
  public function index($start="")
  {     
		$this->load->model('social_stream_model');
    $this->_data['data'] = $this->social_stream_model->get_all(19);
    
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("social_stream/index",$this->_data);
		}else{
		  
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function merge_feeds($start="")
  {     
		$this->load->model('social_stream_model');
    $this->_data['data'] = $this->social_stream_model->merge_feeds();
    
    if( $this->input->is_ajax_request() )
		{
		  $this->load->view("social_stream/index",$this->_data);
		}else{
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function find($cachetime=null){
    $this->twitterlib->search($cachetime);
  }
  
  public function instagram(){
    $this->load->library('instagram_api');
    $tags_search_data = $this->instagram_api->tagsRecent('onenightonlyroma');
		
		$this->load->model('social_stream_model');
		
		foreach($tags_search_data->data as $key => $item){
		  $this->social_stream_model->insert($item);
		  //$this->social_stream_model->matcher($item->id);
		}
		
		$this->_data['ig'] = $tags_search_data;
		$this->view->set('_uni_title', 'FALSE')->render($this->_data);
  }
  
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */