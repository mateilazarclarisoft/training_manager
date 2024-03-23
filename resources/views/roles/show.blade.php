@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $role->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"> Edit</a>
            </div>
        </div>
    </div>
@endsection