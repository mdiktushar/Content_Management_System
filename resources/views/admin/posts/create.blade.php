<x-admin-master>
    @section('content')
        <form action={{route('post.store')}} method="post">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input 
                    type="text" 
                    name="title" id="title" 
                    class="form-control"
                    placeholder="Enter title"
                >
            </div>
            <div class="form-group">
                <label>File</label>
                <input 
                    type="file" name="post_image"
                    class="form-control-file" id="post_image"
                >
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea  
                    name="body" id="body" 
                    class="form-control"
                    placeholder="Enter content"
                    rows="8" cols="50"
                ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>