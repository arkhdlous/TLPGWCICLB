<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class project_model extends CI_Model {

	function __construct()  
	{  
        //call model constructor  
		parent::__construct();  
    }    

    public function record_count(){
    	return $this->db->count_all('m_project');
    }

	function selectData(){
		$query = $this->db->get('m_project');
		return $query->result();
	}

	public function fetch_project($limit, $start){
		$this->db->limit($limit, $start);

		$query = $this->db->get('m_project');

		if ($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

}

/* End of file  */
/* Location: ./application/models/ */