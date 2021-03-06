@extends('layouts.app') 

@section('title', $album->name) 

@section('content') 

<div class="row"> 
<div class="col-sm-3"> 
    @if ($album->cover != '') 
        <img class="img-responsive" src="/img/album/default.jpg"> 
    @else
        <img class="img-responsive" src="/img/default.jpg"> 
    @endif 
</div> 
<div class="col-sm-9"> 
    <h2> {{ $album->name }} </h2> 
    @if ( $album->intro == '')
    <p> no intro </p> 
    @else 
    <p> {{ $album->intro }}</p> 
    @endif 


    <button type="button" class="btn btn-primary"> 
    upload Photo 
    </button > 

    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editAlbum"> 
    Edit Album 
    </button> 

    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAlbum"> 
        Delete Album 
        </button > 

</div> 
</div> 

<div class="modal fade" id="editAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Album</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="{{ route('albums.update', $album->id) }}" method="post"  enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Album name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required value="{{ $album->name }}">
              </div>
            </div>
            <div class="form-group">
              <label for="intro" class="col-sm-2 control-label">Album introduction</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="intro" name="intro" value="{{ $album->intro }}">
              </div>
            </div>

            <!-- 封面图片上传接口 -->

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>





<!-- 删除相册: 弹出 --> 

<div class="modal fade" id="deleteAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Do you want to delete this album?</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('albums.destroy', $album->id) }}" method="post" style="display: inline-block;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">Dlete</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>








@endsection