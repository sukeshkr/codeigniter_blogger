<?php



class Auth_model extends MY_Model //extend MY_model from CI_model in core

{

	var $table = 'user_registration';



	public function __construct() // Call the CI_Model constructor

	{

	    parent::__construct();

    }


	public function loginWithCredentials($phone) //check email id and password are equal with DB email id and password.
	{

	    $this->db->select('id,phone,password,dealer_status');

	    $this->db->from($this->table);
	    $this->db->where('phone', $phone);
	    $this->db->where('status',1);

	    $query = $this->db->get();

	    return $query->row();

	}



}