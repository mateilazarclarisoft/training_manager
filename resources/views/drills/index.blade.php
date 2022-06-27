@extends('drills.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <form action="{{ url('search') }}" method="GET">
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

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($drills as $drill)
        <tr>
            <td>{{ $drill->id }}</td>
            <td>{{ $drill->name }}</td>
            <td>{{ $drill->detail }}</td>
            <td>
                <form action="{{ route('drills.destroy',$drill->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('drills.show',$drill->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('drills.edit',$drill->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $drills->links() }}


@endsection