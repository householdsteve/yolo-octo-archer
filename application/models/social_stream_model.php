<?php
class Social_stream_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_all($ct){
	  $this->db->order_by("unixdate", "desc");
	  $query = $this->db->get('content',$ct, 0);
	  if($query->result_array()){
	    return $query->result_array();
    }else{
      return array('error'=>true);
    }
	}
	
	public function merge_feeds(){
	  $this->db->empty_table('content');
	  
	  $all = array();
	  
	  $twitter = $this->db->get('tweets');
	  if($twitter->result_array()){
	    foreach($twitter->result_array() as $row){
	      if($row['deleted'] == 0 && !preg_match("/\brt\b/i", $row['body'])){
	        $data = unserialize($row['capture']);
  	      $d = array(
  	       "lid"=> $row['id'],
  	       "type"=> "twitter",
  	       "username"=> $data['from_user'],
  	       "content" => $row['body'],
  	       "unixdate"=> strtotime($row['date'])
  	      );
  	      $all[] = $d;
  	      $this->db->insert('content', $d );
        }
	    }
	  }
	  
	  $ig = $this->db->get('instagram');
   if($ig->result_array()){
     foreach($ig->result_array() as $row){
       if($row['deleted'] == 0){
         $d = array(
          "lid"=> $row['id'],
          "type"=> "instagram",
          "username"=> $row['username'],
          "content" => $row['photourl'],
          "unixdate"=> $row['date']
         );
         $all[] = $d;
  	     $this->db->insert('content', $d );
      }
     }
   }
	  
	  
		return $all;
	  
	}
	
	public function insert($data = FALSE)
  {
  	// Create insert array for registration record
		$insert_array = array(
			'ig_id'         => $data->id,
			'username'       => $data->user->username,
			'photourl'      => $data->images->standard_resolution->url,
			'capture'      => serialize($data),
			'date'      => $data->created_time
		);

		// Insert record
		$this->db->insert('instagram', $insert_array );

  }
  
}