<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller  //extend MY_Auth_Controller from CI_controller in core
{ 

  public function __construct() 
  {
    parent::__construct();
    $this->load->model('User_model', 'model');
    $this->load->library('bcrypt');
  
  }

    // public function index() 
    // {

    //   $this->create();
    // }

  public function index() {

    $phone = $this->input->post('phone');
    $password = $this->input->post('pass');

    if(!empty($phone) && !empty($password)) { 
  
      $hash = $this->bcrypt->hash_password($password);

      $value = array('phone'=> $phone,'auth_key' => $hash);
     
      $data['result'] = $this->model->insertUser($value);

      if($data['result'])
      {

      echo '1';exit;

      }
      else{

      echo '2';exit;
      }

    }
    else{

      return false;
    }
      
  }

//     public function put_otp() {

// echo "ss";exit;

//           // $mobile =$this->input->post('phone');

//           // $result = $this->model->checkPhoneExist($mobile);

//           // if(!empty($result)) {

          

//           //   $rndno1=rand(10, 99);
//           //   $rndno2=rand(88, 10);
//           //   $key_word = urlencode($rndno1.$rndno2);
//           //   $date = date_default_timezone_set('Asia/Kolkata');

//           //   $create_at = date("Y-m-d H:i:s");

//           //   $time = date("Y-m-d H:i:s",strtotime("+3 minute"));

//           //   $value=array('key_word'=>$key_word,'mobile'=> $mobile,'create_at'=>$create_at,'date_exp'=>$time);

//           //   $insert = $this->model->insertKey($value,$mobile,$key_word,$time);
            
//           //   if($insert) //check if the user data inserted
//           //   {

//           //     // $data = http_build_query(array(
//           //     // 'username' => 'ONLISTER',
//           //     // 'api_password' => '04ec1q00ke6rt7n4b',
//           //     // 'sender' => 'ONLSTR',
//           //     // 'to' => $mobile,
//           //     // 'message' => "BATHTEK OTP Number is: ".$key_word.". Don't share this with anyone",
//           //     // 'priority'=>'4'
//           //     // ));

//           //     // $context = array();

//           //     // // Create HTTP stream context
//           //     // $context = stream_context_create(array(
//           //     // 'http' => array(
//           //     //     'method' => 'POST',
//           //     //     'header' => 'Content-Type: application/x-www-form-urlencoded',
//           //     //     'content' => $data
//           //     // )
//           //     // ));

//           //     //      //Make POST request
//           //     //     $response = file_get_contents('http://sms.getlead.co.uk/pushsms.php', false, $context);

//           //     //  if($response)
//           //      // {
//           //       echo "1";

//           //     }

//           //     else{
//           //       return false;
//           //     }


//           //     // }else{
//           //     //   //set the response and exit
//           //     //   $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
//           //     // }
//           //     // }else{
//           //     // //set the response and exit
//           //     // //BAD_REQUEST (400) being the HTTP response code
//           //     //     return false;
//           //     // }
//           // }
//           // else{
//           //   return false;
//           // }

      

      
//   }

//     // delete with modal popup
//     public function delete() 
//     {
//       $this->load->view('user/delete');
//       if (isset($_POST['delete'])) 
//         {
//           $id = $this->input->post('id');
//           $this->model->delete($id);
//           $this->session->set_flashdata('delete', 'Deleted Successfully');
//           redirect('User');
//         }
//     }

//     public function edit() 
//     {
//       $id = $this->uri->segment(3);
//       $data['profile']=$this->model->getProfile($id);
//       $this->load->view('user/edit', $data);     
//     }

  
//     public function changepassword() 
//     {
//         $this->load->view('user/change_password');
//     }

//   //update password function
//     public function updatepassword() 
//     {
//         $currentPassword = $this->input->post('currentPassword');
//         $newPassword = $this->input->post('newPassword');
//         $hash = $this->bcrypt->hash_password($newPassword);
//         $confirmPassword = $this->input->post('confirmPassword');
//         $this->form_validation->set_rules('currentPassword', 'Current Password', 'trim|required|callback_currentPasswordCheck');
//         $this->form_validation->set_rules('newPassword', 'New Password', 'required|trim');
//         $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|trim|matches[newPassword]');
//       if ($this->form_validation->run() == FALSE) 
//       {
//         $this->changepassword();
//       } else {
//         $this->model->changePasswordDet($hash, $this->userDetails->id);
//         $this->session->set_flashdata('changepwd', 'Password Changed Successfully !');
//         redirect('User/changePassword');
//       }
//     }

//     //password check either correct or not from callback_currentPasswordCheck
//     public function currentPasswordCheck($currentPassword) 
//     {

//       if (!$this->bcrypt->check_password($currentPassword, $this->userDetails->password) )
//       {
//         $this->form_validation->set_message('currentPasswordCheck', 'The current password field is wrong');
//         return false;
//       } else {
//         return true;
//       }
//     }

//     #uniqueness of username
//     function exists_email($str)
//     {
//         $value=$this->model->key_exists($str);
//       if ($value)
//       {
//         return TRUE;
//       }
//       else
//       {
//         $this->form_validation->set_message('exists_email', 'Email already exists!... Please choose another one');
//         return FALSE;
//       }
//     }


}
 ?>