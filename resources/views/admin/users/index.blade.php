<x-admin-master>
    @section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">All Posts</h1>
   <div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
       </div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-bordered" id="Users-Table" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th>ID</th>
                 <th>Username</th>
                 <th>Avatar</th>
                 <th>Name</th>
                 <th>Regristration Date</th>
                 <th>Updated Date</th>
               </tr>
             </thead>
             <tfoot>
               <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Regristration Date</th>
                <th>Updated Date</th>
               </tr>
             </tfoot>
             <tbody>
               @foreach ($users as $user)
               <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->username}}</td>
               <td>
                   <img height="40px" src="{{$user->avatar}}" alt="{{$user->name.' Image'}}" srcset="">
               </td>
               <td>{{$user->name}}</td>
               <td>{{$user->created_at->diffForHumans()}}</td>
               <td>{{$user->updated_at->diffForHumans()}}</td>
               </tr>
               @endforeach
             </tbody>
           </table>
         </div>
       </div>
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