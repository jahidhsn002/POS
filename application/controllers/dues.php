<?php 

require_once ("secure_area.php");

class dues extends Secure_area 
{
	function __construct()
	{
		parent::__construct();
	}
	
	function payment(){
		$this->load->model('due');
		$data['query'] = $this->due->get_total_rows('supplier');
		$this->load->view("due/payment",$data);
	}
	
	function collection(){
		$this->load->model('due');
		$data['query'] = $this->due->get_total_rows('customer');
		$this->load->view("due/collection",$data);
	}
	
}

?>