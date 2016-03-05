<?php 

class due extends CI_Model {
	
	//public $due_id;
    public $Type;
    public $person_id;
	public $due_amount;
	public $paid_amount;
	
	public function __construct(){
        parent::__construct();
    }
	
	public function get_total_rows($argument){
		$this->db->from('due');
		$this->db->where('Type',$argument);
		return $this->db->get();
	}
	
	public function insert($data){
		$this->Type = $data['type'];
		$this->person_id = $data['person_id'];
		$this->due_amount = $data['due_ammount'];
		$this->paid_amount = $data['paid_ammount'];
		$this->db->insert('due', $this);
		//return $this->db->get('due');
	}
	
	public function update($data){
		$this->Type = $data['type'];
		$this->person_id = $data['person_id'];
		$this->due_amount = $data['due_ammount'];
		$this->paid_amount = $data['paid_ammount'];
		$this->db->update('due', $this, array('person_id' => $this->person_id, 'Type'=>$this->Type));
		//return $this->db->get('due');
	}
	
	public function check($val,$type){
		$querys = $this->db->get('due');
		//print_r($querys->result());
		foreach($querys->result() as $query){
			if($query->person_id == $val && $query->Type == $type ){
				$return = array($query->paid_amount,$query->due_amount);
				return $return;
			}
		}
		return false;
	}
	
	
	
	
	
	
	
	
	
	
}