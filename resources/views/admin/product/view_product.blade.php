
@extends('admin.dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
        <img src="{{ asset($product->product_pic) }}" class="img-responsive" alt="img">
        <ul class="list-inline padding-10">
            <li>
                <i class="fa fa-calendar"></i>
                <a href="javascript:void(0);"> March 12, 2015 </a>
            </li>
            <li>
                <i class="fa fa-comments"></i>
                <a href="javascript:void(0);"> 38 Comments </a>
            </li>
        </ul>
    </div>
    <div class="col-md-8 padding-left-0">
        <h3 class="margin-top-0"><a href="javascript:void(0);"> {{ $product->product_name }} </a><br>
            <small class="font-xs"><i>Price <a href="javascript:void(0);">{{ $product->price }}</a></i></small></h3>
            <small class="font-xs"><i>Status:  <a href="javascript:void(0);">
                
                        <?php 
                                echo $product->publication_status=='1'? 
                                        " <span class='label label-success'>Published</span>":
                                        " <span class='label label-danger'>Unpublished </span>" 
                                ?> 
                </a></i></small></h3>
        <p>
            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. 

            <br><br>Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.
            <br><br>
        </p>
         <a class="btn btn-primary" href="{{url('/manage-product')}}"><< Back</a>
        
        <a class="btn btn-warning"  href="{{ url('/edit-product/'.$product->id)}}"> Edit </a>
        @if($product->publication_status=='0')
             <a class="btn btn-success" href="{{ url('/update-product-status/publish/'.$product->id)}}"> Publish </a>
        @else
            <a class="btn btn-danger" href="{{ url('/update-product-status/unpublish/'.$product->id)}}"> UnPublish </a>
        @endif
    </div>
</div>
@endsection