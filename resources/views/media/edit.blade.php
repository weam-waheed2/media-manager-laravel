@extends('layouts.dashboard')

@section('content')
 <!--Normalize CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 <!--Cropper CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
 <!--Cropper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>

<script src="{{env('PUBLIC_SITE') .'js/rcrop.min.js'}}"></script>
<link href="{{env('PUBLIC_SITE') .'css/rcrop.min.css'}}" media="screen" rel="stylesheet" type="text/css">


    <div class="container-fluid">
        <div class="row">
    
    
                
                
                {{-- data of media image --}}
                <div class="col-xl-6">            
                    <form action="{{route('media.update',$media->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <h5 class="title-page pt-2"><i class="fa-solid fa-newspaper mr-2"></i> edit image</h5>
                        <div class="bg-card px-4 py-1 mt-2">
                            <div class="my-3 text-center">
                                <img class="image-previewer" src="{{$media->image}}" width="50%">
                            </div>
                            <div class="my-3">
                                <label class="title-form" for="title">title :</label>
                                <input name="title" type="text" id="title" class="form-input" placeholder="title"
                                    value="{{ $media->title }}">
                            </div>
                            <div class="my-3">
                                <label class="title-form" for="name">name :</label>
                                <input name="name" type="text" id="name" class="form-input" placeholder="name"
                                    value="{{ $media->name }}">
                            </div>
                            <div class="my-3">
                                <label class="title-form" for="description">description :</label>
                                <input name="description" type="text" id="description" class="form-input" placeholder="description"
                                    value="{{ $media->description }}">
                            </div>
                            <div class="my-3">
                                <label class="title-form" for="alt">alt :</label>
                                <input name="alt" type="text" id="alt" class="form-input" placeholder="alt"
                                    value="{{ $media->alt }}">
                            </div>
                            
                            <div class="text-center my-3">
                                <button type="submit" class="btn-all btn-add">update</button>
                            </div>
                        </div>
                    </form>  
                </div>
               
            
                <div class="col-xl-6">
                    <h5 class="title-page pt-2"><i class="fa-solid fa-crop-simple mr-2"></i> crop image</h5>
                    <div class="bg-card px-4 py-1 mt-2">
 
                        <form action="" method="POST" id="image-upload" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-12 py-3 text-center">
                                        <h5 class="title-page"><i class="fa-solid fa-newspaper mr-2"></i> crop image</h5>
                                    </div>
                                    <div class="col-xl-6 bg-card py-1 px-4">
                                        <div class="border-image-manager shadow result" style="height:100%">
                                            <img src="{{ $media->image }}" class="image-3" style="height:100%" width="100%" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div id="border-image-manager shadow">
                                            <img src="" class="myImg" alt="" width="100%">
                                            <input type="text" hidden class="form-input" id="input" value="" name="image">
                                            
                                        </div>
                                    </div>
                    
                    
                                    <div class="mt-4">
                                        <div class="row mt-3 mb-3">
                                            <div class="col-xl-6">
                                                <h5 class="title-page pt-2">resize manually</h5>
                                            </div>
                                            <div class="col-xl-6 text-end">
                                                <button id="update" type="button" class="btn-all btn-edit">resize</button>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="title-form" for="width">width :</label>
                                            <input type="text" id="width" class="form-input" placeholder="width">
                                        </div>
                                        <div>
                                            <label class="title-form" for="height">height :</label>
                                            <input type="text" id="height" class="form-input" placeholder="height">
                                        </div>
                                        <div>
                                            <label class="title-form" for="x">x :</label>
                                            <input type="text" id="x" class="form-input" placeholder="x">
                                        </div>
                                        <div>
                                            <label class="title-form" for="y">y :</label>
                                            <input type="text" id="y" class="form-input" placeholder="y">
                                        </div>
                                    </div>
                    
                    
                                    <div class="text-center my-3">
                                        <button type="submit" class="btn-all btn-add">crop</button>
                                        <a href="" class="btn-all btn-add" id="download" download>download</a>
                                    </div>
                    
                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
    
    

    <script>
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
                $('#input').attr('value' , srcOriginal);
                $('#download').attr('href' , srcOriginal);
            });




        });
        
        
        $('#image-upload').submit(function(e) {
          e.preventDefault();
          let formData = new FormData(this);
           
              $.ajax({
                url: '{{ route('media.store_crop') }}',
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
    </script>
    

@endsection