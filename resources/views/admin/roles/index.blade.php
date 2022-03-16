<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
                <form action={{route("role.store")}} method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input class="form-control" type="text" name="name" id="name">
                      <br>
                      <button class="btn btn-primary btn-block" type="submit">Create</button>
                    </div>

                    <div class="col-sm-9">
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
                              <tr>
                                <td>

                                </td>
                                <td>
                                      
                                </td>
                                <td>
                                      
                                </td>
                                <td>
                                      
                                </td>
                                <td>
                                      
                                </td>
                                <td>
                                      
                                </td>
                                <td>
                                      
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>