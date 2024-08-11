@extends('adminLayouts.home')
@section('content')


<div class="container-fluid">
<!-- basic table -->
<div class="row">
    <div class="col-12">
        <!-- ---------------------
                start Zero Configuration
            ---------------- -->
        <div class="card">
            <div class="card-header">
                <div class="mb-2">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="mb-0">Expired User List</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{URL::to('admin/sub_user_list')}}" class="btn btn-info"> Back</a>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="zero_config"
                        class="table border table-striped table-bordered text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Expiry Date</th>
                                <th>Note</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Site Visit</th>
                                <th>Action</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>

                            @foreach ($user as $key=> $item)
                                <!-- start row -->
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->expiry_date}}</td>
                                    <td>{{$item->note}}</td>
                                    <td><img src="{{$item->logo}}" width="100px" alt=""></td>
                                    <td>{{$item->status}}</td>
                                    <td><a href="{{URL::to('u/'.$item->name_url)}}" target="_blank"><i class="fas fa-eye"></i> Visit</a></td>
                                    <td>
                                        <a href="{{URL::to('admin/edit_sub_user/'.$item->id)}}"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <!-- end row --> 
                            @endforeach

                            
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- ---------------------
                end Zero Configuration
            ---------------- -->
    </div>
</div>
</div>

@endsection


@section('js')
    <script>
        $("#zero_config").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    </script>
@endsection