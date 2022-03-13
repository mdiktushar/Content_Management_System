<x-admin-master>
    @section('content')
    <!-- DataTales Example -->
    <div class="container-fluid">
      @if(Session::has('delete_message'))
        <div class = 'alert alert-danger'>
          {{Session::get('delete_message')}}
        </div>
      @elseif (session('post_save'))
      <div class = 'alert alert-success'>
        {{session('post_save')}}
      </div>
      @endif
      <h1 class="h3 mb-0 text-gray-800">All Posts</h1>
    <div class="card shadow mb-4">
       
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Create At</th>
                  <th>Updated At</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Create At</th>
                  <th>Updated At</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($posts as $post)
                @php
                  $showTitle = true;
                @endphp
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->user->name}}</td>
                  <td>
                    @can('view', $post)
                      <a href={{route('post.edit', $post->id)}}>{{$post->title}}</a>
                      @php
                        $showTitle = false;
                      @endphp
                    @endcan
                    @if ($showTitle)
                      {{$post->title}}
                    @endif
                  </td>
                  <td>
                    <img height="40px" src="{{$post->post_image}}" alt="{{$post->title.' Image'}}" srcset="">
                  </td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
                  <td>
                    @can('view', $post)
                      <form action={{route('post.distroy', $post->id)}} enctype="multipart/form-data" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    @endcan
                    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="w-25 p-3">
        {{$posts->links()}}
      </div>
    </div>

    
    @endsection

    @section('scripts')
  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>