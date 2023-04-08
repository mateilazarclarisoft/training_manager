@extends('layout')

@push('head')
<script src="{{ asset('js/search.js') }}"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <form action="{{ url("session_drills/search/{$sessionId}") }}" method="GET">
                    @include('session_drills/search')
                </form>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br />
    <form action="{{ route('session_drills.store') }}" method="POST">
        @csrf
        <input type="hidden" name="sessionId" value="{{ $sessionId }}" />
       
        @include('session_drills/drills')
       
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">Add drill</button>
        </div>
    </form>
    {{ $drills->links() }}


@endsection