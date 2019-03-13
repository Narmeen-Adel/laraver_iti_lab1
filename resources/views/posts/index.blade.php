@extends('layouts.app')
@section('content')


<h1>hello</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">descriptiont</th>
      <th scope="col">user</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post )
     <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->user->name}}</td>
        </tr>
      @endforeach

  </tbody>
</table>


endsection