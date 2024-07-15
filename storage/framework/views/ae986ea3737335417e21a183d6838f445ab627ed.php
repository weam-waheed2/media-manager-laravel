

    <!-- Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center fs-5" id="exampleModalLabel">media manager</h4>
                    <button type="button" class="btn-close closebtn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>

                    <ul class="nav nav-media nav-pills nav-tabs my-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-link-media active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab"
                                aria-controls="pills-home" aria-selected="true">All Files</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-link-media" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Upload</button>
                        </li>
                        
                    </ul>
                </div>
            <div class="modal-body">
                <div class="container-fluid border-file-manager">
                    <div class="row">

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xl-9 m-auto">
                                             <div class="input-group my-3">
                                                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                                                    <input type="text" class="form-control" id="search" name="search" placeholder="Find Your Image" style="padding: 8px;">
                                                </div>
                                            <section class="row" id="image"></section>

                                            
                                        </div>
                                        <hr>
                                        <div class="col-xl-9">
                                            <div class="container">
                                                <div class="row table-data" id="tbody">
                                                    <?php if(isset($media) && !empty($media)): ?>
                                                        <?php $__empty_1 = true; $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <div class="col-xl-2 py-2 record"
                                                                data-image-id='<?php echo e($img->id); ?>'>
                                                                <div class="border-image-manager menu-link" id="id1" >
                                                                    <img class="editbtn"
                                                                        data-id="<?php echo e($img->id); ?>"
                                                                        src="<?php echo e($img->image); ?>"
                                                                        width="100%"
                                                                        style="border-radius:0;padding:0"
                                                                        value="<?php echo e($img->id); ?>">

                                                                    <div class="action-media">
                                                                        <!--<button type="button" class="selectbtn select btn-media"-->
                                                                        <!--    value="<?php echo e($img->id); ?>">select</button>-->
                                                                        <!--<button type="button" class="editbtn btn-media"-->
                                                                        <!--    value="<?php echo e($img->id); ?>"><i-->
                                                                        <!--        class="fa-solid fa-pen"></i></button>-->
                                                                        
                                                                        <button type="button" class="deletebtn btn-media"
                                                                            value="<?php echo e($img->id); ?>"
                                                                            id="<?php echo e($img->id); ?>"><i
                                                                                class="fa-solid fa-trash"></i></button>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <h5 class="text-center text-danger">
                                                                No images Yet
                                                            </h5>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php echo $media->links(); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3">
                                            <div class="my-4">
                                                <form action="" class="p-3"
                                                    method="POST" id="form-edit"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <input type="hidden" name="id" id="idedit"
                                                        value="">
                                                    <!--<div class="border-image-manager">-->
                                                    <!--    <img-->
                                                    <!--        src=""-->
                                                    <!--        id="imageedit"-->
                                                    <!--        width="100%">-->
                                                    <!--</div>-->
                                                    <div class="my-2 record my-2">
                                                        <div  class="border-image-manager shadow" style="height:200px">
                                                            <img src="" id="imagesedit" width="100%" style="height:200px" alt="select image">
                                                        </div>
                            
                                                    </div>
                                                    <label class="title-form" for="image">image</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="image" id="imageedit">
                                                    <label class="title-form" for="name">name</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="name" id="nameedit">
                                                    <label class="title-form" for="title">title</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="title" id="titleedit">
                                                    <label class="title-form"
                                                        for="description">description</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="description" id="descriptionedit">
                                                    <label class="title-form" for="alt">alt</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="alt" id="altedit">
                                                    <div class="text-center">
                                                        
                                                    
                                                    <button type="button" class="selectbtn selectbtnimage selectimg select btn-media"
                                                        value="" style="background-color: #32b168;padding: 7px 15px;border-radius: 7px;font-size: 16px;" data-id="">select</button>
                                                    <a href="" class="btn btn-primary viewimg" target="_blank">view</a>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="container py-5">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <form action="" method="POST"
                                                enctype="multipart/form-data" class="form my_form"
                                                id="image-upload">
                                                <?php echo csrf_field(); ?>
                                                <div class="item form-group">
                                                    <label
                                                        class="col-form-label title-form col-md-3 col-sm-3 label-align">name
                                                        <span class="required" style="color:red">*</span>
                                                    </label>
                                                    <input type="hidden" name="id" id="id"
                                                        value="">
                                                    <input type="text" name="name" id="name-media"
                                                        value="" required class="form-input">
                                                    <span class="text-danger" id="image-input-error"></span>
                                                </div>

                                                <div class="item form-group">
                                                    <label
                                                        class="col-form-label title-form col-md-3 col-sm-3 label-align">image
                                                        <span class="required" style="color:red">*</span>
                                                    </label>

                                                    <div class="">
                                                        <input type="file" name="imagef" id="imagef"
                                                            hidden class="imagef">
                                                        <div class="d-flex">
                                                            <input type="text" name="" id="filename"
                                                                class="filename form-input input-select"
                                                                readonly="readonly">
                                                            <input type="button" class="btnadd" value="select">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <img id="preview-image" width="300px">
                                                </div>
                                                <div class="item form-group">
                                                    <label
                                                        class="col-form-label title-form col-md-3 col-sm-3 label-align">title
                                                        <span class="required" style="color:red">*</span>
                                                    </label>
                                                    <input type="text" name="title" id="title-media"
                                                        value="" required class="form-input">
                                                </div>

                                                <div class="item form-group">
                                                    <label
                                                        class="col-form-label title-form col-md-3 col-sm-3 label-align">description
                                                        <span class="required" style="color:red">*</span>
                                                    </label>
                                                    <input type="text" name="description" id="description-media"
                                                        value="" required class="form-input">
                                                </div>

                                                <div class="item form-group">
                                                    <label
                                                        class="col-form-label title-form col-md-3 col-sm-3 label-align">alt
                                                        <span class="required" style="color:red">*</span>
                                                    </label>
                                                    <input type="text" name="alt" id="alt-media"
                                                        value="" required class="form-input">
                                                </div>
                                                
                                                <div class="text-center my-5">
                                                    <button type="submit" class="btn-upload-media">add</button>
                                                </div>
                                                
                                                <!--<div class="alert alert-success my-2">-->
                                                <!--    media added successfully !-->
                                                <!--</div>-->
                                            </form>
                                        </div>
                                        <hr>
                                        
                                        <div class="col-xl-12 py-3">
                                            <h6>upload multiple images</h6>
                                        </div>
                                        <div class="col-xl-12">   
                                            <form id="images-multiple-upload" action="" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div>
                                                    <div class="card-body">
                                                        <label for="file" class="my-2"> Image(s) <span class="text-danger">*</span> </label>
                                                        <input type="file" name="images[]" id="images" multiple class="form-control">
                                                    </div>
                                                    
                                                    
                        
                                                    <div class="card-footer my-3 text-center">
                                                        <button type="submit" class="btn-upload-media"> Upload </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


    <style type="text/css">
     
        .images-preview-div{
            background:white;
        }
        .images-preview-div img{
            width:100%;
        }
     
    </style>



    
    

    
    <script>
	   var currentMenu;
        var menuLinks = document.querySelectorAll('.menu-link');
        function clickMenuHandler() {
          if (currentMenu) {
            currentMenu.classList.remove('menu-active');
          }
          this.classList.add('menu-active');
          currentMenu = this;
        } 
        
        for (var i=0; i < menuLinks.length; i++) {
          menuLinks[i].addEventListener('click', clickMenuHandler);
        } 
	</script>
	
	




<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
     //pagination 
    $(document).on('click','.pagination a', function(e){
      e.preventDefault();
      let page = $(this).attr('href').split('page=')[1]
      record(page)
    })

    function record(page){
        $.ajax({
            url:"/ajax-paginate?page="+page,
            success:function(res){
                $('.table-data').html(res);
            }
        })
    }

</script> 








<script type="text/javascript">
    $(document).ready( function() {
        var img = $('#imagef')
        $('#imagef').on('change', function() {
            var img = $(this)[0].files[0].name;
            var file = img.replace(/\.jpeg$/i, '').replace(/\.jpg$/i, '').replace(/\.png$/i, '').replace(/\.gif$/i, '').replace(/\.svg$/i, '').replace(/\.webp/i, '')
            $('#name-media').val(file);
            $('#title-media').val(file);
            $('#description-media').val(file);
            $('#alt-media').val(file);
        });
    });
    
    
    
    

</script>



    <script>
        
        









// media



// input text of image 

$(document).ready(function () {
    $('.btnadd').on('click', function () {
        $('.imagef').trigger('click');
    });

    $('.imagef').on('change', function () {
        var fileName = $(this)[0].files[0].name;
        $('#filename').val(fileName);
    });
})



// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

// $('#imagef').change(function(){    
//     let reader = new FileReader();

//     reader.onload = (e) => { 
//         $('#preview-image').attr('src', e.target.result); 
//     }   

//     reader.readAsDataURL(this.files[0]); 
 
// });
// $('.alert').hide();
// $('#image-upload').submit(function(e) {
//       e.preventDefault();
//       let formData = new FormData(this);
//       $('#image-input-error').text('');


//           var form = $(this);
       
//           $.ajax({
//               type: form.attr('method'),
//               url: form.attr('action'),
//               data: formData,
//               contentType: false,
//               processData: false,
//               success: function (response) {
//                   if(response.success){
//                     'success'
//                   } else {
//                     'error'
//                   }
//               },
//               error: function (xhr, textStatus, errorThrown) {
//                   console.log("ERROR");
//               }
//           });
        
//         // $('.alert').show();
//         $('.modal').modal('hide');
// });
  


// edit btn
$(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: '/fileeditmedia/' + id,
            success: function (response) {
                $('#idedit').val(response.media.id);
                $('#imagesedit').attr('src' , response.media.image);
                $('#imageedit').val(response.media.image);
                $('#titleedit').val(response.media.title);
                $('#nameedit').val(response.media.name);
                $('#descriptionedit').val(response.media.description);
                $('#altedit').val(response.media.alt);
                $('.selectbtnimage').attr('data-id', response.media.id)
                $('.viewimg').attr('href', response.media.image)
                $('.editviewbtn').attr('href',response.media.id)
                $('#idedit').val(id);
            }
        });
    });
});


// edit btn
$(document).ready(function () {
    $(document).on('click', '.editbtncrop', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: '/fileeditmedia/' + id,
            success: function (response) {
                $('#ideditcrop').val(response.media.id);
                $('#imageseditcrop').attr('src' , response.media.base64);
                $('#titleeditcrop').val(response.media.title);
                $('#nameeditcrop').val(response.media.name);
                $('#descriptioneditcrop').val(response.media.description);
                $('#alteditcrop').val(response.media.alt);
                $('.selectbtnimagecrop').attr('data-id', response.media.id)
                $('.viewimgcrop').attr('href', response.media.base64)
                $('.editviewbtncrop').attr('href',response.media.id)
                $('#ideditcrop').val(id);
            }
        });
    });
});



// function show() {
//   document.getElementById('id1').style.maxHeight = "200px";
//   var images = document.querySelectorAll("#id1 img");
//   for(var i = 0; i < images.length; i++)
//   {
//     images[i].src = images[i].getAttribute('data-src');
//   }
// }



// update
// $(document).on('click', '.update', function () {
//     var id = $(this).attr('id');


//     if (confirm("Sure you want save changes ?")) {
//         $.ajax({

//             url: "form/" + id + "/edit",
//             dataType: "json",
//             success: function (html) {
//                 $('#nameedit').val(html.data.name);
//                 $('#titleedit').val(html.data.title);
//                 $('#descriptionedit').val(html.data.description);
//                 $('#altedit').val(html.data.alt);
//                 //   $('#store_image').html("<img src=<?php echo e(URL::to('/')); ?>/images/" + html.data.casting_photo + " width='70' class='img-thumbnail' />");
//                 //   $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.casting_photo+"' />");
//                 $('#idedit').val(html.data.id);
//             }
//         })
//     } return false;
// });





// select btn
// $(document).ready(function () {
//     $(document).on('click', '.selectbtn', function () {
//         var id = $(this).val();

//         $.ajax({
//             type: "GET",
//             url: '/fileselectmedia/' + id,
//             success: function (response) {
//                 $('#idselect').val(response.media.id);
//                 $('.imageselect[data-id="'+data_id +'"]').val(response.media.image);
//                 $("#preview-image-before-upload").attr('src',response.media.image)
//                 $('#idselect').val(id);
//             }
//         });
        
//         $('.modal').modal('hide');
//     });
// });





// select img
$(document).ready(function () {
    function featureimageselect(){
        $('.selectimg').off('click');
        $('.selectimg').click(function () {
            var id = $(this).attr("data-id");
            $.ajax({
                type: "GET",
                url: '/fileselectmedia/' + id,
                success: function (response) {
                    $('#idselect').val(response.media.id);
                    if(response.media.image == null){
                        $('#imageselect').val(response.media.base64);
                        $("#preview-image-before-upload").attr('src',response.media.base64)
                    }else{
                        $('#imageselect').val(response.media.image);
                        $("#preview-image-before-upload").attr('src',response.media.image)
                    }
                    $('#idselect').val(id);
                }
            });
            $('.modal').modal('hide');
        });
    }
    $('#featureimageselect').click(function(){
        featureimageselect();
    });
});



// delete btn
$(function () {
    $(".deletebtn").click(function () {
        var del_id = $(this).attr("id");
        var info = 'id=' + del_id;
        if (confirm("Sure you want to delete this image ?")) {
            $.ajax({
                type: "get",
                url: "/delete/" + del_id, //URL to the delete php script
                data: info,
                success: function (data) {

                }
            });
            $(this).parents(".record").animate("fast").animate({
                opacity: "hide"
            }, "slow");
            $("img[data-image-id=" + del_id + "]").remove();
            // $('.modal').load(document.URL +  ' .modal');
        }
        return false;
    });
});






$('#image-upload').submit(function(e) {
  e.preventDefault();
  let formData = new FormData(this);
   
      $.ajax({
        url: '<?php echo e(route('media.store')); ?>',
        type: 'POST',
        data: new FormData( this ),
        processData: false,
        contentType: false,
        success: function(result){
            $('#tbody').load(document.URL +  ' #tbody');
            alert('done');
        }
      });
});


$('#images-multiple-upload').submit(function(e) {
  e.preventDefault();
  let formData = new FormData(this);
   
      $.ajax({
        url: '<?php echo e(route('image.upload')); ?>',
        type: 'POST',
        data: new FormData( this ),
        processData: false,
        contentType: false,
        success: function(result){
            $('#tbody').load(document.URL +  ' #tbody');
            alert('done');
        }
      });
});




// update without reload
// $('#form-edit').submit(function(e) {
//   e.preventDefault();
//   let formData = new FormData(this);
   
//       $.ajax({
//         url: '<?php echo e(url('updatemedia')); ?>',
//         type: 'POST',
//         data: new FormData( this ),
//         processData: false,
//         contentType: false,
//         success: function(result){
//             $('#tbody').load(document.URL +  ' #tbody');
//             alert('done');
//         }
//       });
// });






// $(function() {
// // Multiple images preview with JavaScript
// var previewImages = function(input, imgPreviewPlaceholder) {
// if (input.files) {
// var filesAmount = input.files.length;
// for (i = 0; i < filesAmount; i++) {
// var reader = new FileReader();
// reader.onload = function(event) {
// $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
// }
// reader.readAsDataURL(input.files[i]);
// }
// }
// };
// $('#images').on('change', function() {
// previewImages(this, 'div.images-preview-div');
// });
// });



    </script>
    <script type="text/javascript">
        var searchRequest = null;
        $('#search').on('keyup',function(){
            var that = this,
            value=$(this).val();
                if (searchRequest != null) searchRequest.abort();
                    searchRequest = $.ajax({
                        type : 'get',
                        url : '<?php echo e(URL::to('search')); ?>',
                        data:{'search' : value},
                        success:function(data){
                        if (value==$(that).val()) {
                            $('section#image').html(data);
                        }
                    }
                });
            if( value.length === 0 ) {
                 $('section#image').css( "display", "none" );
            }else{
                $('section#image').css( "display", "flex" );
            }
        })
        
        
        // $('#search').on('keyup',function(){
        // $value=$(this).val();
        // $.ajax({
        // type : 'get',
        // url : '<?php echo e(URL::to('search')); ?>',
        // data:{'search':$value},
        // success:function(data){
        // $('section#image').html(data);
        // }
        // });
        // })

    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
    </script>
    
    
    <script>
        var timeoutId;
        $('form input, form textarea').on('input propertychange change', function() {
            console.log('Textarea Change');
            
            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
                // Runs 1 second (1000 ms) after the last change    
                saveToDB();
            }, 1000);
        });
        
        function saveToDB()
        {
            console.log('Saving to the db');
            form = $('#form-edit');
        	$.ajax({
        		url: "<?php echo e(url('updatemedia')); ?>",
        		type: "PUT",
        		data: form.serialize(), // serializes the form's elements.
        		beforeSend: function(xhr) {
                    // Let them know we are saving
        			$('.form-status-holder').html('Saving...');
        		},
        		success: function(data) {
        			var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
                    // Now show them we saved and when we did
                    var d = new Date();
                    $('.form-status-holder').html('Saved! Last: ' + d.toLocaleTimeString());
        		},
        	});
        }
        
        // This is just so we don't go anywhere  
        // and still save if you submit the form
        $('#form-edit').submit(function(e) {
        	saveToDB();
        	e.preventDefault();
        });
    </script>
    

<?php /**PATH C:\xampp\htdocs\media_manager\resources\views/media/includemedia.blade.php ENDPATH**/ ?>