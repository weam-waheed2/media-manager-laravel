
@extends('layouts.dashboard')




@section('content')
             <!--Normalize CSS -->
            <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">-->
             <!--Cropper CSS -->
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
             <!--Cropper JS -->
            <script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>



            <script src="{{env('PUBLIC_URL') .'js/rcrop.min.js'}}"></script>
            <link href="{{env('PUBLIC_URL') .'css/rcrop.min.css'}}" media="screen" rel="stylesheet" type="text/css">

            {{-- data of article --}}
            <div class="col-xl-6 py-3">
                <h4 class="title-page"><i class="fa-solid fa-photo-film mr-2"></i> all data of media <span style="color:gray;">({{ $mediapage->count() }})</span></h4>
            </div>
            
            
            
        <!-- Button trigger modal -->
        {{--<input type="file" name="file" id="file" hidden class="file">
        <div class="d-flex">
            <input type="hidden" name="id" id="idselect" value="">
            <input type="text" name="filenameselect" id="imageselect" class="filenameselect form-input"
                readonly="readonly">
            <button onclick="show()" type="button" class="m-2 btn-upload-media buttonclick" data-bs-toggle="modal" data-bs-target="#exampleModal" id="featureimageselect">select</button>
        </div>--}}
        
        
        

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success my-2">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-xl-9 bg-card py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div>
                                        <a class="btn-delete-all delete_all" data-url="/deleteallmediaforever" title="delete forever"><i class="fa-solid fa-trash-can"></i> delete forever</a>
                                    </div>
                                    
                                    <table class="table table-bordered text-center my-1 table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col"><input type="checkbox" id="master"></th>
                                                <th scope="col">image</th>
                                                <th scope="col">title</th>
                                                <th scope="col">name</th>
                                                {{--<th scope="col">alt</th>
                                                <th scope="col">description</th>--}}
                                                <th scope="col">edit</th>
                                                <th scope="col">view</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($mediapage))
                                                @foreach ($mediapage as $image)
                                                @if($image->image !== null)
                                        
        
                                                <tr>
                                                    <th scope="row"><input type="checkbox" name="checkbox[{{ $image->id }}]"
                                                        class="sub_chk" data-id="{{ $image->id }}" scope="row"></th>
                                                    <td style="width: 5%;">
                                                        <div  class="border-image-manager shadow menu-link"  data-image-id='{{ $image->id }}' style="height:45px">
                                                            <img
                                                                class="editvbtn selectimageicon"
                                                                id="{{ $image->id }}"
                                                                src="{{ $image->image }}"
                                                                width="100%" style="height:40px">
                                                        </div>
                                                    </td>
                    
                                                    <td>{{ $image->title }}</td>
                                                    <td>{{ $image->name }}</td>
                                                    {{--<td>{{ $image->alt }}</td>
                                                    <td>{{ $image->description }}</td>--}}
                                                    <td>
                                                        <!--<a href="{{ '/crop/'.$image->id }}" class="cropbtn btn-media py-2 px-2" style="position: unset;"><i class="fa-solid fa-crop-simple"></i></a>-->
                                                        <a href="{{ route('media.edit', $image->id) }}">
                                                            <div style="color:green;margin:auto;padding: 6px 0;"><i
                                                                    class="fa-solid fa-pen"></i></div>
                                                        </a>
                                                    </td> 
                                                    
                                                    <td>
                                                        <a href="{{ url($image->image) }}" style="color:blue;font-size: 16px;" target="_blank"><i class="fa-solid fa-eye" style="padding:10px 0;"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                            
                                            @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                {{$mediapage->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-xl-3">
                <div class="bg-card">
                    <form action="{{ url('updatemedia') }}" class="p-3"
                        method="POST" id="form_result"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="idvedit"
                            value="">
                        <!--<div class="border-image-manager">-->
                        <!--    <img-->
                        <!--        src=""-->
                        <!--        id="imageedit"-->
                        <!--        width="100%">-->
                        <!--</div>-->
                        <div class="my-2 record my-2"
                            data-image-id='{{ $image->id }}'>
                            <div  class="border-image-manager shadow" style="height:200px">
                                <img src="" id="imagevedit" width="100%" style="height:200px" alt="select image">
                            </div>

                        </div>
                        <label class="title-form" for="image">image</label>
                        <input class="form-input" type="text" value=""
                            name="image" id="imagenedit">
                        <label class="title-form" for="name">name</label>
                        <input class="form-input" type="text" value=""
                            name="name" id="namevedit">
                        <label class="title-form" for="title">title</label>
                        <input class="form-input" type="text" value=""
                            name="title" id="titlevedit">
                        <label class="title-form"
                            for="description">description</label>
                        <input class="form-input" type="text" value=""
                            name="description" id="descriptionvedit">
                        <label class="title-form" for="alt">alt</label>
                        <input class="form-input" type="text" value=""
                            name="alt" id="altvedit">
                        <div class="text-center">
                            <button type="submit" id="btn-save"
                                class="btn btn-primary my-4 update btn-upload-media">edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--@include('admin.media.includemedia')--}}

    <div class="modal fade" id="cropModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title text-center fs-5" id="exampleModalLabel">crop image</h5>
                    <button type="button" class="btn-close close closebtn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <!--Modal body with image-->
                <div class="modal-body">
                    <input type="hidden" name="id" id="idcedit">
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="border-image-manager shadow result" style="height:100%">
                                    <img src="" id="imagecrop" class="image-3"  style="height:100%" />
                                </div>
                                
                                <!--<form>-->
                                <!--    <div>-->
                                <!--        <label for="width">width:</label>-->
                                <!--        <input id="width" type="text">-->
                                <!--    </div>-->
                                <!--    <div>-->
                                <!--        <label for="height">height:</label>-->
                                <!--        <input id="height" type="text">-->
                                <!--    </div>-->
                                <!--    <div>-->
                                <!--        <label for="x">x:</label>-->
                                <!--        <input id="x" type="text">-->
                                <!--    </div>-->
                                <!--    <div>-->
                                <!--        <label for="y">y:</label>-->
                                <!--        <input id="y" type="text">-->
                                <!--    </div>-->
                                <!--    <input id="update" type="button" value="update">-->
                                <!--</form>-->

                            </div>
                            
                            <div class="col-xl-6">
                                <div id="border-image-manager shadow">
                                    <h3>(updated size)</h3>
                                    <img src="" class="myImg" alt="" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-save"
                        class="btn btn-primary my-4 update btn-upload-media">crop and replace</button>
                </div>
            </div>
        </div>
    </div>

    
    
    
    
    



<!--<canvas id="canvas" width="100%" height="100%"></canvas>-->

<!--<script src="https://cdn.jsdelivr.net/npm/fabric"></script>-->
<!--<script>-->
<!--  const canvas = new fabric.Canvas('canvas');-->
<!--  const rect = new fabric.Rect({-->
<!--    top: 100,-->
<!--    left: 100,-->
<!--    width: 60,-->
<!--    height: 70,-->
<!--    fill: 'red',-->
<!--  });-->
<!--  canvas.add(rect);-->
<!--</script>-->






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
    

    @endsection
    
    
    
    @section('head')
    
    
        <script>
        

        // CROP
        $('.cropbtn').click(function(e) {
            $('#cropModal img').attr('src', $(this).attr('data-img-url')); 
        });

        $(document).ready(function () {
            // $(".true-select").hide();
            $(document).on('click', '.cropbtn', function () {
                var id = $(this).attr('id');
                var info = 'id=' + id;
                
                $.ajax({
                    type: "GET",
                    url: '/fileeditmedia/' + id,
                    data: info,
                    success: function (response) {
                        $('#idcedit').val(response.media.id);
                        $('#imagecrop').attr('src' , response.media.image);
                        $('#idcedit').val(id);
                        // var $image2 = $('#imagecrop').attr('src' , response.media.image),
                        // $update = $('#update'),
                        // inputs = {
                        //     x: $('#x'),
                        //     y: $('#y'),
                        //     width: $('#width'),
                        //     height: $('#height')
                        // },
                        // fill = function () {
                        //     var values = $('#imagecrop').attr('src' , response.media.image).rcrop('getValues');
                        //     for (var coord in inputs) {
                        //         inputs[coord].val(values[coord]);
                        //     }
                        // }
                        // $('#imagecrop').attr('src' , response.media.image).rcrop();
        
                        // $('#imagecrop').attr('src' , response.media.image).on('rcrop-changed rcrop-ready', fill);
                    }
                });
                
                
            });
        });
        

        $(document).ready(function () {


            var $image2 = $('.image-3'),
                $update = $('#update'),
                inputs = {
                    x: $('#x'),
                    y: $('#y'),
                    width: $('#width'),
                    height: $('#height')
                },
                fill = function () {
                    var values = $image2.rcrop('getValues');
                    for (var coord in inputs) {
                        inputs[coord].val(values[coord]);
                    }
                }
            $image2.rcrop();

            $image2.on('rcrop-changed rcrop-ready', fill);

            $update.click(function () {
                $image2.rcrop('resize', inputs.width.val(), inputs.height.val(), inputs.x.val(), inputs.y.val());
                fill();
            })

            $('.image-3').rcrop({
                minSize: [200, 200],
                preserveAspectRatio: true,

                preview: {
                    display: true,
                    size: [100, 100],
                }
            });

            $('.image-3').on('rcrop-changed', function () {
                var srcOriginal = $(this).rcrop('getDataURL');
                var myImg = $(".myImg");
                myImg.attr('src', srcOriginal);
            });




        });
        
        
        // edit btn
        $(document).ready(function () {
            // $(".true-select").hide();
            $(document).on('click', '.editvbtn', function () {
                var id = $(this).attr('id');
                var info = 'id=' + id;
                $.ajax({
                    type: "GET",
                    url: '/fileeditmedia/' + id,
                    data: info,
                    success: function (response) {
                        $('#idvedit').val(response.media.id);
                        $('#imagevedit').attr('src' , response.media.image);
                        $('#imagenedit').val(response.media.image);
                        $('#titlevedit').val(response.media.title);
                        $('#namevedit').val(response.media.name);
                        $('#descriptionvedit').val(response.media.description);
                        $('#altvedit').val(response.media.alt);
                        $('#idvedit').val(id);
                        
                    }
                });

            });
        });
 


    </script>
 
    
    

    
    @endsection
    
    
    
    
    
    
    