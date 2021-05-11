@if ($message = Session::get('success'))
    <strong>{{ $message }}</strong>
@endif

@if ($message = Session::get('occupied'))
    <strong>{{ $message }}</strong>
@endif

@if ($errors->any())
    <strong>Username must be between 5 - 15 character.</strong><br>
    <strong>Password must be at least 8 character.</strong>
@endif

