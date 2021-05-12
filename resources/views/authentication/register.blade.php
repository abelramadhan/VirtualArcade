<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,700&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body display>
    <div>
        <a href="./"><h1 class="title">VIRTUAL<br>ARCADE</h1></a>
        <h2 class="info">Register an Account</h2>
    </div>
    <div class="box-auth">
        <table cellpadding='5px'>
            @include('flash-message')
            <form action="{{ route('validate.user') }}" method='post'>
            @csrf
            <tr>
                <td>USERNAME</td>
            </tr>
            <tr class="forminput">
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
            </tr>
            <tr class="forminput">
                <td><input type="password" name="password" id="inputPassword"></td>
            </tr>
            <tr>
                <td class="bottom-row">
                    <div class="showPass">
                        <input style="margin: 0px 10px 0px 0px" type="checkbox" onclick="showPassword()">
                        <h3>Show Password</h3>
                    </div>
                    <button class="submit-button" type="submit">REGISTER</button>
                </td>
            </tr>
            </form>
        </table>
    </div>
    <a class="link" href="./login">already have an account? click here to login</a>
    
    <script>
        function showPassword() {
        var x = document.getElementById("inputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
</body>
</html>