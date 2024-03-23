@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $user->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"> Edit</a>
            </div>
        </div>
    </div>

    <br />

    <div class="row">
            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {{ $user->role->name }}

            </div>
        </div>
    </div>
@endsection