$(document).ready(function () {
 $('.productSizeContent').on('click',function (e) {
     $('.productSizeContent').css('border-color','white');
     $(this).css({
         'border-color' : 'red'
     });
     e.preventDefault();
 })
});
