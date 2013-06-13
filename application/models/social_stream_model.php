<?php
class Social_stream_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function count_social_rows(){
	  return $this->db->count_all("content");
	}
	
	public function get_all($limit,$start){
	  $this->db->limit($limit, $start);
	  $this->db->order_by("unixdate", "desc");
	  $query = $this->db->get('content');
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
  	       "content" => auto_link($row['body'],'url',TRUE),
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
   
   $b = array(
     "lid"=> $row['id'],
     "type"=> "custom",
     "username"=> "",
     "content" => "Thanks for sharing in the excitement of the Giorgio Armani One Night Only in Roma event. Share your stories, mention @armani and keep tagging:",
     "unixdate"=> time()+1209600
    );
    
    $this->db->insert('content', $b );
	  
	  echo 'Merged feeds!'.PHP_EOL;
		//return $all;
	  
	}
	
	public function insert($data = FALSE)
  {
	  $this->load->library('curl');
  	// Create insert array for registration record
		$insert_array = array(
			'ig_id'         => $data->id,
			'username'       => $data->user->username,
			'photourl'      => $data->images->standard_resolution->url,
			'capture'      => serialize($data),
			'date'      => $data->created_time
		);

		// Insert record
		$this->curl->simple_get($data->images->standard_resolution->url);
    $tot = count($this->curl->info);
    
		if(!$this->match($data->id)){
		  if($tot < 1){
		    $insert_array['deleted'] = 1;
		  }
		    $this->db->insert('instagram', $insert_array );
		    echo 'Saved a photo!'.PHP_EOL;
		}

  }
  
  public function match($id = false){
     $this->db->where('ig_id',$id);
 		$query=$this->db->get('instagram',1,0);

 		if($query->num_rows()>0)
 		{
 			return true;
 		}else{
       return false;
     }
   }
  
}