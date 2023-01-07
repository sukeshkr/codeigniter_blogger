<?php

class User_model extends MY_Model  //extend MY_model from CI_model in core
{
    var $table = 'user_registration';

    public function __construct() 
    {
    	parent::__construct();
    }

    public function getProfile($id='') //get all data from user table
    {

    $session_data=$this->session->userdata('userDetails');
    $username=$session_data->username;
                            
        $this->db->from($this->table);
      if ($id != '')
        $this->db->where('id', $id);
        $this->db->where('status',1);
        $this->db->where("username !=",$username);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        return $query->result_array();

    }

    public function insertUser($value)  //add new user
    {
        $this->db->select('user_registration.id');//select each seller
        $this->db->where('user_registration.phone',$value['phone']);//select each seller
        $query = $this->db->get($this->table);

        if ($query->num_rows() < 1) {

            $this->db->insert('user_registration', $value);

            $insert_id = $this->db->insert_id();

            return $insert_id;
        }
        else{

            return FALSE;

        }  

    }
 
    public function changePasswordDet($password, $userId) //change password
    {
    	$data = array('password' => $password);
    	$this->db->where('id', $userId);
    	$this->db->update($this->table, $data);
    }

  
    public function delete($id) //delete table(update status to '0')
    {
    	$this->db->where('id',$id);
    	$this->db->update($this->table,array('status' => 0));
        return true;
    }

    function key_exists($key) //chech whether email already exist in user table 
    {
        $this->db->where('email',$key);
        $query = $this->db->get($this->table);
    
      if ($query->num_rows() == 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }


    public function checkOtpExist($phone='',$otp='') //chech whether email already exist in user table 
    {
        $this->db->where('mobile',$num);
        $this->db->where('key_word',$otp);
        $query = $this->db->get('otp_table');

        if ($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function checkPhoneExist($num) //chech whether email already exist in user table 
    {
        $this->db->where('phone',$num);
        $query = $this->db->get($this->table);

        if ($query->num_rows() == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function insertKey($value,$mobile,$key_word,$time) { 

        $this->db->where('mobile',$mobile);
        $query = $this->db->get('otp_table');

        $update_val=array('key_word'=> $key_word,'date_exp'=>$time,'create_at'=>date("Y-m-d H:i:s"));

        if($query->num_rows()  > 0 )
        {
            $this->db->where('mobile',$mobile);
            $this->db->update('otp_table',$update_val);
            return true;
        }

       else{

         $this->db->insert('otp_table', $value);
          return true;
       }

    }


}

?>
