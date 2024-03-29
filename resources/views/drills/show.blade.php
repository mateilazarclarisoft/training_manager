@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $drill->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('drills.index') }}"> Back</a>
                <a class="btn btn-primary" href="{{ route('drills.edit',$drill->id) }}"> Edit</a>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <br />
                @if (!@empty($drill->description))
                     {!! $drill->description !!}<br />
                @endif        
                {!!  $drill->link  !!}
            </div>
        </div>
        @if (!@empty($drill->video))
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Video:</strong>
                <br />                
                <video width="320" height="240" controls>
                    <source src="/{!!  $drill->video  !!}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>        
                
            </div>
        </div>
        @endif 
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tags:</strong>
                @foreach ($tags as $tag)
                <a href="{{ route('tags.show',$tag->id) }}"><span class="label label-info">#{{ $tag->name }}</span></a>
                @endforeach

            </div>
        </div>
    </div>
@endsection