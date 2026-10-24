<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="login-box">
        <h2>Log In</h2>
        <form method="post" action="{{ route('login.login') }}">
            @csrf
            <div class="user-box">
                <input type="text" name="email" required>
                <label>User Name</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button
            >
                Log In
            </button>
        </form>
    </div>


</body>

</html>