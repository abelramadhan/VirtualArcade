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
    <div class="box-register">
        <table cellpadding='5px'>
            <form action="post">
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
                <td style="padding: 0px;"><input class="showPass" type="checkbox" onclick="showPassword()"><span class="uwawa">Show Password<span></td>
            </tr>
            <tr>
                <td align="right"><button class="submit-button" type="submit">REGISTER</button></td>
            </tr>
            </form>
        </table>
    </div>
    
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