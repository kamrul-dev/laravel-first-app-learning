<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is contact page for routing test</h1>
    <a href="{{url('/')}}">Back to Home</a> <br>

    <form action="{{route('student.store')}}" method="POST">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="text" name="name" placeholder="Enter Name"> <br> <br>
        <input type="email" name="email" placeholder="Enter email"> <br> <br>
        <button type="submit">submit</button>
    </form>


</body>
</html>