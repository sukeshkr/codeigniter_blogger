<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image {

       protected $CI;

    function __construct() {

        if (!is_dir('uploads')) {

            mkdir('uploads', 0755, TRUE);
        }

        $this->CI =& get_instance();
    }

    function generalCropAdd()
    {

        $ci_name=strtolower($this->CI->router->fetch_class());

        if (!is_dir('uploads/'.$ci_name))
        {
            mkdir('uploads/'.$ci_name, 0755, TRUE);
        }
     
        if($ci_name=='banner_bottom')
        {
        $iWidth = 1920;
        $iHeight = 320; // desired image result dimensions
        }
        if($ci_name=='banner')
        {
        $iWidth = 1920;
        $iHeight = 1200; // desired image result dimensions
        }

        $iJpgQuality = 300;
        if ($_FILES) {
        // if no errors and size less than 250kb
        if (!$_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 1024 * 1024) {
        if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {
        // new unique filename
        $sTempFileName = 'uploads/'.$ci_name.'/' . md5(time() . rand());
        // move uploaded file into cache folder
        move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
        // change file permission to 644
        @chmod($sTempFileName, 0644);
        if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
        $aSize = getimagesize($sTempFileName); // try to obtain image info
        if (!$aSize) {
        @unlink($sTempFileName);
        return;
        }
        // check for image type
        switch ($aSize[2]) {
        case IMAGETYPE_JPEG:
        $sExt = '.jpg';
        // create a new image from file 
        $vImg = @imagecreatefromjpeg($sTempFileName);
        break;
        /* case IMAGETYPE_GIF:
        $sExt = '.gif';
        // create a new image from file
        $vImg = @imagecreatefromgif($sTempFileName);
        break; */
        case IMAGETYPE_PNG:
        $sExt = '.png';
        // create a new image from file 
        $vImg = @imagecreatefrompng($sTempFileName);
        break;
        default:
        @unlink($sTempFileName);
        return;
        }
        // create a new true color image
        $vDstImg = @imagecreatetruecolor($iWidth, $iHeight);
        // copy and resize part of an image with resampling
        imagecopyresampled($vDstImg, $vImg, 0, 0, (int) $_POST['x1'], (int) $_POST['y1'], $iWidth, $iHeight, (int) $_POST['w'], (int) $_POST['h']);
        // define a result image filename
        $sResultFileName = $sTempFileName . $sExt;
        // output image to file
        $crop_image = explode("/", $sResultFileName);
        $this->image_name = $crop_image[2];
        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
        @unlink($sTempFileName);
        }
        }
        }
        }

        return; 
    }

    function imageCropAdd()
    {

    $ci_name=strtolower($this->CI->router->fetch_class());

     if (!is_dir('uploads/'.$ci_name))
     {
        mkdir('uploads/'.$ci_name, 0755, TRUE);
        mkdir('uploads/'.$ci_name.'/crop', 0755, TRUE);
     }
     
        $config['upload_path'] = 'uploads/'.$ci_name.'/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg|pdf';
        $config['file_name'] = $_FILES['image_file']['name'];
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['min_width'] = '0';
        $config['min_height'] = '0';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->CI->upload->initialize($config);
        $upload = $this->CI->upload->do_upload('image_file');
        $data = $this->CI->upload->data();
        $this->image_name = $data['file_name'];
     

        if($ci_name=='category')
        {
        $iWidth = 170;
        $iHeight = 150; // desired image result dimensions
        }
        
        
        if($ci_name=='blog')
        {
        $iWidth = 1600;
        $iHeight = 800; // desired image result dimensions
        }

        $iJpgQuality = 90;
        if ($_FILES) {
        // if no errors and size less than 250kb
        if (!$_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 1024 * 1024) {
        if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {
        // new unique filename
        $sTempFileName = 'uploads/'.$ci_name.'/crop/' . md5(time() . rand());

        // move uploaded file into cache folder
        move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
        // change file permission to 644
        @chmod($sTempFileName, 0644);
        if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
        $aSize = getimagesize($sTempFileName); // try to obtain image info
        if (!$aSize) {
        @unlink($sTempFileName);
        return;
        }
        // check for image type
        switch ($aSize[2]) {
        case IMAGETYPE_JPEG:
        $sExt = '.jpg';
        // create a new image from file 
        $vImg = @imagecreatefromjpeg($sTempFileName);

        break;
        /* case IMAGETYPE_GIF:
        $sExt = '.gif';
        // create a new image from file
        $vImg = @imagecreatefromgif($sTempFileName);
        break; */
        case IMAGETYPE_PNG:
        $sExt = '.png';
        // create a new image from file 
        $vImg = @imagecreatefrompng($sTempFileName);
        break;
        default:
        @unlink($sTempFileName);
        return;
        }
        // create a new true color image
        $vDstImg = @imagecreatetruecolor($iWidth, $iHeight);
        // copy and resize part of an image with resampling
        imagecopyresampled($vDstImg, $vImg, 0, 0, (int) $_POST['x1'], (int) $_POST['y1'], $iWidth, $iHeight, (int) $_POST['w'], (int) $_POST['h']);
        // define a result image filename
        $sResultFileName = $sTempFileName . $sExt;
        // output image to file
        $crop_image = explode("/", $sResultFileName);
        $this->crop_image_name = $crop_image[3];
        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
        @unlink($sTempFileName);
        }
        }
        }
        }

        return; 
    }


}