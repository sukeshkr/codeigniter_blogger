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
          <h1> Blog</h1>
        </section>
          
        <!-- Main content -->
<section class="content">
    <!--            <div class="row">-->
    <div class="box box-primary">
      <form id="upload_form" enctype="multipart/form-data" method="post" action="<?= CUSTOM_BASE_URL . 'blog/create' ?>" onSubmit="return checkForm()">
          
        <div class="container-fluid">
          <div class="row">

               <div class="col-md-6">

                <div class="form-group">
                    <label>Thumbnail image</label>
                     <a class="btn btn-block btn-default cropModal" data-toggle="modal" data-target="#cropModall"><i class="fa fa-picture-o" aria-hidden="true"></i> crop Image</a>
                    <?php echo form_error('image_file', '<p class="help-block error-info">', '</p>'); ?>
                    <div class="error"></div>
                    <div class="sucess" style="color:green;font-weight:bold;"></div>
                    <p id="error_img" class="help-block error-info"></p>
               <img height="100" width="100" id="previews" alt="" class="img-responsive">

                </div>
            </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
                       <?php echo form_error('name', '<p class="help-block error-info">', '</p>'); ?>
                  </div>
              </div>

                <div class="col-md-6">
             <label class="form-control-label" for="inputBasicFirstName">Category</label>  
    
            <select class="form-control selectpicker" name="cat_id" data-live-search="true">
                <option value="">- Please Select -</option>
                <?php foreach ($category as $row) { ?>
                 <option value="<?= $row['cat_id'];?>" <?php echo set_select('cat_id',$row['cat_id'], False); ?>><?= $row['cat_name'];?></option>
                 <?php } ?>
            </select>
            </div>
             
                    <div class="modal fade" id="cropModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Image Croping</h4>
                            
                             </div>
                        <div class="modal-body">
                                    <div class="form-group">
                                        <label>image</label>
                                        <input type="hidden" id="x1" name="x1" />
                                        <input type="hidden" id="y1" name="y1" />
                                        <input type="hidden" id="x2" name="x2" />
                                        <input type="hidden" id="y2" name="y2" />
                                        <input type="hidden" id="admin_url" name="admin_url" value=" <?= CUSTOM_BASE_URL.'assets/images/loading.gif';?> " />
                                        <div  class="form-group">
                                        <input accept="image/x-png,image/jpeg" type="file"  name="image_file" id="image_file" onChange="fileSelectHandler()"  class="form-control"/>
                                        </div>
                                                <div id="loading"></div>
                                                <div class="error"></div>
                                                <img id="preview" />  
                                        <div class="step2">
                                        <h5>Please select a crop region</h5>

                                        <div class="info">
                                         <!-- <h4><a class="btn btn-primary" data-dismiss="modal">Add Image</a></h4>   -->
                                        <input type="hidden" id="filesize" name="filesize" />
                                        <input type="hidden" id="filetype" name="filetype" />
                                        <input type="hidden" id="filedim" name="filedim" />
                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <input type="hidden" id="admin_url" value="<?= CUSTOM_BASE_URL.'assets/images/loading.gif';?>">
                                    </div>
                                    <a class="btn btn-primary" data-dismiss="modal">Add Image</a>
                                </div>
                            </div>
                             </div>
                        </div>
                    </div>
                </div>


                 <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                     <textarea id="editor" name="description" class="form-control" rows="3"><?php echo set_value('description') ?></textarea>
                     <?php echo form_error('description', '<p class="invaild-9-field">', '</p>'); ?>
                </div>
            </div>
     
          <div class="col-md-12"><h3 class="new-ca-head">Meta Data</h3></div>
            <div class="col-md-6">
             <div class="form-group">   
                  <label class="form-control-label" for="inputBasicFirstName">Page Title(Max:70)</label>  
                  <input type="text" class="form-control" name="meta_title" maxlength="70"  value="<?php echo set_value('meta_title') ?>">
                  <?php echo form_error('meta_title', '<p class="invaild-9-field">', '</p>'); ?>
              </div>  
            </div> 
             <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Meta Description(Max:160)
                   <input readonly type="text" name="countDisplay" size="3" maxlength="3" value="160" style="margin-left:10px;width:50px;border:1px solid #FCFAFA"></label> 
                  <textarea  id="metaDesc" onKeyDown="textCounter(this.form.metaDesc, this.form.countDisplay);" onKeyUp="textCounter(this.form.metaDesc, this.form.countDisplay);" class="form-control" name="meta_descrip" rows="3" data-fv-field="skills"><?php echo set_value('meta_descrip') ?></textarea>
                  <?php echo form_error('meta_descrip', '<p class="invaild-9-field">', '</p>'); ?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Meta Keywords</label> 
                  <input class="form-control" type="text" name="meta_key"  value="<?php echo set_value('meta_key') ?>" data-role="tagsinput" >
                  <?php echo form_error('meta_key', '<p class="invaild-9-field">', '</p>'); ?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">   
                  <label class="form-control-label" for="inputBasicFirstName">SEO Name</label>  
                  <input type="text" class="form-control" name="seo_name" value="<?php echo set_value('seo_name') ?>">
                  <?php echo form_error('seo_name', '<p class="invaild-9-field">', '</p>'); ?>
              </div>
            </div>
            <div class="col-md-12">
                <input type="submit" name="submit" class="btn btn-success" value="Save">
                 <input type="button" id="cancel" class="btn btn-danger" value="Cancel">
            </div>
            </div>
          
          </div>
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
        
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
     <?php include('assets/include/footer.php'); ?>
 <script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url() ?>assets/crop/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/crop/script_combo.js"></script>
  
</body>

</html>
<script>

$("#cancel").click(function () {//jquery cancel function when cancel button click
window.location = '<?= CUSTOM_BASE_URL . "gallery" ?>';
});



  $(function() {
    $("form").submit(function() {
      $(this).find("input[type='submit']").prop('disabled', true).val("Please wait...");
        setTimeout(function() {
        $("input[type='submit']").removeAttr("disabled").val("save");;      
        }, 500);
    });
  });
 </script>
<script type="text/javascript">
     function maxLength(el) {    

    if (!('maxLength' in el)) {

        var max = el.attributes.maxLength.value;

        el.onkeypress = function () {

            if (this.value.length >= max) return false;

        };

        }

    }

    maxLength(document.getElementById("metaDesc"));



    var maxAmount = 160;

        function textCounter(textField, showCountField) {

        if (textField.value.length > maxAmount) {

            textField.value = textField.value.substring(0, maxAmount);

        } else {

            showCountField.value = maxAmount - textField.value.length;

        }

    }

</script>

 <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>