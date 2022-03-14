<x-admin-master>
    @section('content')
        <div class="row">
            <h1>User Profile of {{$user->name}}</h1>
            <div class="col-sm-12">
                <form action={{route('user.profile.update', $user)}} method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <img 
                            class="img-profile rounded-circle" 
                            src={{$user->avatar}}
                            height="100px"
                            width="100px"
                            style="margin-bottom: 20px"
                            alt="Image"
                        >
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar" id="avatar">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input 
                            type="text" 
                            name="username"
                            id="username" 
                            {{-- class="
                                form-control
                                {{$errors->has('username') ? 'is-invalid' : ''}}
                            "  --}}
                            class="
                                form-control
                                @error('username')
                                    is-invalid
                                @enderror
                            " 
                            value="{{$user->username}}"
                        >

                        @error('username')
                            <div class="invalid-feedback">{{$message}}</div>
                            {{-- <div class="alert alert-danger">{{$message}}</div> --}}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            name="name"
                            id="name" 
                            class="
                                form-control
                                @error('name')
                                    is-invalid
                                @enderror
                            " 
                            value="{{$user->name}}"
                        >
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="text" 
                            name="email"
                            id="email" 
                            class="
                                form-control
                                @error('email')
                                    is-invalid
                                @enderror
                            " 
                            value="{{$user->email}}"
                        >
                        @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            name="password"
                            id="password" 
                            class="
                                form-control
                                @error('password')
                                    is-invalid
                                @enderror
                            " 
                        >
                        @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation"
                            id="password_confirmation" 
                            class="
                                form-control
                                @error('password_confirmation')
                                    is-invalid
                                @enderror
                            " 
                        >
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Input Roles</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="Users-Table" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>Options</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Ataach</th>
                            <th>Detach</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Options</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Ataach</th>
                            <th>Detach</th>>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($roles as $role)
                         <tr>
                             <td>
                                <input 
                                 type="checkbox"
                                 @foreach ($user->roles as $user_role)
                                     @if ($user_role->slug == $role->slug)
                                         checked
                                     @endif
                                 @endforeach
                                >
                            </td>
                             <td>{{$role->id}}</td>
                             <td>{{$role->name}}</td>
                             <td>{{$role->slug}}</td>
                             <td>
                                 <form action="{{route('user.role.attach', $user)}}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <input type="hidden" name="role" value={{$role->id}}>
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        @if ($user->roles->contains($role))
                                            disabled
                                        @endif                                       
                                    >
                                        Attach
                                    </button>
                                </form>
                             </td>
                             <td>
                                <form action="{{route('user.role.detach', $user)}}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <input type="hidden" name="role" value={{$role->id}}>
                                    <button 
                                        type="submit"
                                        class="btn btn-danger"
                                        @if (! $user->roles->contains($role))
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
                  </div>
                </div>
              </div>
            </div>
        </div>
    @endsection
</x-admin-master>