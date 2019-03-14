@extends('layouts.app')
@section('content')


<h1>hello</h1>
<a  class="btn btn-primary" href="/posts/create"> Create Post </a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">descriptiont</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post )
     <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->created_at}}</td>
        <td>
            <a  class="btn btn-info" href="/posts/create"> View </a>
            <a  class="btn btn-primary" href="/posts/{{$post->id}}/edit"> Edit </a>
            <a  class="btn btn-danger" href="/posts/create"> Delete </a>
        </td>
        </tr>
      @endforeach

  </tbody>
</table>


endsection