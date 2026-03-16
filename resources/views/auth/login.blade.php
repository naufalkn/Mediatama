<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>MEDIATAMA</p>
    <form action="{{ route('proseslogin') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="username" id="username"> <br>
        <input type="password" name="password" id="password"> <br>
        <button type="submit">Login</button>

        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </form>
</body>
</html>