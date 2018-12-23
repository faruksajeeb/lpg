
@extends('admin.dashboard')

@section('content')
<div class="row">
    @if ($message = Session::get('msg'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif
    <div class="col-md-4">
        <img src="{{ asset($image->image_url) }}" width="500" style="border:20px solid #FFF;" class="img-responsive" alt="Image Here">  
    </div>
    <div class="col-md-8 padding-left-0">
        <h3 class="margin-top-0"><a href="javascript:void(0);"> {{ $image->image_name }} </a><br>
            <small class="font-xs"><i>Status:  <a href="javascript:void(0);">{{ $image->publication_status=='1'? "Published":"Unpublished" }}</a></i></small></h3>
        <p>
           {{ $image->description }}
        </p>
         <a class="btn btn-primary" href="{{url('/manage-gallery')}}"><< Back</a>
        
        <a class="btn btn-warning"  href="{{ url('/edit-galllery-image/'.$image->id)}}"> Edit </a>
        @if($image->publication_status=='0')
             <a class="btn btn-success" href="{{ url('/update-publication-status/publish/'.$image->id)}}"> Publish </a>
        @else
            <a class="btn btn-danger" href="{{ url('/update-publication-status/unpublish/'.$image->id)}}"> UnPublish </a>
        @endif
    </div>
</div>
@endsection