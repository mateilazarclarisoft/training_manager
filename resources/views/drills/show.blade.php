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
                @if (!@empty($drill->description))
                     {!! $drill->description !!}<br />
                @endif        
                {!!  $drill->link  !!}
            </div>
        </div>
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