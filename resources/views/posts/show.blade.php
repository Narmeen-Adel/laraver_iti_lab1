@extends ('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body row">
        <h3 class="card-title col-sm-2 col-form-label">Title:</h3>
        <p class="card-text col-sm-8 col-form-label"> {{$post->title}}</p>
  </div>
  <div class="card-body row">
        <h3 class="card-title col-sm-2 col-form-label">Description:</h3>
        <p class="card-text col-sm-8 col-form-label"> {{$post->description}}</p>
  </div>

</div>  

<div class="card">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body row">
        <h3 class="card-title col-sm-2 col-form-label">Name:</h3>
        <p class="card-text col-sm-8 col-form-label"> {{$post->user->name}}</p>
  </div>
  <div class="card-body row">
        <h3 class="card-title col-sm-2 col-form-label">Email:</h3>
        <p class="card-text col-sm-8 col-form-label"> {{$post->user->email}}</p>
  </div>
  <div class="card-body row">
        <h3 class="card-title col-sm-2 col-form-label">Created At:</h3>
        <p class="card-text col-sm-8 col-form-label"> {{$post->created_at}}</p>
  </div>

</div>  
@endsection