<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_login extends MY_Controller {

  protected $ci_name;//declare ci_name varriabe current controler name as image folder name to upload image

  public function __construct() 
  {
    parent::__construct();
    $this->ci_name = strtolower($this->router->fetch_class());
    $this->load->library('bcrypt');
    $this->load->model('User_login_model','model');
	   
  }
  
  public function index() {

    $mobile=$_POST['mobile'];

    $result = $this->model->checkUserExist($mobile);

    if(!empty($result)) {

      $rndno1=rand(10, 99);
      $rndno2=rand(88, 10);
      $key_word = urlencode($rndno1.$rndno2);
      $date = date_default_timezone_set('Asia/Kolkata');

      $create_at = date("Y-m-d H:i:s");

      $time = date("Y-m-d H:i:s",strtotime("+3 minute"));

      $value=array('key_word'=>$key_word,'mobile'=> $mobile,'create_at'=>$create_at,'date_exp'=>$time);

      $insert = $this->model->insertKey($value,$mobile,$key_word,$time);

      echo "1";

    }
    else{
       echo "0";
    }

  }

  public function check_otp() {

    $mobile=$_POST['mobile'];

    $otp=$_POST['otp'];

    $result = $this->model->checkOtpNumber($mobile,$otp);

    if(!empty($result)) {

      $res = $this->model->loginWithCredentials($mobile);

      $this->session->set_userdata('userRegister', $res);

      echo "1";

    }
    else{
       echo "0";
    }

  }

    public function login_password() {

        $mobile   = $_POST['mobile_number'];
    
        $password = $_POST['password'];
    
        if(!empty($mobile) && !empty($password) ) { 
    
          $hash = $this->bcrypt->hash_password($password);
    
          $res = $this->model->loginWithCredentials($mobile);
    
          if(!empty($res)) { 
    
            $db_password=$res->auth_key;
    
            $db_phone=$res->phone;
    
            if (($this->bcrypt->check_password($password, $db_password)) && ($mobile==$db_phone)) {
    
              $this->session->set_userdata('userDetails', $res);
    
              $session_data=$this->session->userdata('userDetails');
    
              echo "1";exit;
    
            }
    
            else
            {
             echo "3";exit;
    
            }
    
          }
          else{
    
            echo "2";exit;
    
          }
        }
        else{
    
          return false;
    
        }

  }

  public function logout()  //logout
  { 
    $this->session->sess_destroy();

    redirect(CUSTOM_BASE_URL);

  }
   

}

?>
