

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <a href="{{route('categories.create')}}" class="btn btn-primary">Add</a>
<table class="table table-bordered">
  <tr>
    <th>Name</th>
    <th>Slug</th>
    <th>Action</th>
  </tr>
  @foreach($categories as $data)
  <tr>

    <td>{{$data->name}}</td>
    <td>{{$data->slug}}</td>
    <td>
        <a href="{{route('categories.edit', $data->id)}}" class="btn btn-primary">Edit</a>
        <form method="POST" action="{{route('categories.destroy',$data->id)}}">
       @csrf
       @method('DELETE')
           <button type="submit" class="btn btn-danger">Delete</button>
       </form>   
    </td>

  </tr>
@endforeach
  
</table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>