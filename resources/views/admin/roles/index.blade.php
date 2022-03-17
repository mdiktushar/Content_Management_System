<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
              <form action={{route("role.store")}} enctype="multipart/form-data" method="post">
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
                        @foreach ($roles as $role)
                        <tr>
                          <td>{{$role->id}}</td>
                          <td><a href={{route('roles.edit', $role->id)}}>{{$role->name}}</a></td>
                          <td>{{$role->slug}}</td>
                          <td>
                            <form enctype="multipart/form-data" action={{route('role.distroy', $role->id)}} method="post">
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
        </div>
    @endsection
</x-admin-master>