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
    //$this->cache->model('social_stream_model', 'get_all', array(19), 120);
    $this->load->library('pagination');
		$this->load->model('social_stream_model');
		
		$config['base_url'] = base_url().'social-stream/index';
    $config['uri_segment'] = 3;
    $config['total_rows'] = $this->social_stream_model->count_social_rows();
    $config['per_page'] = 20;
    $config['display_pages'] = FALSE;
    $config['anchor_class'] = 'class="infinite-more-link"';
    $config['prev_link'] = FALSE;
    $config['first_link'] = FALSE;
    
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
    $this->_data['data'] = $this->social_stream_model->get_all($config['per_page'],$page);

    $this->pagination->initialize($config);

    $this->_data['pagination'] = $this->pagination->create_links();
    
    
    if( $this->input->is_ajax_request() )
		{
		  //$this->output->cache(44640);
		  $this->_data['isAjax'] = true;
		  $this->load->view("social_stream/index",$this->_data);
		}else{
		  //$this->output->cache(44640);
		  $this->_data['isAjax'] = false;
		  $this->view->set('_uni_title', 'FALSE')->render($this->_data);
		}
  }
  
  public function merge_feeds($start="")
  {     
		$this->load->model('social_stream_model');
    $this->_data['data'] = $this->social_stream_model->merge_feeds();
    
    // if( $this->input->is_ajax_request() )
    //    {
    //      $this->load->view("social_stream/index",$this->_data);
    //    }else{
    //      $this->view->set('_uni_title', 'FALSE')->render($this->_data);
    //    }
  }
  
  public function find($cachetime=null){
    $this->twitterlib->search($cachetime);
  }
  
  public function instagram(){
    $this->load->library('instagram_api');
    $tags_search_data = $this->instagram_api->tagsRecent('onenightonlyroma');
		
		$this->load->model('Social_stream_model');
		
		foreach($tags_search_data->data as $key => $item){
		  $this->Social_stream_model->insert($item);
		}
    // 
    // $this->_data['ig'] = $tags_search_data;
    // $this->view->set('_uni_title', 'FALSE')->render($this->_data);
  }
  
  
}
// End of About class

/* End of file about.php */
/* Location: ./application/controllers/about.php */