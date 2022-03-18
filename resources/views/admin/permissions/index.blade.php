<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-12">
            <form action={{route("permissions.store")}} enctype="multipart/form-data" method="post">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input
                  class= "
                  form-control 
                  @error('name')
                  is-invalid
                  @enderror
                  " 
                  type="text" 
                  name="name" 
                  id="name"
              />
              <div style="color: red">
                @error('name')
                <br>
                  <span><strong>{{$message}}</strong></span>
                @enderror
              <div>
              <br>
              <button class="btn btn-primary btn-block" type="submit">Create</button>
            </form>
        </div>

        <div class="col-sm-9">
            @if (session('role-delete'))
            <div class="alert alert-danger">
              {{session('role-delete')}}
            </div>
            @endif
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                      <td>{{$permission->id}}</td>
                      <td><a href={{route('permission.edit', $permission->id)}}>{{$permission->name}}</a></td>
                      <td>{{$permission->slug}}</td>
                      <td>
                        <form enctype="multipart/form-data" action={{route('permission.distroy', $permission->id)}} method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
          </div>
    </div>
    @endsection
</x-admin-master>