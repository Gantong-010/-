<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .background-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: white;
        width: 30%;
        border-radius: 8px;
        padding: 3%;
        margin: auto;
        margin-top: 5%;
    }
</style>

<body
    style="height: 100%; width: 100%; background-size: cover; background-image: url('/image/bgrice.jpg');  min-height: 100dvh; padding-top: 8rem;">
    <div class="text-center title-container" style="display: flex; align-items: center; justify-content: center;">
        <img src="\image\โปรไฟล์.jpg" alt="Logo" class="rounded-circle"
            style="width: 100px; height: 100px; margin-bottom: 1rem;">
        <h1 style="margin-left: 10px;">ระบบคัดเมล็ดพันธุ์ข้าวออนไลน์ </h1>
    </div>
    {{-- @include('register.include.header') --}}
    <div class="background-container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
