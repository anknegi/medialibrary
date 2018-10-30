@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row">
        @if(session()->has('error')) 
            <div class="alert alert-danger"> {{ session()->get('error') }} </div>
        @endif

    <form action="{{ route('avatar.store') }}" method="post" enctype="multipart/form-data" >
    @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
            <div class="custom-file">
                <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>

            <input type="submit" class="btn btn-sucess ml-4" value="Upload">
            </div>
    </form>
    </div>
 </div>
 <div class="card-columns">
 @foreach ( $avatars as $avatar )
  <div class="card">
    <img class="card-img-top" src="{{ $avatar->getUrl('card') }}"  alt="Card image cap">
    <div class="card-body">
        <div class="float-left">
            <a href="#" class="fa fa-check fa-2x" aria-hidden="true" onclick="event.preventDefault();document.getElementById('selectForm(( $avatar->id )).submit()"></a>
            
            <form action="{{ route('avatar.update', auth()->id()) }}" style="display:none" id="selectForm{{$avatar->id}}" method="post">
                @csrf 
                @method('put')

                <input type="hidden" type="submit">                
            </form>
            <a href="" class="fa fa-trash-o fa-2x" aria-hidden="true"></a>          
        </div>
        <div class="float-right">           
            <a href="" class="fa fa-eye fa-2x" aria-hidden="true"></a>
            <a href="" class="fa fa-download fa-2x" aria-hidden="true"></a>
        </div>
    </div>
  </div>
  
  @endforeach
 
</div>

@endsection