@if(Session::has("success"))
    <p>{{ Session::get('success') }}</p>
@endif
@if(Session::has("error"))
    <p>{{ Session::get('error') }}</p>
@endif