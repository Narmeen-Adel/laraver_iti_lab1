@extends('layouts.app')
@section('content')


<form method="POST" action="{{route('posts.update',$post->id)}}"> 
@csrf
@method('PUT')
<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="form-group">
    <label for="exampleInputEmail1">title</label>
    <input  value="{{$post->title}}" name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">description</label>
    <input  value="{{$post->description}}" name="description" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <select name="user_id" value>
    <option  selected value="{{$post->user->id}}">{{$post->user->name}}</option>
    @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


endsection