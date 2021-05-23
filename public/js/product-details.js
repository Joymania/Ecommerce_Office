$(document).ready(function () {
 $('.productSizeContent').on('click',function (e) {
     $('.productSizeContent').css('border-color','white');
     $(this).css({
         'border-color' : 'red'
     });
     e.preventDefault();
 })
});

$(document).ready(function () {
    $(".colorLi").on('click',function () {
        $("#colorInput").val($(this).attr("data-id"));
        $("#colorPtag").attr('hidden',false);
        $("#color_desc").text($(this).attr("data-desc"));
    });
});

$(document).ready(function () {
    $(".sizeLi").on('click',function () {
        let size_desc = $('#size_desc');
        $("#sizeInput").val($(this).attr("data-id"));
        $('#sizePtag').attr('hidden',false);
        size_desc.text($(this).attr('data-desc'))
    })

});

$(document).ready(function () {
    $("#addToCartForm").on('submit',function (e) {
        if ($('#colorInput').val() === '')
        {
            e.preventDefault();
            alert("You have to select a Color");
        }
        if ($('#sizeInput').val() === ''){
            e.preventDefault();
            alert("You have to select a Size");
        }
    });

});

