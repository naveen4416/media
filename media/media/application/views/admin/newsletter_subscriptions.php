<!-- CONTENT-WRAPPER-->

    <div class="content-wrapper">

        <!-- Container-fluid starts -->

         <div class="container-fluid">

    <!-- Row Starts -->

    <div class="row">

      <div class="col-sm-12">

        <div class="main-header">

          <h4>Newsletter Subscriptions</h4>

          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">

            <li class="breadcrumb-item">

              <a href="#">

                <i class="icofont icofont-home">Home</i>

              </a>

            </li>

            <li class="breadcrumb-item"><a href="#:">Newsletter Subscriptions</a></li>

          </ol>

        </div>

      </div>

    </div>

    <!-- Row end -->

    

    <div class="row">

      <div class="col-sm-12">

        <div class="card">

          <div class="card-header"><h5 class="card-header-text">Newsletter Subscriptions</h5></div>

          <div class="card-block">

            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">

              <thead>

              <tr>

                <th>S NO</th>
				        <th>Email</th>
              </tr>

              </thead>

              <tfoot>

               <tr>

                 <th>S NO</th>
				        <th>Email</th>

              </tr>

              </tfoot>

              <tbody>

                   <?php 

                      $counter = 1;

                      foreach($subscriptions as $key) {
         
						  ?>
						  <tr id="hide<?php echo $key["id"];?>" >
						  <td><?php echo $counter;?></td>
						  <td><?php echo $key['email'];?></td>
           <!--  
						  <td>
             
                <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url();?>admin/view_userdetails/<?php echo $key["id"];?>" role="button" data-toggle="tooltip" title="" data-original-title="View"><i class="icofont icofont-eye"></i></a>
						  
						   <a class="btn btn-primary waves-effect waves-light delete_team_mem" data-id="<?php echo $key["id"];?>" style="float: none;margin: 5px;"> 
                             <span class="icofont icofont-ui-delete"></span>
                             </a>
						  
						  </td>
          -->
						  
						  
						  </tr>
                      <?php  $counter++;}?> 
              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>



  </div>

        <!-- Container-fluid ends -->

        

     </div>

 <!-- CONTENT-WRAPPER-->

  <section>

    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_services" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

    </section>

   <script>     

        var $modal = $('#add_services');

        $('.add_services').on('click',function(event){ 

          

            var id = $(this).data('id');

            event.stopPropagation();

            $modal.load('<?php echo site_url('admin/add_packages');?>', {id: id},

            function(){

            /*$('.modal').replaceWith('');*/

            $modal.modal('show');





            });

        });

        //delete 

        $('.delete_team_mem').on('click',function(event){ 

          

            var id = $(this).data('id');
			
            swal({title: 'Delete this user from DATABASE ?', showCancelButton: true}).then(result => {
                if (result.value) 
                {
                        //swal("Deleted!", "Cancelled.", "success")
                } 
                else 
                {
                  $.ajax({                
                            url: "<?php echo base_url();?>admin/delete/users",
                            type: "POST",
                            data: {id:id},
                            error:function(request,response)
                            {
                                console.log(request);
                            },                  
                            success: function(result)
                            {
                                var res = jQuery.parseJSON(result);
                                if(res.status='success')
                                {
                                  swal("Deleted!", "User Deletion Is Success", "success"); 
                                    location.reload();
                                    $("#hide"+id).hide();
                                }
                            }
                         });
                }
            }); 
        });   

$('.status').on('click',function(event){ 

      var userid = $(this).data('id');
			var status=$('#status'+userid).val();
			
		
			 $.ajax({                
            		url: "<?php echo base_url();?>admin/updatestatus",
            		type: "POST",
            		data: {id:userid,sta:status},
            		error:function(request,response)
                {
            			console.log(request);
            		},                  
            		success: function(result)
                {
            		   if(result==1)
                   {
            			  location.reload();
            		   }
                   else
                   {
            			   location.reload(); 
            		   }
            		 
            		}
            });
		
});  

    </script>

 