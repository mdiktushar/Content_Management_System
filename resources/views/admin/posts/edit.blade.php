<x-admin-master>
    @section('content')
        <form action={{route('post.update', $post->id)}} enctype="multipart/form-data" method="post">

            @if (session('post_update_message'))
                <div class = 'alert alert-success'>
                    {{session('post_update_message')}}
                </div>
            @endif
            
            <h1 class="h3 mb-0 text-gray-800">Edit Posts</h1>
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Title</label>
                <input 
                    type="text" 
                    name="title" id="title" 
                    class="form-control"
                    placeholder="Enter title"
                    value={{$post->title}}
                >
            </div>
            <div class="form-group">
                <label>File</label>
                <div><img height="100px" src={{$post->post_image}} alt="" srcset=""></div>
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
                    rows="8" cols="100"
                    
                >{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>