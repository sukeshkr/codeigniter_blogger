<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

    protected $CI;

    public function __construct() {
        parent::__construct();

        $this->CI =& get_instance();
        $this->load->model('Main_Model', 'model');
        $this->load->helper(array('form', 'url')); 
        $this->load->library('upload');
        $this->load->library('session');

        if(!empty($this->userDetails)){ 

            $this->user_id = $this->userDetails->id;
        }
        else{

            $this->user_id = "";
        }
    }
   
    public function home() { 
        
        $data['banner'] = $this->model->getMainBanner();

        $data['main_category'] = $this->model->getMainCategorys();

        $data['bottom'] = $this->model->getLongBanner();

        $this->load->view('home',$data);
    }

    public function single_blog() 
    {
      
        // //$data['cat_list'] = $this->model->getSubCategoryData();
        
        // $data['main_category'] = $this->model->getMainCategorys();

        // $data['cart_count'] = $this->model->getCartCount($this->user_id);

        // $data['list'] = $this->model->getOfferCategory();

	    $this->load->view('single-blog');
    }

    public function contact() 
    {
      
        // //$data['cat_list'] = $this->model->getSubCategoryData();
        
        // $data['main_category'] = $this->model->getMainCategorys();

        // $data['cart_count'] = $this->model->getCartCount($this->user_id);

        // $data['list'] = $this->model->getOfferCategory();

        $this->load->view('contact');
    }

    public function blog_details() 
    {

        // //$data['cat_list'] = $this->model->getSubCategoryData();
        
        // $data['main_category'] = $this->model->getMainCategorys();

        // $data['cart_count'] = $this->model->getCartCount($this->user_id);
        // $data['list'] = $this->model->getOfferCategory();
        $this->load->view('single-blog');
        
    }
 
    public function error404() {

        // //$data['cat_list'] = $this->model->getSubCategoryData();
        
        // $data['main_category'] = $this->model->getMainCategorys();

        // $data['cart_count'] = $this->model->getCartCount($this->user_id);
        // $data['list'] = $this->model->getOfferCategory();
	    $this->load->view('error-404');
    }

    public function cateogry() {

        $data['main_category'] = $this->model->getMainCategorys();
        $data['cart_count'] = $this->model->getCartCount($this->user_id);
        
        $data['list'] = $this->model->getOfferCategory();
        
        $data['store_list'] = $this->model->getStoreData();
        
        $this->load->view('cateogry',$data);
        
    }
    


    public function offers() {

        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();

        $data['cart_count'] = $this->model->getCartCount($this->user_id);

        $data['list'] = $this->model->getOfferCategory();

        $data['result'] = $this->model->getOfferData();
        
        if(!empty($this->user_id)){ 

            $data['item'] = $this->model->getRecentlyVisitData($this->user_id);

            $data['title'] = "Recently Viewed";
        }
        else{

            $data['item'] = $this->model->getTopSellingData();

            $data['title'] = "Recommended Items";

        }

        $this->load->view('offers',$data);
        
    }
    
    public function offer_details() {
        
        $encrypted_id = $this->uri->segment(2);

        $decrypted_id = base64_decode($encrypted_id);

        $id = preg_replace(sprintf('/%s/', SALT_KEY.CKRAT_KEY), '', $decrypted_id);

        $data['main_category'] = $this->model->getMainCategorys();
        $data['cart_count'] = $this->model->getCartCount($this->user_id);
        $data['list'] = $this->model->getOfferCategory();
        
        $data['offer'] = $this->model->getOfferDetailsData($id);

        $data['result'] = $this->model->getOtherOfferData($id);

        $this->load->view('offer-details',$data);
        
    }

    public function offers_category() {

        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();

        $data['cart_count'] = $this->model->getCartCount($this->user_id);

        $encrypted_id = $this->uri->segment(2);

        $decrypted_id = base64_decode($encrypted_id);

        $cat_id = preg_replace(sprintf('/%s/', SALT_KEY.CKRAT_KEY), '', $decrypted_id);

        $data['list'] = $this->model->getOfferCategory();

        $data['result'] = $this->model->getOfferData($cat_id);

        $this->load->view('offers',$data);
        
    }

    

    //  public function product_list() {

    //     $min_price = "";
    //     $max_price = "";
    //     $search = "";
    //     $feature='';
    //     $option='';

    //     $cat_id = $this->uri->segment(2);

    //     $data['cart_count'] = $this->model->getCartCount($this->user_id);

    //     $data['list'] = $this->model->getOfferCategory();

    //     $data['cat_list'] = $this->model->getSubCategoryData();

    //     $data['result'] = $this->model->getAllProductCategoryWise($cat_id,$min_price,$max_price,$search,$feature,$option);

    //     $data['category'] = $this->model->getProductFilterCategoryList($cat_id,$min_price,$max_price,$search);

    //     $data['price_range'] = $this->model->getProductFilterPriceList($cat_id,$min_price,$max_price,$search);

    //     $data['feature'] = $this->model->getProductFeatureList($cat_id,$min_price,$max_price,$search);

    //     $data['option'] = $this->model->getProductOptionList($cat_id,$min_price,$max_price,$search);

    //     $this->load->view('product-list',$data);
    // }

    //   public function filter_list() {

    //     $min_price = "";
    //     $max_price = "";
    //     $search = "";

    //     if(!empty($_POST['feature'])) {

    //         $feature_chk = array();

    //         $feature_chk = $_POST['feature'];
            
    //     }

    //     else{

    //         $feature_chk = "";

    //     }

    //     if(!empty($_POST['chk_option'])) {

    //         $option_chk = array();

    //         $option_chk = $_POST['chk_option'];
            
    //     }

    //     else{

    //         $option_chk = "";

    //     }

    //     $data['feature_chks'] = $feature_chk;

    //     $data['option_chks'] = $option_chk;
         
    //     $cat_id = "";

    //     $data['cart_count'] = $this->model->getCartCount($this->user_id);

    //     $data['list'] = $this->model->getOfferCategory();

    //     $data['cat_list'] = $this->model->getSubCategoryData();

    //     $data['result'] = $this->model->getAllProductCategoryWise($cat_id,$min_price,$max_price,$search,$feature_chk,$option_chk);

    //     $data['category'] = $this->model->getProductFilterCategoryList($cat_id,$min_price,$max_price,$search);

    //     $data['price_range'] = $this->model->getProductFilterPriceList($cat_id,$min_price,$max_price,$search);

    //     $data['feature'] = $this->model->getProductFeatureList($cat_id,$min_price,$max_price,$search);

    //     $data['option'] = $this->model->getProductOptionList($cat_id,$min_price,$max_price,$search);

    //     $this->load->view('product-list',$data);
    // }

    public function search() {

        $search = trim($this->input->post('search'));

        $search = strtolower($search);

        $data['category_id'] = "";

        $min_price = "";
        $max_price = "";

        $cat_id = "";

        $data['cart_count'] = $this->model->getCartCount($this->user_id);

        $data['list'] = $this->model->getOfferCategory();

        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();
        
        $data['result'] = $this->model->getAllProductCategoryWise($cat_id,$min_price,$max_price,$search);

        $data['category'] = $this->model->getProductFilterCategoryList($cat_id,$min_price,$max_price,$search);

        $data['price_range'] = $this->model->getProductFilterPriceList($cat_id,$min_price,$max_price,$search);

        $data['feature'] = $this->model->getProductFeatureList($cat_id,$min_price,$max_price,$search);

        $data['option'] = $this->model->getProductOptionList($cat_id,$min_price,$max_price,$search);
 
        $this->load->view('product-list',$data);

    }

    public function list_item() {

        $search = trim($_POST['search']);

        $search = strtolower($search);

        $result = $this->model->getSearchKeyword($search);

        echo '<ul class="search-drop-ab">';

            foreach ($result as $rs) { ?>

                <li onclick='fill("<?php echo $rs['cat_name']; ?>")'><a><?php echo $rs['cat_name']; ?></a></li>
                <li  onclick='fill("<?php echo $rs['product_name']; ?>")'><a><?php echo $rs['product_name']; ?></a></li>
                <li  onclick='fill("<?php echo $rs['stock_name']; ?>")'><a><?php echo $rs['stock_name']; ?></a></li>
                
            <?php } 

            echo '</ul>';

    }

    public function product_details() {

        $encrypted_id = $this->uri->segment(2);

        $decrypted_id = base64_decode($encrypted_id);

        $id = preg_replace(sprintf('/%s/', SALT_KEY.CKRAT_KEY), '', $decrypted_id);

        $data['cart_count'] = $this->model->getCartCount($this->user_id);
        
        $data['wish_list'] = $this->model->getWishList($this->user_id,$id);

        $data['list'] = $this->model->getOfferCategory();

        //$data['cat_list'] = $this->model->getSubCategoryData();
        
        $data['main_category'] = $this->model->getMainCategorys();

        $data['result'] = $this->model->getProductDetailsById($id);

        $data['rating'] = $this->model->getProductRating($id);

        $data['rating_avg'] = $this->model->getProductRatingRateAvg($id);

        if($data['result']) {

            $cat_id = $data['result'][0]['cat_id'];
        }
        else{

            $cat_id = '';
        }

        $data['similar_item'] = $this->model->getProductSimilar($cat_id);
        $data['ratingeach1'] = $this->model->getProductRatingEach($id,1);
        $data['ratingeach2'] = $this->model->getProductRatingEach($id,2);
        $data['ratingeach3'] = $this->model->getProductRatingEach($id,3);
        $data['ratingeach4'] = $this->model->getProductRatingEach($id,4);
        $data['ratingeach5'] = $this->model->getProductRatingEach($id,5);
        
        if(!empty($this->user_id)) { 

            $this->model->putProductRecentlyView($this->user_id,$id);

        }

        $this->load->view('product-details',$data);
    }
    
    public function subscribe_create() {

        if(!empty($_POST['email'])) { 

            $email = trim($_POST['email']);

            $result = $this->model->putSubscriber($email);

            echo '1';
        }
        else{

            echo '2';
        }
    }
    
    public function get_sub_category() { //Ajax calling

        $cat_id = $_POST['rowid'];

        $cat_list = $this->model->getAllCategorys($cat_id);
        

        foreach ($cat_list as $catLists) { 
                     
            $catmackratt = base64_encode($catLists['cat_id'] .SALT_KEY.CKRAT_KEY);

                 $res.= '
                 
                  
                     
                        <li><a href="'.CUSTOM_BASE_URL. 'product-list/'.$catmackratt.'">'.$catLists['cat_name'].'</a></li>
                   
                      
                  
               ';
        } 
        
        echo $res;

    }
    
    public function store_list() {

        $data['main_category'] = $this->model->getMainCategorys();
        $data['cart_count'] = $this->model->getCartCount($this->user_id);
        
        $data['list'] = $this->model->getOfferCategory();
        
        $data['store_list'] = $this->model->getStoreData();
        
        $this->load->view('store',$data);
        
    }
    
    public function store_details() {
        
        $encrypted_id = $this->uri->segment(2);

        $decrypted_id = base64_decode($encrypted_id);

        $id = preg_replace(sprintf('/%s/', SALT_KEY.CKRAT_KEY), '', $decrypted_id);
        
        $data['main_category'] = $this->model->getMainCategorys();
        $data['cart_count'] = $this->model->getCartCount($this->user_id);
        
        $data['list'] = $this->model->getOfferCategory();
        
        $data['store_list'] = $this->model->getStoreData($id);
        
        $this->load->view('store-details',$data);
        
    }
    
    public function email() 
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $place=$_POST['place'];
        $msg=$_POST['message'];
        $from = '<noreply@onlister.com>';
        $to = 'sukeshkoodathai@gmail.com';

        $config = Array(
        'protocol' => 'sendmail',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1'
        );

        $this->load->library('email',$config);
        $this->email->from($from, $name);
        $this->email->to($to);
        $this->email->subject("Contact Enquiry from - " . $name);
        $this->email->set_mailtype("html");

        $email_body = "<table style='width:700px;border:0px #e5e5e5 solid;background:#eeeeee;color:#000000;padding:10px; font-family:Tahoma, Geneva, sans-serif;'><tbody><tr><td style='width:120px;padding-left:3px;border:1px #f4981e solid;background:#f4981e;color:#FFFFFF;'><strong>Name:</strong></td><td style='border:1px #FFFFFF solid; padding:5px;background:#FFFFFF;color:#000000;'>" . $name . "</td></tr><tr><td style='width:120px;padding-left:3px;border:1px #f4981e solid;background:#f4981e;color:#FFFFFF;'><strong>Email:</strong></td><td style='border:1px #FFFFFF solid; padding:5px;background:#FFFFFF;color:#000000;'>" . $email . "</td></tr><tr><td style='width:120px;padding-left:3px;border:1px #f4981e solid;background:#f4981e;color:#FFFFFF;'><strong>Mobile: </strong></td><td style='border:1px #FFFFFF solid; padding:5px;background:#FFFFFF;color:#000000;'>" . $phone . "</td></tr><tr><td style='width:120px;padding-left:3px;border:1px #f4981e solid;background:#f4981e;color:#FFFFFF;'><strong>Message:</strong></td><td style='border:1px #FFFFFF solid; padding:5px;background:#FFFFFF;color:#000000;'>" . $msg . "</td> </tr></tbody></table>";
        
        $body = str_replace("\n", "<br/>", $email_body);
        
        $this->email->message($body);

        if ($this->email->send()) 
        {
            echo 'Thank you';
        }   
        else 
        {
            echo 'Error in sending Email';
        }
    }


}
