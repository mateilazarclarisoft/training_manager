@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <form action="{{ url('sessions/search') }}" method="GET">
                    {{ csrf_field() }}
                    <input type="text" name="name" value="{{ $search }}"/>
                    <input type="submit" value="Search" class="btn"/>
                </form>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('sessions.show',$currentSessionId) }}">Current Session</a>
                <a class="btn btn-success" href="{{ route('sessions.create') }}"> Create New Session</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br />
    @if (count($sessions) == 0)
        <div>
            No sessions
        </div>
    @else
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Tag</th>
                <th width="450px">Action</th>
            </tr>
            @foreach ($sessions as $session)
            <tr>
                <td>{{ $session->name }}</td>
                <td>{{ $session->tag->name }}</td>
                <td>
                    <div class="row">
                        <div class="col-lg-2">
                            <a class="btn btn-info" href="{{ route('sessions.show',$session->id) }}">Show</a>
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-primary" href="{{ route('sessions.edit',$session->id) }}">Edit</a>
                        </div>
                        <div class="col-lg-2">
                            <form action="{{ route('sessions.destroy',$session->id) }}" method="POST" class="form-inline" >                        
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>                        
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <form action="{{ route('sessions.duplicate',$session->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info">Duplicate</button>
                            </form>
                        </div>
                        <div class="col-lg-4"></div>
                      </div>
                </td>
            </tr>
            @endforeach

        </table>
        {{ $sessions->links() }}
    @endif
    


@endsection