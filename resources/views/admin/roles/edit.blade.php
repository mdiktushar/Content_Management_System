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
    @endsection
</x-admin-master>