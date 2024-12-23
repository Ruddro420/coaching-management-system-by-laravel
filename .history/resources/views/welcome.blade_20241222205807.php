<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
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
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-buttons {
            text-align: center;
            padding: 20px;
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
        .btn-register {
            background-color: #6c757d;
            color: #fff;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="card p-4">
        <h3 class="text-center mb-4">Welcome</h3>
        <div class="login-buttons">
            <a href="/login" class="btn btn-admin">Admin Login</a>
            <a href="/dashboard/class/add" class="btn btn-teachers">Teachers Login</a>
            <a href="/staff-login" class="btn btn-staff">Staff Login</a>
            <a href="/register" class="btn btn-register">Register</a>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
