



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/jpg" href="../img/money.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Connexion</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .container {
            height: 100%;
            background: linear-gradient(to right, #001F3F, #0099FF);
        }

        .login-form {
            background-color: #fff;
            width: 100%;
            /* Adjust width to 100% for responsiveness */
            max-width: 450px;
            height: 450px;
            border-radius: 15px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .text {
            color: #4f4f4f;
            font-size: 30px;
            font-weight: 700;
            text-align: center;
            line-height: 80px;
            margin-top: 40px;
        }

        .form-item,
        .btn,
        .other {
            margin: 30px auto;
            width: 90%;
        }

        input {
            width: 80%;
            margin-top: 20px;
            padding: 10px;
            border: 0;
            outline: none;
            border-bottom: 1px solid #0099FF;
        }

        input::placeholder {
            font-weight: bold;
            color: #acb7c9;
        }

        input:focus {
            animation: bBottom 2s infinite;
        }

        @keyframes bBottom {
            50% {
                border-bottom: 1px solid #a6c1ee;
            }
        }

        .btn {
            height: 40px;
            width: 200px;
            line-height: 40px;
            color: #fff;
            font-weight: bold;
            border: none;
            text-align: center;
            cursor: pointer;
            border-radius: 10px;
            background: linear-gradient(to right, #001F3F, #0099FF);
            background-size: 200%;
            outline: none;
        }

        .btn:hover {
            animation: btnAnimate 1s infinite;
        }

        @keyframes btnAnimate {
            50% {
                background-position: 100%;
            }
        }

        a {
            text-decoration: none;
            color: #fbc2eb;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .login-form {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <div class="text">Connexion</div>
            <form action="{{ route('connexion') }}" method="POST">
            @csrf
                <div class="form-item">
                    <input type="text" name="username" placeholder="Identifient" value="{{ old('username') }}" required>
                    <input type="password" name="password" placeholder="Mot de passe" value="{{ old('password') }}" required>
                    @if(session('error'))
                    <p style="font-size: 14px;color:red;margin-top:20px;font-weight: 700;">
                        {{ session('error') }}
                    </p>
                    @endif
                </div>
                <button class="btn" name="btnConnecte">Connexion</button>
            </form>
        </div>
    </div>
</body>

</html>