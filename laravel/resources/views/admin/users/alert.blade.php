@if(Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            {{Session::get('error')}}
        </ul>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        <ul>
            {{Session::get('success')}}
        </ul>
    </div>
@endif
