<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_bottom extends MY_Auth_Controller {

	protected $ci_name;//declare ci_name varriabe current controler name as image folder name to upload image

    public function __construct() 
    {
	    parent::__construct();
	    $this->ci_name = strtolower($this->router->fetch_class());
	    $this->load->model('Banner_bottom_model','model');
	    $this->load->library('Image');//custom image library to crop
	     
	    if (!$this->is_logged_in()) //login only registered user from db
	    { 
	      redirect('Login');
	    }
    }
  
    public function index() {

    	$this->load->view('botbanner/list');
    }

    public function bannerlist() {

        $list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $banner) {

	        $no++;

	        $row = array();

	        $row[] = $no;
	        $row[] = $banner['banner_name'];
	        $row[] = '<img src="'.CUSTOM_BASE_URL.'uploads/banner_bottom/'.$banner['image'].'" class="img-responsive" height=60 width=80 /></a>';
	          
	        //add html for action
	        $row[] = '<a href="banner_bottom/edit/'.$banner['id'].'" class="btn  btn-warning" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
	        <a data-toggle="modal" data-id='.$banner['id'].' data-target="#delModal" class="btn  btn-danger" href="#"><i class="fa  fa-trash-o" aria-hidden="true"></i></a>';

	        $data[] = $row;
        }

        $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->model->count_all(),
        "recordsFiltered" => $this->model->count_filtered(),
        "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function create() {

	    $this->form_validation->set_rules('banner_name', 'Banner Name', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('exp_date', 'exp Date', 'trim|required|xss_clean');

	    if(empty($_FILES['image_file']['name']))
        {
	        $this->form_validation->set_rules('image_file', 'image','trim|required|xss_clean');
        }

	    if($this->form_validation->run() == FALSE) 
	    {
		    $this->load->view('botbanner/add');
	    }
	    else 
	    {


		    $banner_name = $this->input->post('banner_name');

		    $exp_date = $this->input->post('exp_date');

		    $date =  date('Y-m-d h:m:s', strtotime($exp_date));
	          	
	    	$this->image->generalCropAdd();//call custom image library

            $image_name= $this->image->image_name;	       


	        $value = array('banner_name' => $banner_name,'exp_date' => $date,'date'=> date("Y-m-d H:i:s"),'image' => $image_name);
		    
		
			$data['result'] = $this->model->insertForBanner($value);
			$this->session->set_flashdata('add', 'Added Successfully');
			redirect('Banner_bottom');

	    }
	}

	public function edit() {

	 	$id = $this->uri->segment(3);
	 	$data['result'] = $this->model->getBanner($id);
    	$this->load->view('botbanner/edit',$data);
    }

    public function update() {

		$this->form_validation->set_rules('banner_name', 'Banner Name', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('exp_date', 'exp Date', 'trim|required|xss_clean');

	    $id = $this->input->post('id');

		if (isset($_POST['submit'])) 
		{

			if($this->form_validation->run() == FALSE) 
		    {
			    $data['result'] = $this->model->getBanner($id);
			    $this->load->view('banner/edit',$data);
		    }
			else 
			{
			    $banner_name = $this->input->post('banner_name');
			    $exp_date = $this->input->post('exp_date');
			    $date =  date('Y-m-d h:m:s', strtotime($exp_date));

                $this->image->generalCropAdd();//call custom image library

                if(isset($this->image->image_name)) {

                    $image_name= $this->image->image_name;

                }

		    	if($image_name !="")
		    	{

					$value = array('banner_name' => $banner_name,'exp_date' => $date,'date'=> date("Y-m-d H:i:s"),'image' => $image_name);
		    	}		   

		    	else
		    	{
			    	 $value = array('banner_name' => $banner_name,'exp_date' => $date,'date'=> date("Y-m-d H:i:s"));
		    	}


				$data['result'] = $this->model->updateBanner($id,$value);

				$this->session->set_flashdata('update', 'Added Successfully');
				redirect('Banner_bottom');
			} 

		}
	}

	public function delete(){

	    $this->load->view('botbanner/delete');
	    if (isset($_POST['delete'])) 
	    {
		    $id=$_POST['rowid'];
		    //$name=$_POST['name'];
			$this->model->deleteBanner($id);
	        redirect('Banner_bottom');
	    }
	}

}