<x-admin-master>
    @section('content')
        <div class="row">
            <h1>User Profile of {{$user->name}}</h1>
            <div class="col-sm-6">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <img 
                            class="img-profile rounded-circle" 
                            src="https://source.unsplash.com/QAB-WJcbgJk/60x60"
                            height="100px"
                            width="100px"
                            style="margin-bottom: 20px"
                        >
                    </div>
                    <div class="form-group">
                        <input type="file" name="" id="">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input 
                            type="text" 
                            name="username"
                            id="username" 
                            class="form-control" 
                            value="{{$user->username}}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            name="name"
                            id="name" 
                            class="form-control" 
                            value="{{$user->name}}"
                            required
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="text" 
                            name="email"
                            id="email" 
                            class="form-control" 
                            value="{{$user->email}}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            name="password"
                            id="password" 
                            class="form-control" 
                        >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation"
                            id="password_confirmation" 
                            class="form-control" 
                        >
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>