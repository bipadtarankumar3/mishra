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
                        <div class="col-md-8">
                            <h5 class="mb-0">User List </h5>
                        </div>
                        <div class="col-md-4 text-end">
                            <?php
                                $user_create_limit = Auth::user()->user_create_limit;
                                if ($user_create_limit>= 1) {
                                    ?>
                                        <a href="{{URL::to('admin/add_sub_user_page')}}" class="btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> Add User</a>
                                        <?php
                                    }
                                ?> 
                            <a href="{{URL::to('admin/expiry_sub_user')}}" class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> Expired User</a>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div class="card-body">

                 

                <div class="row my-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <h4 class="">Search</h4>
                        <form action="{{URL::to('admin/sub_user_list')}}" method="post">
                            @csrf
                            
                            <div class="row search-box">

                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Start Date</label>
                                        <input type="date" class="form-control" required  name="start_date" value="<?php echo isset($start_date)?date('Y-m-d',strtotime($start_date)):date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">End Date</label>
                                        <input type="date" class="form-control" required name="end_date" value="<?php echo isset($end_date)?date('Y-m-d',strtotime($end_date)):date('Y-m-d'); ?>" >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group" style="margin-top: 21px;"> 
                                        <button type="submit" class="btn btn-success pull-right pull-rights"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                    </div>
                                </div>

                            </div>

                            <div class="clearfix"></div>

                        </form> 
                    </div>
                    <div class="col-md-2"></div>

            </div>
            <form action="{{URL::to('admin/downloadUserPdf')}}" method="post">
                @csrf
                    <div class="row my-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info">Download Pdf</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="zero_config"
                            class="table border table-striped table-bordered text-nowrap">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th><input name="" class="select_all" id="select_all" type="checkbox" ></th>
                                    <th>Sl.</th>
                                    <th>Date</th>
                                    <th>Business Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Expiry Date</th>
                                    <th>Note</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Dashboard Visit</th>
                                    <th>Site Visit</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>

                                @foreach ($user as $key=> $item)
                                    <!-- start row -->
                                    <tr>
                                        <td><input name="checkbox[]" class="checkbox" type="checkbox"  value="{{$item->id}}"></td>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->expiry_date}}</td>
                                        <td>{{$item->note}}</td>
                                        <td><img src="{{$item->logo}}" width="100px" alt=""></td>
                                        <td>
                                            
                                            @if($item->status == 'inactive')
                                                <p style="color:red;">Inactive</p>
                                            @else 
                                                <p style="color:green;">Active</p>
                                            @endif
                                        </td>
                                        <td><a href="{{URL::to('admin/dashboard_visit/'.$item->id)}}"><i class="fas fa-eye"></i>Dashboard Visit</a></td>
                                        <td><a href="{{URL::to('u/'.$item->name_url)}}" target="_blank"><i class="fas fa-eye"></i> Visit</a></td>
                                        <td>
                                            <a href="{{URL::to('admin/edit_sub_user/'.$item->id)}}"><i class="fas fa-edit"></i></a>
                                            <a href="{{URL::to('admin/delete_sub_user/'.$item->id)}}" onclick="dataDelete(event)"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <!-- end row --> 
                                @endforeach

                                
                                
                            </tfoot>
                        </table>
                    </div>
                </form>
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

    // $('.checkbox').click(function() {
    //     console.log($(this).attr("data-checked"));
    //     if ($(this).attr("data-checked") == 0) {
    //         $(this).attr("data-checked", "1")
    //     } else {
    //         $(this).attr("data-checked", "0")
    //     }
    // });

    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

    $("#zero_config").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy','excel', 'pdf', 'print'
        ]
    });
    </script>
@endsection