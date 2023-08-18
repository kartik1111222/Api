<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
           <form action="{{route('login_check')}}" method="POST">
            @csrf
            Name:
            <input type="email" name="email" class="form-control"><br>

            Password:
            <input type="password" name="password" class="form-control"><br>

            <button type="submit">Login</button>
           </form>
        </div>

      </div>

    </div>
</body>
</html>