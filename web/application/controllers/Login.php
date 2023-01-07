<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Login extends MY_Controller {

    public function __construct() 
    {
	    parent::__construct();

        $this->load->model('Main_Model','model');
	   
    }
  
    public function index() {

        if(!empty($this->userDetails->id)) {

            redirect();
        }
        else{

            //$data['cat_list'] = $this->model->getSubCategoryData();
            
            $data['main_category'] = $this->model->getMainCategorys();

            $data['list'] = $this->model->getOfferCategory();

            $this->load->view('my-login',$data);

        }
    	
    }

}

?>
