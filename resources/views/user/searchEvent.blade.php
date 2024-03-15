@foreach ($events as $event)
<div class="col-lg-4 col-md-6">
    <div class="speaker">
      <img src="img/speakers/1.jpg" alt="Speaker 1" class="img-fluid">
      <div class="details">
        <h3><a href="/details/{{$event->id}}">{{$event->title}}</a></h3>
        <p>{{$event->description}}</p>
        <div class="social">
          <a href=""><i class="fa fa-twitter"></i></a>
          <a href=""><i class="fa fa-facebook"></i></a>
          <a href=""><i class="fa fa-google-plus"></i></a>
          <a href=""><i class="fa fa-linkedin"></i></a>
        </div>
      </div>
    </div>
  </div>

@endforeach
