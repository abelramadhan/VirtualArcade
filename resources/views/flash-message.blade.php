@if ($message = Session::get('success'))
    <strong>{{ $message }}</strong>
@endif

@if ($message = Session::get('occupied'))
    <tr>
        <td class="flash">
            <strong>{{ $message }}</strong>
        </td>
    </tr>
@endif

@if ($errors->any())
    <tr>
        <td class="flash">
            <strong>Username must be between 5 - 15 character.</strong>
            <strong>Password must be at least 8 character.</strong>
        </td>
    </tr>
@endif

