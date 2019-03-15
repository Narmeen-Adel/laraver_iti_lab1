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
      <th scope="col">Slug</th>
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
        <td>{{$post->slug}}</td>

       
        <td>
            <a  class="btn btn-info" href="{{route('posts.show',$post->id)}}"> View </a>
            <a  class="btn btn-primary" href="{{route('posts.edit',$post->id)}}"> Edit </a>
            <form id="delete_form" action="{{route('posts.destroy',$post->id)}}" method="POST"> 
              @csrf
              @method('DELETE')
              <button onclick="return confirm('you want to delete')" type="submit"  form="delete_form" class="btn btn-danger">Delete</button>
           </form>
          
        </td>
        </tr>
      @endforeach

  </tbody>
</table>
{{ $posts->links()}}


@endsection