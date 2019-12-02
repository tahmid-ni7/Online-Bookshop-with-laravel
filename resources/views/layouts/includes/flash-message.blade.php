{{--
* All Flash Message here
--}}
@if(session('logout_message'))
    <div class="alert alert-info">
        <div class="container">
            {{session('logout_message')}}
        </div>
    </div>
@endif
@if(session('success_message'))
    <div class="alert alert-info">{{session('success_message')}}</div>
@endif

@if(session('alert_message'))
    <div class="alert alert-danger">{{session('alert_message')}}</div>
@endif
