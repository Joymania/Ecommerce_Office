$(document).ready(function () {
 $(document).on('click','.productSizeContent',function (e) {
     $('.productSizeContent').css('border-color','white');
     $(this).css({
         'border-color' : 'red'
     });
     e.preventDefault();
 })
});

$(document).ready(function () {
    $(document).on('click','.colorLi',function () {
        const colorId = $(this).attr('data-id');
        $("#colorInput").val($(this).attr("data-id"));
        $("#colorPtag").attr('hidden',false);
        $("#color_desc").text($(this).attr("data-desc"));
        $('.subImage[data-id='+colorId+']').click();
    });
});

$(document).ready(function () {
    $(document).on('click','.sizeLi',function () {
        let size_desc = $('#size_desc');
        $("#sizeInput").val($(this).attr("data-id"));
        $('#sizePtag').attr('hidden',false);
        size_desc.text($(this).attr('data-desc'))
    })

});

let flag = 0;

$(document).ready(function () {
    $(document).on('submit','#addToCartForm',function (e) {
        if ($('#colorInput').val() === '')
        {
            flag = 1;
            e.preventDefault();
            alert("You have to select a Color");
        }else{
            flag = 0;
        }
        if ($('#sizeInput').val() === ''){
            flag = 1;
            e.preventDefault();
            alert("You have to select a Size");
        }else{
            flag = 0;
        }
    });
});

$(document).ready(function (e) {
    $('.single-ratting-star').on('click',function () {
        $('.single-ratting-star').children().css('color','#535353');
        $(this).children().css('color','#f5b223')
        $('#rating').val($(this).children().length);
    });
});


