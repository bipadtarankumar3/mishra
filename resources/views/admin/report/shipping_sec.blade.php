@extends('adminLayouts.home')
@section('content')


<div class="pagetitle">
    <h1>Shipping Sec</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
     <div class="card">
          <div class="card-body">
            <h5 class="card-title">Filter By</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3">
       <div class="col-md-3">
          <label for="inputName5" class="form-label">Search By</label>
                <div class="col-sm-12">
                  <select class="form-select" name="search_type" aria-label="Default select example">
                    <option selected="">Select one from list</option>
                    <option value="MSLPL"  @if(isset($_GET['search_type']) && $_GET['search_type'] == 'MSLPL') selected @endif >MSLPL</option>
                    <option value="IMPORTER"  @if(isset($_GET['search_type']) && $_GET['search_type'] == 'IMPORTER') selected @endif >IMPORTER</option>
                  </select>
                </div>
              </div>
          
      <div class="col-md-2">
                <label for="inputName7" class="form-label">DATE</label>
                <input type="date" @if(isset($_GET['create_date'])) value="{{$_GET['create_date']}}" @endif name="create_date" class="form-control" id="inputdate">
              </div>
       <div class="col-md-2">
                <label for="inputName5" class="form-label"><br></label>
                <button type="submit"
           class="btn btn-primary form-control">SEARCH</button>
              </div>
              
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

        <div class="card2">
          <div class="card-body2">
            <h5 class="card-title">Result</h5>
            
            <!-- Table with stripped rows -->
            <div class="table-responsive">

            
            <table class="table"  id="example" >
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Job Created Dt:</th>
                  <th scope="col">Job No.:</th>
                  <th scope="col">Bill No.:</th>
                  <th scope="col">Bill Of Entry No. & Date:</th>
                  <th scope="col">Invoice. No.:</th>
                  <th scope="col">Party/Importer Name:</th>
                  <th scope="col">Xerox Doc. Rcvd. On:</th>
                  <th scope="col">Thro./Forw. Name:</th>
                  <th scope="col">Ship. Comp. Name:</th>
                  <th scope="col">Vessel Name:</th>
                  <th scope="col">Voyag/Flight No.:</th>
                  <th scope="col">Igm No. & Date:</th>
                  <th scope="col">Final Entry On:</th>
                  <th scope="col">Line No.:</th>
                  <th scope="col">Bl No. And Date:</th>
                  <th scope="col">Free Time Till Date:</th>
                  <th scope="col">Shipping Comp. Bill Amt:</th>
                  <th scope="col">Shipping Comp. Bill To:</th>
                  <th scope="col">Ship. Comp. Sec. Deps. Amt:</th>
                  <th scope="col">Ship. Comp. Pay. Made By:</th>
                  <th scope="col">Sd Amt/Payer/Mode:</th>
                  <th scope="col">Delivery Order Rcvd. On.:</th>
                  <th scope="col">Secur. Depos. Rcvd On.:</th>
                  <th scope="col">No. Of Contr. W.O.S. Ch. No.:</th>
                  <th scope="col">Contr. No.:</th>
                  <th scope="col">Name Of The Transporter:</th>
                  <th scope="col">Name Of Cfs:</th>
                  <th scope="col">Cfs Bill Paid By:</th>
                  <th scope="col">Container Release From Cfs On:</th>
                  <th scope="col">Contr. Rels. From Party Warehouse On:</th>
                  <th scope="col">Checklist Send To Party On:</th>
                  <th scope="col">Chklist Conf. By Party On:</th>
                  <th scope="col">Duty Paid By:</th>
                  <th scope="col">Description Of Goods:</th>
                  <th scope="col">H.S. Code:</th>
                  <th scope="col">Duty Structure:</th>
                  <th scope="col">Gross Weight:</th>
                  <th scope="col">Net Weight:</th>
                  <th scope="col">No Of Days</th>
                  <th scope="col">Remarks</th>
                  <th scope="col">Total Purchase</th>
                  <th scope="col">Job Completion Date</th>

                </tr>
              </thead>
              <tbody>
                @if (count($imports) > 0)
                @foreach ($imports as $key=> $item)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>
                      @php
                            $existingDate = $item->job_created_dt;
                            if ( $existingDate != '') {
                              $formattedDate = date("d-m-Y", strtotime($existingDate));
                              echo $formattedDate;
                            }
                        @endphp 
                    </td>
                    <td>{{$item->job_no}}</td>
                    <td>{{$item->bill_no}}</td>
                    <td>{{$item->bill_of_entry_n__and_date}}</td>
                    <td>{{$item->invoice_no}}</td>
                    <td>{{$item->party_importer_name}}</td>
                    <td>{{$item->xerox_doc_rcvd_on}}</td>
                    <td>{{$item->thro_forw_name}}</td>
                    <td>{{$item->ship_comp_name}}</td>
                    <td>{{$item->vessel_name}}</td>
                    <td>{{$item->voyag_flight_no}}</td>
                    <td>{{$item->igm_no_and_date}}</td>
                    <td>{{$item->final_entry_on}}</td>
                    <td>{{$item->line_no}}</td>
                    <td>{{$item->bl_no_and_date}}</td>
                    <td>
                      @php
                          $existingDate = $item->free_time_till_date;
                          if ( $existingDate != '') {
                            $formattedDate = date("d-m-Y", strtotime($existingDate));
                            echo $formattedDate;
                          }
                      @endphp 
                    </td>
                    <td>{{$item->shipping_comp_bill_amt}}</td>
                    <td>{{$item->shipping_comp_bill_to}}</td>
                    <td>{{$item->ship_comp_sec_deps_amt}}</td>
                    <td>{{$item->ship_co_payment_made_by}}</td>
                    <td>{{$item->sd_amt_payer_mode}}</td>
                    <td>{{$item->delivery_order_rcvd_on}}</td>
                    <td>
                      
                      @php
                          $existingDate = $item->secur_depos_rcvd_on;
                          if ( $existingDate != '') {
                            $formattedDate = date("d-m-Y", strtotime($existingDate));
                            echo $formattedDate;
                          }
                      @endphp 
                    </td>
                    <td>{{$item->no_of_contr_w_o_s_ch_no}}</td>
                    <td>{{$item->contr_no}}</td>
                    <td>{{$item->name_of_the_transporter}}</td>
                    <td>{{$item->name_of_cfs}}</td>
                    <td>{{$item->cfs_bill_paid_by}}</td>
                    <td>{{$item->container_release_from_cfs_on}}</td>
                    <td>{{$item->contr_rels_from_party_warehouse_on}}</td>
                    <td>{{$item->checklist_send_to_party_on}}</td>
                    <td>{{$item->chklist_conf_by_party_on}}</td>
                    <td>{{$item->duty_paid_by}}</td>
                    <td>{{$item->description_of_goods}}</td>
                    <td>{{$item->h_s_code}}</td>
                    <td>{{$item->duty_structure}}</td>
                    <td>{{$item->gross_weight}}</td>
                    <td>{{$item->net_weight}}</td>
                    <td>
                      @php
                          $date1_str = $item->free_time_till_date;
                          $date2_str = date('Y-m-d');
                          $date1 = new DateTime($date1_str);
                          $date2 = new DateTime($date2_str);

                          $interval = $date1->diff($date2);

                          echo $interval->days;
                      @endphp
                    </td>
                    <td>
                      {{$item->remarks}}
                    </td>
                    <td>{{$item->total_purchase}}</td>
                    <td>
                      @php
                        $existingDate = $item->job_completion_date;
                        if ( $existingDate != '') {
                            $formattedDate = date("d-m-Y", strtotime($existingDate));
                            echo $formattedDate;
                          }
                      @endphp 
                    </td>
                  </tr>
                @endforeach
              @endif

              </tbody>
            </table>
          </div>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection