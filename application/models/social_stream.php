<?php
class Social_stream_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function matcher($id = false){
     $this->db->where('ig_id',$id);
 		$query=$this->db->get('instagram',1,0);

 		return $query;
 		log_message('info', $query);

 		if($query->num_rows()>0)
 		{
 			return true;
 		}else{
       return false;
     }
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
		if(!$this->matcher($data->id)){
		 $this->db->insert('instagram', $insert_array ); 
		}

  }
  
}