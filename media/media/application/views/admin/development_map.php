<!-- CONTENT-WRAPPER-->

    <div class="content-wrapper">
        <!-- Container-fluid starts -->
         <div class="container-fluid">

    <!-- Row Starts -->

    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <h4>Development Map</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home">Home</i>
              </a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:" >Add Flow</a></li>
          </ol>
        </div>
      </div>
    </div>

    <!-- Row end -->
    
    <div class="row">

      <div class="col-sm-12">

        <div class="card">
<!-- <?php echo base_url(); ?>admin/add_story -->
          <div class="card-header"><h5 class="card-header-text">Development Map</h5>
            <a href="<?php echo base_url(); ?>admin/add_map"> <span><button class="btn btn-success fa fa-plus" data-name="<?php echo @$current_page; ?>" style="margin-left:70%"> Add Flow</button></span>
            </a>    
<!--             <span><button class="btn btn-success fa fa-plus add_category" data-name="<?php echo @$current_page; ?>"> Sub service </button></span> -->
          </div>

          <div class="card-block">

            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">

              <thead>
                  <tr>
                    <th>S NO</th>
                    <th>Stage</th>
                    <th>Year</th>
                    <th>Stage Desc</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tfoot>
                  <tr>
                    <th>S NO</th>
                    <th>Stage</th>
                    <th>Year</th>
                    <th>Stage Desc</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>

               <tbody>
                   <?php $counter = 1;

                      foreach($maps as $key=>$map) {

                          if ($map["status"] == "1") {

                              $status = "tag tag-success" ;
                              $status1='Active';

                          } else {

                               $status = "tag tag-default" ;
                               $status1='InActive';

                          } ?>
 
                              <tr id="hide<?php echo $map["id"] ; ?>">

                                  <td style="width:10px;"><?php echo $counter ; ?></td> 

                                  <td style="width:100px;"><?php echo substr($map["title_en"],0,10) ; ?></td> 

                                  <td style="width:100px;"><?php echo $map["year_en"] ; ?></td> 

                                  <td style="width:500px;"><?php echo substr($map["content_en"],0,80) ; ?>....</td>  


                                  <td><span class="<?php echo $status ; ?>"><?php echo ucfirst($status1) ;?></span></td>

                                   <td style="white-space: nowrap; width: 1%;">

                                    <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                        <div class="btn-group btn-group-sm" style="float: none;">
                                            <a href="<?php echo base_url().'admin/add_map/'.$map['id']; ?>">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"> 
                                                    <span class="icofont icofont-ui-edit"></span>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-primary waves-effect waves-light delete_categories" data-id="<?php echo $map["id"] ; ?>" style="float: none;margin: 5px;"> 
                                                <span class="icofont icofont-ui-delete"></span>
                                            </button>
                                        </div>                                                       

                                    </div>

                                </td>

                              </tr>

                      <?php $counter++; } ?> 
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

    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_category" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

    </section>

   <script>     


    //Delete 
    $('.delete_categories').on('click',function(event)
    { 
          var id = $(this).data('id');
                 
              swal({title: 'Delete This Banner ?', showCancelButton: true}).then(result => {
                if (result.value) 
                {
                        //swal("Deleted!", "Cancelled.", "success")
                } 
                else 
                {
                   $.ajax({                
                        url: "<?php echo base_url();?>admin/delete/development_map",
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
                              //swal("Deleted!", "Category Deletion Is Success", "success"); 
                              location.reload();
                              $("#hide"+id).hide();
                            }
                        }
                  });
                }
              })

          });
  

$(".form_datetime").datetimepicker({
      format: "dd MM yyyy - hh:ii"
  });       

</script>

 