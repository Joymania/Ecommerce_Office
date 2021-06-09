
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
});


$(document).ready(function () {
    let trackBtn = $('#tracking-button');
    let statusDiv = $('#status');

    $(trackBtn).on('click',function (e) {
        e.preventDefault();
        let orderCode = $('#order_code').val();

        if (orderCode.length === 0){
            statusDiv.attr('hidden',false);
            $('#status-text').text('Order Code Cannot Be Empty!');
        }else{

            $.ajax({
                type: 'POST',
                url: '../../tracking',
                data: {order_code: orderCode},
                success: function (data) {

                    let statusText = '';
                    if (data.status == 0){
                        statusText = `Your <b>${orderCode}</b> Order is <span class="badge badge-primary">Pending</span>`
                    }else if(data.status == 1){
                        statusText = `Your <b>${orderCode}</b> Order is <span class="badge badge-warning">Processing</span>`
                    }else if (data.status == 2){
                        statusText = `Your <b>${orderCode}</b> Order is  <span class="badge badge-success">Delivered</span>`
                    }else {
                        statusText = `Your <b>${orderCode}</b> Order not Founded!!!`
                    }

                    statusDiv.attr('hidden',false);
                    $('#status-text').html(`${statusText}`);
                },
                error: function (error) {
                    $('#status-text').text(`Something Went Wrong`);
                }
            })

        }

    })


    $('#closeBtn').on('click',function () {
        statusDiv.attr('hidden',true);
        $('#status-text').html('');
        $('#order_code').val('');
    });
});
