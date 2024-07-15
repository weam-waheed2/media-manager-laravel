<div class="tab-pane fade" id="pills-cropped" role="tabpanel"
                                aria-labelledby="pills-cropped-tab" tabindex="0">
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
                                                <div class="row" id="tbody">
                                                    @if (isset($mediacrop) && !empty($mediacrop))
                                                        @forelse ($mediacrop as $key => $imgcrop)
                                                        @if($imgcrop->base64 !== null)
                                                            <div class="col-xl-2 py-2 record"
                                                                data-image-id='{{ $imgcrop->id }}'>
                                                                <div class="border-image-manager menu-link" id="id1" >
                                                                    <img class="editbtncrop"
                                                                        data-id="{{ $imgcrop->id }}"
                                                                        src="{{ $imgcrop->base64 }}"
                                                                        width="100%"
                                                                        style="border-radius:0;padding:0"
                                                                        value="{{ $imgcrop->id }}">

                                                                    <div class="action-media">
                                                                        <!--<button type="button" class="selectbtn select btn-media"-->
                                                                        <!--    value="{{ $imgcrop->id }}">select</button>-->
                                                                        <!--<button type="button" class="editbtn btn-media"-->
                                                                        <!--    value="{{ $imgcrop->id }}"><i-->
                                                                        <!--        class="fa-solid fa-pen"></i></button>-->
                                                                        <!--<a href="{{route('media.edit',$imgcrop->id)}}" style="padding: 6px 10px;" target="blank" class="editbtn btn-media"><i class="fa-solid fa-pen"></i></a>-->
                                                                        <button type="button" class="deletebtn btn-media"
                                                                            value="{{ $imgcrop->id }}"
                                                                            id="{{ $imgcrop->id }}"><i
                                                                                class="fa-solid fa-trash"></i></button>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        @endif
                                                        @empty
                                                            <h5 class="text-center text-danger">
                                                                image Not Found
                                                            </h5>
                                                        @endforelse
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3">
                                            <div class="my-4">
                                                <form action="" class="p-3"
                                                    method="POST" id="form-edit"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" id="ideditcrop"
                                                        value="">
                                                    <div class="my-2 record my-2">
                                                        <div  class="border-image-manager shadow" style="height:200px">
                                                            <img src="" id="imageseditcrop" width="100%" style="height:200px" alt="select image">
                                                        </div>
                            
                                                    </div>
                                                    <label class="title-form" for="name">name</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="name" id="nameeditcrop">
                                                    <label class="title-form" for="title">title</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="title" id="titleeditcrop">
                                                    <label class="title-form"
                                                        for="description">description</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="description" id="descriptioneditcrop">
                                                    <label class="title-form" for="alt">alt</label>
                                                    <input class="form-input" type="text" value=""
                                                        name="alt" id="alteditcrop">
                                                    <div class="text-center">
                                                    <button type="button" class="selectbtn selectbtnimagecrop selectimg select btn-media"
                                                        value="" style="background-color: #32b168;padding: 7px 15px;border-radius: 7px;font-size: 13px;" data-id="">select</button>
                                                    <a href="" class="btn-all btn-view viewimgcrop" target="blank">view</a>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>