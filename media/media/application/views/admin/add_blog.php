<!-- CONTENT-WRAPPER-->
<style>

#insert_services label.error 
{
    color:red; 
}

#insert_services input.error,textarea.error,select.error 
{
    border:1px solid red;
    color:red; 
}

.popover 
{
	z-index: 2000;
	position:relative;
}

    

</style>

    <div class="content-wrapper">
        <!-- Container-fluid starts -->
         <div class="container-fluid">

    <!-- Row Starts -->

    <!-- Row Starts -->

    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <h4>Add/Edit Blog</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home">Home</i>
              </a>
            </li>
			 <li class="breadcrumb-item"><a href="#:" >Add/Edit Blog</a></li>
          </ol>
        </div>
      </div>
    </div>

    <!-- Row end -->


    

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Add/Edit Blog</h5></div>
          <div class="card-block">

              <form id="insert_services">                         

                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Title (En)*</label>
                    <div class="col-sm-9">
                        <input type="text"  id="title_en" name="data[title_en]"  class="form-control"  value="<?php echo @$value['title_en'];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Title (Ar)*</label>
                    <div class="col-sm-9">
                        <input type="text"  id="title_ar" name="data[title_ar]" class="form-control"  value="<?php echo @$value['title_ar'];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">SubTitle (En)*</label>
                    <div class="col-sm-9">
                        <input type="text"  id="sub_title_en" name="data[sub_title_en]"  class="form-control"  value="<?php echo @$value['sub_title_en'];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">SubTitle (Ar)*</label>
                    <div class="col-sm-9">
                        <input type="text"  id="sub_title_ar" name="data[sub_title_ar]" class="form-control"  value="<?php echo @$value['sub_title_ar'];?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Content (En)*</label>
                    <div class="col-sm-9">
                        <textarea  id="content_en" name="data[content_en]"  class="form-control ckeditor" ><?php echo @$value['content_en'];?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Content (Ar)*</label>
                    <div class="col-sm-9">
                        <textarea  id="content_ar" name="data[content_ar]"  class="form-control ckeditor"><?php echo @$value['content_ar'];?></textarea>
                    </div>
                </div>
           
 
                  <?php  if(@$value){ ?>
                   <img src="<?php echo base_url();?><?php echo @$value['image'];?>" height=100px;>
                      <input type="hidden" name="old_image" value="<?php echo @$value['image'];?>"> 
                   <?php   } ?>
                <div class="form-group row">
                     <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Blog Image</label>
                    <div class="col-sm-9">
                        <input type="file" id="file"  name="file" class="form-control">
                    </div>
                </div>

                <input type="hidden" id="id" name="id" value="<?php echo @$value['id']; ?>">

                   

            </form> 
				
				 <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light insert_services">Save changes</button>

        </div>


              
          </div>

        </div>

      </div>

    </div>



  </div>

        <!-- Container-fluid ends -->
</div>
 <!-- CONTENT-WRAPPER-->

<script>
     
    $("#insert_services").validate({       

               
    		   ignore:[],
        			rules: 
              {

                    "data[title_en]"       : "required",
                    "data[title_ar]"       : "required",
                    "data[sub_title_en]"   : "required",
                    "data[sub_title_ar]"   : "required",
            	    "data[content_en]"     :{
                                    				required: function(textarea) 
                                    				{
                                    					 CKEDITOR.instances[textarea.id].updateElement();
                                    					 var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                    					 return editorcontent.length === 0;
                                    				}
                                    		},
                    "data[content_ar]"     :{
                                    			  required: function(textarea) 
                                    			  {
                                    					 CKEDITOR.instances[textarea.id].updateElement();
                                    					 var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                    					 return editorcontent.length === 0;
                                    				}
                                            },
                    <?php  $id=@$value['id'];
                    if($id==''){ ?>
                    "file"                 : "required",
                    <?php }?>

                },
                messages : 
                {

                		"data[title_en]"     : "Required",
                        "data[title_ar]"     : "Required",
                        "data[content_en]"   : "Required",
                        "data[content_ar]"   : "Required",
                        "data[sub_title_en]" : "required",
                    	"data[sub_title_ar]" : "required",
                        <?php  $id=@$value['id'];
                        if($id==''){ ?>
                        "file"               : "required",
                        <?php }?>
                },       

        });

    $('.insert_services').click(function(){ 

            var validator = $("#insert_services").validate();

                validator.form();

                if(validator.form() == true){

                  
                      var data = new FormData($('#insert_services')[0]);   

                    $.ajax({                

                        url: "<?php echo base_url();?>admin/save_data/blogs",
                        type: "POST",
                        data: data,
                        mimeType: "multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData:false,
                        error:function(request,response)
                        {
                          console.log(request);
                        },                  
                        success: function(result)
                        {
                            //alert(result);
                            location.reload();
                        }

                    });

                }

            });

</script>

 