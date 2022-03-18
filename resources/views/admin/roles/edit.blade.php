<x-admin-master>
    @section('content')
         <div class="col-sm-6">
            <h1>Edit Role: {{$role->name}}</h1>
            @if (session('role_updated'))
                <div class="alert alert-success">
                    {{session('role_updated')}}
                </div>
            @endif

            <form method="POST" action={{route('roles.update', $role->id)}}>
                @csrf
                @method('PUT')
                <div class="form-grou">
                    <label for="name">Name</label>
                    <input class= "
                        form-control 
                        @error('name')
                        is-invalid
                        @enderror
                        "
                        type="text" name="name" id="name" value={{$role->name}}>
                        <div style="color: red">
                            @error('name')
                            <br>
                              <span><strong>{{$message}}</strong></span>
                            @enderror
                        <div>
                    <br>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
        <div class="col-sm-12">
            @if ($permissions->isNotEmpty())
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Options</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Options</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <input 
                                 type="checkbox"
                                 @foreach ($role->permissions as $role_permission)
                                     @if ($role_permission->slug == $permission->slug)
                                         checked
                                     @endif
                                 @endforeach
                                >
                            </td>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->slug}}</td>
                            <td>
                                <form action={{route('role.permission.attach', $role)}} method="post">
                                    @csrf
                                    @method("PUT")
                                    <input type="hidden" name="permission" value={{$permission->id}}>
                                    <button 
                                        type="submit"
                                        class="btn btn-success"
                                        @if ($role->permissions->contains($permission))
                                            disabled
                                        @endif
                                    >
                                        Attach
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action={{route('role.permission.detach', $role)}} method="post">
                                    @csrf
                                    @method("PUT")
                                    <input type="hidden" name="permission" value={{$permission->id }}>
                                    <button 
                                        type="submit"
                                        class="btn btn-danger"
                                        @if (!$role->permissions->contains($permission))
                                            disabled
                                        @endif
                                    >
                                        Detach
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>        
    @endsection
</x-admin-master>