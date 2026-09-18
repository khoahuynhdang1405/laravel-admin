<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Khoa Huynh Dev')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #ffffff;
        }
        /* Header / Navbar */
        header {
            background-color: #0d6efd; /* Màu xanh dương */
            color: #ffffff;
            padding: 14px 40px;
            font-size: 18px;
            font-weight: 500;
        }
        /* Main Content */
        main {
            flex: 1;
            padding: 60px 40px 40px;
        }
        /* Footer */
        footer {
            background-color: #f8f9fa; /* Màu xám nhạt */
            color: #6c757d;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body>

    @include('layouts.header')

    <!-- Nội dung thay đổi động -->
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>
