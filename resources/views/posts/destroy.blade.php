@extends('layouts.app')
@section('content')

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Are you sure  to delete ? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form hidden id="delete_form" action="{{rout('posts.index',$post->id)}}" method="POST"> 
        @csrf
        @method('DELETE')
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  form="delete_form" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection