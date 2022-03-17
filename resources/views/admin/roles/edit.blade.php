<x-admin-master>
    @section('content')
        <div class="col-sm-6">
            <h1>Edit Role: {{$role->name}}</h1>

            <form method="POST" action={{route('roles.update', $role->id)}}>
                @csrf
                @method('PUT')
                <div class="form-grou">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value={{$role->name}}>
                    <br>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    @endsection
</x-admin-master>