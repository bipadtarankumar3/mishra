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
                                    <th>Status</th>
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
                                        <td>{{$item->status}}</td>
                                       
                                    </tr>
                                    <!-- end row --> 
                                @endforeach

                                
                                
                            </tfoot>
                        </table>