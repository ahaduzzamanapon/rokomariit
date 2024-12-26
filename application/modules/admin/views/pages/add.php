<section class="content-header">
  <h1> <?=$meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?=$meta_title; ?></li>
  </ol>
</section>
<form action="<?= base_url('admin/pages/add');?>" method="post">


<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$meta_title; ?></h3>
          <a href="<?=base_url('admin/pages/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All pages</a>          
        </div>        
        <?php echo form_open_multipart("admin/pages/add");?>
        <div class="box-body">
          <div id="infoMessage"><?php //echo $message;?></div>
          <div><?php //echo validation_errors(); ?></div>
          <?php if($this->session->flashdata('success')):?>
            <div class="alert alert-success">
              <a class="close" data-dismiss="alert">&times;</a>
              <?php echo $this->session->flashdata('success');;?>
            </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group col-md-4">
                <label>Title</label>
                <input type="text" class="form-control" name="title_pages" required id="title_pages" placeholder="Enter title" value="<?=set_value('title_pages')?>" />
              </div>
              <div class="form-group col-md-4">
                <label>Link</label>
                <span>Default set "https://rokomariit.com/pages/"</span>
                <input type="text" class="form-control" name="link_pages" required id="link_pages" onblur="link_check(this.value)" placeholder="Enter link" value="<?=set_value('link_pages')?>" />
                <span id="link_valid"></span>
              </div>
           
              <div class="form-group col-md-4">
                <label>Meta Keys</label>
                <input type="text" class="form-control" required name="meta_keys_pages" id="meta_keys_pages" placeholder="Enter keywords" value="<?=set_value('meta_keys_pages')?>" />

              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label for="">Meta Description</label>
                <textarea name="meta_description_pages" id="meta_description_pages" style="width:100%" required></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label for="">Meta Tag</label>
                <input type="text" class="form-control" required name="meta_tags_pages" onkeyup="tag_check(this.value)" id="meta_tags_pages" placeholder="Enter tags" value="<?=set_value('meta_tags_pages')?>" />
                <span id="tag_valid"></span>

              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label for="">Image Upload</label>
                <input type="file" id="image" name="userfile" onchange="uploadImage(this.files[0])">
                <div id="uploadImage">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Uploaded Image</th>
                        <th>Link</th>
                      </tr>
                    </thead>
                    <tbody id="image_list">

                    </tbody>

                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label for="">Description</label>
                <textarea name="description_pages" id="description_pages" style="width:100%"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" id="submit" class="btn btn-primary">Save</button>
        </div>
      </section>
      </form>

      <script src="https://cdn.tiny.cloud/1/fdsn41bujb6kta7qy0xno2ytn146wkoyr39t6m2kp2b9k66q/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
        tinymce.init({
          selector: '#description_pages',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
      </script>
      <script>
        function uploadImage(file) {
          var formData = new FormData();
          formData.append('userfile', file);

          $.ajax({
            url: '<?=base_url('admin/pages/upload_image');?>',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
              var html = '<tr><td><img style="width: 25px; height: 25px" src="'+data+'" width="100px"/></td><td>'+data+'</td></tr>';
              $('#image_list').append(html);
            }
          });
        }
      </script>

      <script>
        function link_check(link) {
          $.ajax({
            url: '<?=base_url('admin/pages/link_check');?>',
            type: 'POST',
            data: {link: link},
            success: function(data) {
              if(data == 'have') {
                $('#link_pages').css('border', '1px solid red');
                $('#link_valid').html('<span style="color:red">Link already exist !</span>');
                $('#submit').attr('disabled', 'disabled');
                
              }else {
                $('#link_pages').css('border', '1px solid #ccc');
                $('#link_valid').html('<span style="color:green">Link available !</span>');
                $('#submit').removeAttr('disabled');
              }
            }
          })
        }

      </script>
      <script>
        function tag_check(tag) {
          $.ajax({
            url: '<?=base_url('admin/pages/tag_add');?>',
            type: 'POST',
            data: {tag: tag},
            success: function(data) {
              if(data == 'have') {
                $('#tag_pages').css('border', '1px solid red');
                $('#tag_valid').html('<span style="color:red">Tag already exist !</span>');
                $('#submit').attr('disabled', 'disabled');
                
              }else {

                console.log('sdjniusfijf');
                
                $('#tag_pages').css('border', '1px solid #ccc');
                $('#tag_valid').html('<span style="color:green">Tag available !</span>');
                $('#submit').removeAttr('disabled');
              }
            }
          })
        }

      </script>

