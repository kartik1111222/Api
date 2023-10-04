<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="{{route('admin.role.store')}}" method="POST">
                    @csrf   
                    <h2>Add Role:</h2>
                       @foreach($users as $user)
                       <label for="name"> Select Name:</label>

                       <select name="name" id="name" class="form-control">
                        <option value="{{$user->name}}">{{$user->name}}</option>
                       </select><br>
                       @endforeach
                    
                       
                       <label for="name">Select Permission:</label>
                        @foreach($permissions as $val)
                         <input type="checkbox" id="vehicle1" name="permission[]" value="{{$val->name}}" >
                         <label for="vehicle1">{{$val->name}}</label><br>

                        @endforeach

                        <button type="submit" class="btn btn-block btn-primary ">Add</button>

                </form>
            </div>

        </div>

    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>