<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        .navbar .logo {
            background: url('../images/logo.jpg') center/cover no-repeat;
            padding: 20px 60px;
        }

        .navbar a.active {
            color: red;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-group {
            width: 48%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo"></div>
        <div>
            <a href="#">Dashboard</a>
            <a href="#">Product</a>
            <a href="#">Orders</a>
            <a href="#" class="active">Input Data</a>
        </div>
        <div class="profile">
            <img src="images/profile.jpg" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
        </div>
    </div>
    <div class="container">
        <h1>Input Data</h1>
        <form action="{{ route('input.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Tambahkan untuk Laravel CSRF Protection -->
            <div class="row">
                <div class="form-group">
                    <label for="kehadiran">Kehadiran</label>
                    <input type="number" id="kehadiran" name="kehadiran" min="0" max="100" required>
                </div>
                <div class="form-group"></div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="tugas1">Tugas 1</label>
                    <input type="number" id="tugas1" name="tugas1" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="tugas4">Tugas 4</label>
                    <input type="number" id="tugas4" name="tugas4" min="0" max="100" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="tugas2">Tugas 2</label>
                    <input type="number" id="tugas2" name="tugas2" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="tugas5">Tugas 5</label>
                    <input type="number" id="tugas5" name="tugas5" min="0" max="100" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="tugas3">Tugas 3</label>
                    <input type="number" id="tugas3" name="tugas3" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="tugas6">Tugas 6</label>
                    <input type="number" id="tugas6" name="tugas6" min="0" max="100" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="respon1">Respon 1</label>
                    <select id="respon1" name="respon1" required>
                        <option value="0">0</option>
                        <option value="10">100</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="respon4">Respon 4</label>
                    <select id="respon4" name="respon4" required>
                        <option value="0">0</option>
                        <option value="10">100</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="respon2">Respon 2</label>
                    <select id="respon2" name="respon2" required>
                        <option value="0">0</option>
                        <option value="10">100</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="respon5">Respon 5</label>
                    <select id="respon5" name="respon5" required>
                        <option value="0">0</option>
                        <option value="10">100</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="respon3">Respon 3</label>
                    <select id="respon3" name="respon3" required>
                        <option value="0">0</option>
                        <option value="10">100</option>
                    </select>
                </div>
                <div class="form-group"></div>
            </div>
            <button type="submit">Hitung</button>
        </form>
    </div>
</body>

</html>
