@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Session</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sessions.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $session->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tag:</strong>
                {{ $session->tag->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">                
                @if ($drills->count() == 0)
                    <form action="{{ route('sessions.generate',$session->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </form>
                @else
                    
                    <form action="{{ route('sessions.regenerate',$session->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Regenerate</button>                        
                    </form>
                    <br />
                    <strong>Drills:</strong>
                    <br />

                    @include('sessions/order_list')

                    <br />
                    <a class="btn btn-success" href="{{ route('session_drills.add_to_session',[$session->id]) }}"> Add Drill</a>                 
                    
                       
                    
                @endif
                
            </div>
        </div>
    </div>
@endsection
