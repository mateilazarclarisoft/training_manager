@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <form action="{{ url('drills/search') }}" method="GET" id="searchForm">
                    {{ csrf_field() }}
                    <input type="text" name="name" value="{{ $search }}"/>
                    <input type="submit" value="Search" class="btn"/>
                </form>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('drills.create') }}"> Create New Drill</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br />
    @include('drills/list')
@endsection