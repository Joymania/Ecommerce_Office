<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand">
            @if(!empty($logo))
            <a href="{{ route('admin.dashboard') }}"><img src="{{ asset($logo->image) }}" alt="Lucid Logo"
                    class="img-responsive logo" style=" max-width:200px; max-height:50px; "></a>
            @else
            <a href="{{--{{route('dashboard.ecommerce')}}--}}"><img src="{{ asset('assets/img/logo.svg') }}"
                    alt="Lucid Logo" class="img-responsive logo"></a>
            @endif
        </div>

        <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form>

            <a href="/" class="btn btn-primary mt-2 ml-5"><i class="fa fa-shopping-bag"></i><span> Visit shop</span></a>

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="">{{session('admin')->unreadNotifications->count() }}</span>
                        </a>

                        <ul style="max-height:400px; overflow:scroll;" class="dropdown-menu notifications bg-light">
                            {{-- {{dd(session('admin')->unreadNotifications)}} --}}

                            <li class="header"><strong>You have {{ session('admin')->unreadNotifications->count() }} new
                                    Notifications</strong></li>
                            @foreach (session('admin')->unreadNotifications as $notification)
                            {{-- <form id="formsubmit" action="{{ route('notifynav.details', $notification->data['notify_order'])}}"
                            method="post">
                            @csrf --}}

                            <li>
                                <a class="fromancor"
                                    href="{{ route('notifynav.details',[$notification->id,$notification->data['notify_order']])}}">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-info text-warning"></i>
                                        </div>
                                        <div id="navnotify" data-pro_id={{$notification->data['notify_order']}}
                                            data-id={{$notification->id}} class="media-body">
                                            <p class="text"><strong>{{ $notification->data['name'] }}</strong>
                                                {{ $notification->data['text'] }} </p>
                                            <span class="timestamp">{{ $notification->created_at }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            {{-- // </form> --}}

                            @endforeach


                            <li class="footer"><a href="{{ route('markasRead') }}" class="more">Mark all as Read</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('admin.logout')}}" class="icon-menu"><i class="icon-login"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</nav>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
            $(document).on('click', '#navnotify', function(e){
                e.preventDefault();
                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                var iiid = $(this).attr('data-id');
                var pro_id=$(this).attr('data-pro_id');
                var url="{{url('/order/notifi/details')}}";
// alert(url)
// alert(iiid)
// alert(pro_id)
$.ajax({
url:'/admin/order/notifi/details',
method:'GET',
data:{iiid:iiid,pro_id:pro_id},
success: function(data){
console.log(data);
},
error: function(error){
console.log(error);
}
})

});
});
</script> --}}
<script>
    $(document).ready(function() {
    $(document).on('click', '#navnotify', function(e){

        var aa=$(this).find('a.fromancor');
        //console.log(aa);

    })
    });

</script>
