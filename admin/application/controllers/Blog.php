<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Auth_Controller {

    protected $ci_name;//declare ci_name varriabe current controler name as image folder name to upload image

    public function __construct() 
    {
        parent::__construct();
        $this->ci_name = strtolower($this->router->fetch_class());
        $this->load->model('Blog_model','model');
        $this->load->library('Image');//custom image library to crop
        if (!$this->is_logged_in()) //login only registered user from db
        { 
          redirect('Login');
        }
    }
  
    public function index() {

        $this->load->view('blog/list');

    }


    public function list() {

        $list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rows) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $rows['name'];
        $row[] = '<img src="'.CUSTOM_BASE_URL.'uploads/blog/crop/'.$rows['image'].'" class="img-responsive" height=60 width=80 /></a>';
          
        //add html for action
        $row[] = '<a href="blog/edit/'.$rows['id'].'" class="btn  btn-warning" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
        <a data-toggle="modal" data-id='.$rows['id'].' data-target="#del-modal" class="btn  btn-danger" href="#"><i class="fa  fa-trash-o" aria-hidden="true"></i></a>';

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

        $this->form_validation->set_rules('name', ' Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        if (empty($_FILES['image_file']['name']))
        {
            $this->form_validation->set_rules('image_file', 'Image', 'required');
        }


        if($this->form_validation->run() == FALSE) 
        {
            $data['category'] = $this->model->getCartCat();
            $this->load->view('blog/add',$data);
        }
        else 
        {

            $this->image->imageCropAdd();//call custom image library

            $image= $this->image->crop_image_name;

            $name = $this->input->post('name');
            $cat_id = $this->input->post('cat_id');

            $description = $this->input->post('description');
           
            $meta_title = $this->input->post('meta_title');
            $meta_descrip = $this->input->post('meta_descrip');
            $meta_key = $this->input->post('meta_key');
            $seo_name = $this->input->post('seo_name');


            $value = array('cat_id' => $cat_id,'name' => $name,'description' => $description,'image' => $image,'meta_title' => $meta_title,'meta_descr' => $meta_descrip,'meta_key' =>$meta_key,'seo_name' => $seo_name);

            $data['result'] = $this->model->insertBlogData($value);
            $this->session->set_flashdata('add', 'Added Successfully');

            redirect('blog');
        }

    }

    public function edit() {

        $id = $this->uri->segment(3);
        $data['category'] = $this->model->getCartCat();
        $data['result'] = $this->model->getBlogData($id);
        $this->load->view('blog/edit',$data);
    }

    public function update() {

        
       // $this->form_validation->set_rules('cat_name', 'Name', 'trim|required|xss_clean');
       // $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');

        

        // if (isset($_POST['submit'])) 
        // {
            $id = $this->input->post('id');

            // if($this->form_validation->run() == FALSE) 
            // {
            //     $data['category'] = $this->model->getCartCat();
            //     $data['result'] = $this->model->getCartParentEdit($id);
            //      $this->load->view('category/edit',$data);
            // }
            // else 
            // {
                $name = $this->input->post('name');
                $cat_id = $this->input->post('cat_id');
                $description = $this->input->post('description');

                $meta_title = $this->input->post('meta_title');
                $meta_descrip = $this->input->post('meta_descrip');
                $meta_key = $this->input->post('meta_key');
                $seo_name = $this->input->post('seo_name');

                $this->image->imageCropAdd();//call custom image library

                if($this->image->crop_image_name !="")//if there is image and pdf is null
                {
                    $image =  $this->image->crop_image_name;

                    
                    $value = array('cat_id' => $cat_id,'name' => $name,'description' => $description,'image' => $image,'meta_title' => $meta_title,'meta_descr' => $meta_descrip,'meta_key' =>$meta_key,'seo_name' => $seo_name);

                } 
                else{

                    $value = array('cat_id' => $cat_id,'name' => $name,'description' => $description,'meta_title' => $meta_title,'meta_descr' => $meta_descrip,'meta_key' =>$meta_key,'seo_name' => $seo_name);

                }
                
                $this->model->updateCategory($id,$value);

                $this->session->set_flashdata('update', 'Added Successfully');
                redirect('blog');
           // } 

        //}
    }


    public function delete() {

        $this->load->view('blog/delete');
        if (isset($_POST['delete'])) 
        {
            $id=$_POST['id'];
            $this->model->deleteBlog($id);
            redirect('blog');
        }
    }


}
