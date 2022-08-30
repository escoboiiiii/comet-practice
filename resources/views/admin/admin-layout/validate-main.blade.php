@if (Session::has('danger-main'))
    <p class="alert alert-danger">{{ Session::get('danger-main') }}</p>
@endif
@if (Session::has('success-main'))
    <p class="alert alert-success">{{ Session::get('success-main') }}</p>
@endif