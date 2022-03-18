<x-admin-master>
    @section('content')
    <div class="col-sm-6">
        <h1>Edit Role: {{$permission->name}}</h1>
        @if (session('permission_session'))
            <div class="alert alert-success">
                {{session('permission_session')}}
            </div>
        @endif

        <form method="POST" action={{route('permissions.update', $permission->id)}}>
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
                    type="text" name="name" id="name" value={{$permission->name}}>
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