<!DOCTYPE html>
<html>
  <head>
    <?php include('assets/include/header.php'); ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

     
 <?php include('assets/include/navigation.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Edit Category</h1>
        </section>
          
        <!-- Main content -->
<section class="content">
    <!--            <div class="row">-->
    <div class="box box-primary">


<form enctype="multipart/form-data" method="post" name="myform" action="<?= CUSTOM_BASE_URL . 'category/update' ?>" onSubmit="return checkForm()" >
<?php foreach ($result as $row) {?>
  <div class="container-fluid">
    <div class="row">

         <div class="col-md-6">
         <a class="cropModal" data-toggle="modal" data-target="#cropModal">
            <img  class="img-responsive col-md-4" id="previewimages" src="<?php echo base_url();?>uploads/category/crop/<?php echo $row['image']; ?>"></a>
            <div class="error"></div>
        </div>  


          <div class="col-md-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="cat_name" value="<?php echo $row['cat_name']; ?>">
                <p class="help-block error-info" id="title_Err"></p>
            </div>  
          </div>


              <div class="col-md-6">
             <label class="form-control-label" for="inputBasicFirstName">Parent</label>  
      
            <select class="form-control selectpicker" name="parent" data-live-search="true">
                <option value="0">- Root level -</option>
              <?php foreach ($category as $categorys) { ?>
              <option value="<?= $categorys['cat_id'];?>" <?php if ($categorys['cat_id'] == $row['cat_id']) { ?> selected="selected" <?php } ?>> <?php echo $categorys['cat_name']; ?></option>
            <?php } ?>


            </select>
            </div>


       

  <div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title">Crop Image</h4>
                                        </div>
                            <div class="modal-body">
                                <div class="form-group">
                                        <label>image</label>
                                        <input type="hidden" id="x1" name="x1" />
                                        <input type="hidden" id="y1" name="y1" />
                                        <input type="hidden" id="x2" name="x2" />
                                        <input type="hidden" id="y2" name="y2" />

                                        <div  class="form-group">
                                        <input type="file"  name="image_file" id="image_file" onChange="fileSelectHandler()"  class="form-control" accept="image/x-png,image/jpeg" />
                                        <input type="hidden" id="admin_url" value=" <?= CUSTOM_BASE_URL.'assets/images/loading.gif';?> " />
                                        </div>
                                       
                                         <div id="gif"></div>
                                           <div class="error"></div>
                                         <img  id="preview">
                                        <div class="step2">
                                        <h5>Please select a crop region</h5>

                                        <div class="info">
                                        <input type="hidden" id="filesize" name="filesize" />
                                        <input type="hidden" id="filetype" name="filetype" />
                                        <input type="hidden" id="filedim" name="filedim" />
                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <input type="hidden" id="cname" value="<?= strtolower($this->router->fetch_class());?>">
                                    </div>
                                </div>
                            </div>
                                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                     <textarea name="description" class="form-control" rows="3"><?php echo $row['description']; ?></textarea>
                     <?php echo form_error('description', '<p class="invaild-9-field">', '</p>'); ?>
                </div>
            </div>


            <div class="col-md-12">
             <div class="form-group">    
              <input type="hidden" class="form-control" name="id" value="<?php echo $row['cat_id']; ?>">
              <input type="submit" name="submit" class="btn btn-success" id="button" value="Change">
             <input type="button" id="cancel" class="btn btn-danger" value="Cancel">
            </div>
           </div>

    </div>
    </div>
<?php } ?>
</form>
               </div>
    <!-- /.box -->

    <!-- /.row -->
</section>
<!-- /.content -->
      </div><!-- /.content-wrapper -->
        
       
        

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2020-2025 <a target="_blank" href="http://zain.com">zain</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->




    <!-- jQuery 2.1.4 -->
     <?php include('assets/include/footer.php'); ?>
 <script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url() ?>assets/crop/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/crop/script_products.js"></script>
  
</body>

</html>
<script>

$("#cancel").click(function () {//jquery cancel function when cancel button click
window.location = '<?= CUSTOM_BASE_URL . "category" ?>';
});

  $(function() {
    $("form").submit(function() {
      $(this).find("input[type='submit']").prop('disabled', true).val("Please wait...");
        setTimeout(function() {
        $("input[type='submit']").removeAttr("disabled").val("save");;      
        }, 500);
    });
  });


function checkForm() {

    if (document.myform.title.value == "") {
        document.getElementById('title_Err').innerHTML = "Please enter a Title";
        return false;
    }
      var img = $('#image_file').val();

  if(img!="")
 {
if (parseInt($('#w').val())) return true;
$('.error').html('Please select a crop region and then press Save').show();
return false;
}
return true;
            }
</script>
