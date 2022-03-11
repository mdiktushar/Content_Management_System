<x-admin-master>
    @section('content')
        <div class="row">
            <h1>User Profile of {{$user->name}}</h1>
            <div class="col-sm-6">
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
        </div>
    @endsection
</x-admin-master>