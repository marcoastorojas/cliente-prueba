<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('enviarcorreo')}}" method="post">
        @csrf
        <label for="">Contacto</label> <br>
        <input type="text" name="name" placeholder="name"> <br>
        <input type="email" name="email" placeholder="email"> <br>
        <input type="text" name="subject" placeholder="subject"> <br>
        <textarea name="content" placeholder="content" id="" cols="30" rows="10"></textarea> <br>
        <button type="submit">Enviar</button>
    </form>
    
</body>
</html>
