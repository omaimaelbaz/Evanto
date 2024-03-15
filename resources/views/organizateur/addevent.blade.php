@extends('organizateur.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <form action="/insertevent" method="post" class="needs-validation" novalidate>
                @csrf

              <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title"  required placeholder="Please provide a title">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="description" name="description" required placeholder="Please provide a description">
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="text" class="form-control" id="date" name="date" required placeholder="Please provide a date">
              </div>
              <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" class="form-control" id="location" name="location" required placeholder="Please provide a location">
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required placeholder="Please provide a price">
              </div>

              <div class="mb-3">
                <label for="acceptType" class="form-label">Accept Type:</label>
                <select name="acceptType" id="acceptType" class="form-select selectpicker" data-live-search="true">
                    @foreach ($events as $event)
                    <option value="{{$event->acceptType}}">{{$event->acceptType}}</option>
                    @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select name="category_id" id="category_id" class="form-select selectpicker" data-live-search="true">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="available_seats" class="form-label"> available_seats:</label>
                <input type="text" class="form-control" id="available_seats" name="available_seats" required placeholder="Please provide a description">
              </div>






              <a href="/insertevent"><button type="submit" class="btn btn-primary">Submit</button></a>
            </form>
          </div>
        </div>
      </div>

</body>
</html>





@endsection
