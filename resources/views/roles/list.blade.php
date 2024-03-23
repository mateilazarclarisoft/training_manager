<table class="table table-bordered">
  <tr>
      <th>Name</th>
      <th width="280px">Action</th>
  </tr>
  @foreach ($roles as $role)
  <tr>
      <td>
          @include('roles/item')
      </td>
      <td>
          <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
              <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
  </tr>
  @endforeach

</table>