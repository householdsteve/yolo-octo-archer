<?php
class Social_stream_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
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