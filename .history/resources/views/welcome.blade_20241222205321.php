<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Buttons</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }
        .login-buttons {
            text-align: center;
        }
        .login-buttons .btn {
            width: 200px;
            margin: 10px 0;
            border-radius: 30px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .btn-admin {
            background-color: #007bff;
            color: #fff;
        }
        .btn-teachers {
            background-color: #28a745;
            color: #fff;
        }
        .btn-staff {
            background-color: #ffc107;
            color: #212529;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="login-buttons">
        <button class="btn btn-admin">Admin Login</button>
        <button class="btn btn-teachers">Teachers Login</button>
        <button class="btn btn-staff">Staff Login</button>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
