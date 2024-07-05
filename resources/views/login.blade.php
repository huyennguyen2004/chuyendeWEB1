<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: lightgreen;
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h3>Đăng Nhập</h3>
        @if(session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('site.dologin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Tên Đăng Nhập hoặc Email</label>
                <input type="text" name="username" id="username" class="form-control"
                    placeholder="Tên đăng nhập hoặc Email" required autocomplete="username">
            </div>
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu"
                        required autocomplete="current-password">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePasswordVisibility()">
                            <i class="fa fa-eye" id="togglePasswordIcon"></i>
                        </span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const togglePasswordIcon = document.getElementById('togglePasswordIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePasswordIcon.classList.remove('fa-eye');
                togglePasswordIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                togglePasswordIcon.classList.remove('fa-eye-slash');
                togglePasswordIcon.classList.add('fa-eye');
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
</body>

</html>