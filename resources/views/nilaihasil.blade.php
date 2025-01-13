<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar .links {
            display: flex;
            gap: 15px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .navbar a.active {
            color: red;
        }

        .logo {
            background: url('../images/logo.jpg') center/cover no-repeat;
            width: 100px;
            height: 40px;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo"></div>
        <div class="links">
            <a href="#">Dashboard</a>
            <a href="#">Product</a>
            <a href="#">Orders</a>
            <a href="#" class="active">Input Data</a>
        </div>
        <div class="profile">
            <img src="images/profile.jpg" alt="Profile Picture">
        </div>
    </div>
    <div class="container">
        <h1>Hasil Perhitungan</h1>
        <h2>kontral kuliah</h2>
        <h3>kehadiran = 20 %</h3>
        <h3>Tugas = 30 %</h3>
        <h3>Project</h3>
        <h4>-Respon1 = 5%</h4>
        <h4>-Respon2 = 5%</h4>
        <h4>-Respon3 = 10%</h4>
        <h4>-Respon4 = 15%</h4>
        <h4>-Respon5 = 15%</h4>

        <table>
            <thead>
                <tr>
                    <th>Hadir</th>
                    <th>Tugas</th>
                    <th>Project</th>
                    <th>Total</th>
                    <th>Huruf</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($input as $data)
                    <tr>
                        <td>{{ $data->kehadiran }}</td>
                        <td>{{ $data->tugas }}</td>
                        <td>{{ $data->project }}</td>
                        <td>{{ $data->total }}</td>
                        <td>{{ $data->huruf }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
