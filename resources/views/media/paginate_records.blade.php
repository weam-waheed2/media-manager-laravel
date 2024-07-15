@if (isset($media) && !empty($media))
    @foreach ($media as $key => $img)
        <div class="col-xl-2 py-2 record"
            data-image-id='{{ $img->id }}'>
            <div class="border-image-manager menu-link" id="id1" >
                <img class="editbtn"
                    data-id="{{ $img->id }}"
                    src="{{ $img->image }}"
                    width="100%"
                    style="border-radius:0;padding:0"
                    value="{{ $img->id }}">

                <div class="action-media">
                    <button type="button" class="deletebtn btn-media"
                        value="{{ $img->id }}"
                        id="{{ $img->id }}"><i
                            class="fa-solid fa-trash"></i></button>
                    <a href="{{route('media.edit',$img->id)}}" style="padding: 6px 10px;" target="blank" class="editbtn btn-media"><i class="fa-solid fa-pen"></i></a>
                </div>

            </div>

        </div>
    @endforeach
@endif
{!! $media->links() !!}



<script>
    
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

</script>