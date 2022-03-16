<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
                <form action={{route("role.store")}} method="post">
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
                          <span><strong>{{$message}}</strong></span>
                        @enderror
                      </div>
                      <br>
                      <button class="btn btn-primary btn-block" type="submit">Create</button>
                    </div>

                    <div class="col-sm-9">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($roles as $role)
                              <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>