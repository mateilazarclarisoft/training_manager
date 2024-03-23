<table class="table table-bordered">
  <tr>
      <th>Name</th>
      <th width="280px">Action</th>
  </tr>
  @foreach ($users as $user)
  <tr>
      <td>
          @include('users/item')
      </td>
      <td>
          <form action="{{ route('users.destroy',$user->id) }}" method="POST">
              <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
  </tr>
  @endforeach

</table>