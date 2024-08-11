@extends('adminLayouts.home')
@section('content')


<style>
  th {
            background-color: #f2f2f2;
            position: sticky;
            top: 0;
            z-index: 1;
        }
</style>

<div class="pagetitle">
    <h1>Import Form</h1>
    
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>

            <!-- Multi Columns Form -->
            <form class="row g-2" action="{{URL::to('admin/add_inport_form')}}" method="POST">
              @csrf
              <input type="hidden" name="id" @if(isset($import_details)) value="{{$import_details->id}}" @endif>
              <div class="col-md-2">
                <label for="inputName5" class="form-label">JOB CREATED DT:</label>
                <input type="date" class="form-control" id="inputName5" name="job_created_dt" @if(isset($import_details)) value="{{$import_details->job_created_dt}}" @else value="{{date('Y-m-d')}}" @endif>
              </div>
              <div class="col-md-2">
                <label for="inputName6" class="form-label">JOB NO.:</label>
                <input type="text" class="form-control" readonly id="inputName5" name="job_no" @if(isset($import_details)) value="{{$import_details->job_no}}" @else value="{{$no}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">BILL NO.:</label>
                <input type="text" class="form-control" id="inputName5" name="bill_no" @if(isset($import_details)) value="{{$import_details->bill_no}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">TOTAL SALE BILL AMOUNT</label>
                <input type="text" class="form-control" id="inputName5" name="total_sale_bill_amount" @if(isset($import_details)) value="{{$import_details->total_sale_bill_amount}}" @endif>
              </div>
              <div class="col-md-2">
                
                <label for="inputName7" class="form-label">BILL OF ENTRY NO & DATE:</label>
               <input type="text" class="form-control" id="inputName5" name="bill_of_entry_n__and_date" @if(isset($import_details)) value="{{$import_details->bill_of_entry_n__and_date}}" @endif>
              
              </div>
              <div class="col-md-2">
                <label for="inputAddress5" class="form-label">INVOICE. NO.:</label>
                <input type="text" class="form-control" id="inputAddres5s" name="invoice_no" @if(isset($import_details)) value="{{$import_details->invoice_no}}" @endif>
              </div>
      <div class="col-md-2">
         <label for="inputEmai1" class="form-label">PARTY/IMPORTER NAME:</label>
                <input type="text" class="form-control" id="inputName5" name="party_importer_name" @if(isset($import_details)) value="{{$import_details->party_importer_name}}" @endif>
              </div>
              <div class="col-md-2">
         <label for="inputEmai2" class="form-label">XEROX DOC. RCVD. ON:</label>
                <input type="text" class="form-control" id="inputName5" name="xerox_doc_rcvd_on" @if(isset($import_details)) value="{{$import_details->xerox_doc_rcvd_on}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">THRO./FORW. NAME:</label>
                <input type="text" class="form-control" id="inputName5" name="thro_forw_name" @if(isset($import_details)) value="{{$import_details->thro_forw_name}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">SHIP. COMP. NAME:</label>
                <input type="text" class="form-control" id="inputName5" name="ship_comp_name" @if(isset($import_details)) value="{{$import_details->ship_comp_name}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">VESSEL NAME:</label>
                <input type="text" class="form-control" id="inputName5" name="vessel_name" @if(isset($import_details)) value="{{$import_details->vessel_name}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">VOYAG/FLIGHT NO.:</label>
                <input type="text" class="form-control" id="inputName5" name="voyag_flight_no" @if(isset($import_details)) value="{{$import_details->voyag_flight_no}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">IGM NO & DATE:</label>
                <input type="text" class="form-control" id="inputName5" name="igm_no_and_date" @if(isset($import_details)) value="{{$import_details->igm_no_and_date}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">FINAL ENTRY ON:</label>
                <input type="text" class="form-control" id="inputName5" name="final_entry_on" @if(isset($import_details)) value="{{$import_details->final_entry_on}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">LINE NO.:</label>
                <input type="text" class="form-control" id="inputName5" name="line_no" @if(isset($import_details)) value="{{$import_details->line_no}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">BL NO. AND DATE:</label>
                <input type="text" class="form-control" id="inputName5" name="bl_no_and_date" @if(isset($import_details)) value="{{$import_details->bl_no_and_date}}" @endif>
              </div>

              

              <div class="col-md-2">
                <label for="free_time_till_date" class="form-label">FREE TIME TILL DATE: </label>
                <input type="date" class="form-control" id="free_time_till_date" name="free_time_till_date" @if(isset($import_details)) value="{{$import_details->free_time_till_date}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">SHIPPING COMP. BILL AMT:</label>
                <input type="text" class="form-control" id="inputName5" name="shipping_comp_bill_amt" @if(isset($import_details)) value="{{$import_details->shipping_comp_bill_amt}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">SHIPPING COMP. BILL TO:</label>
                <input type="text" class="form-control" id="inputName5" name="shipping_comp_bill_to" @if(isset($import_details)) value="{{$import_details->shipping_comp_bill_to}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">SHIP. COMP. SEC. DEPS. AMT:</label>
                  <input type="text" class="form-control" id="inputName5" name="ship_comp_sec_deps_amt" @if(isset($import_details)) value="{{$import_details->ship_comp_sec_deps_amt}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">SHIP. CO. PAYMENT MADE BY</label>
                <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" name="ship_co_payment_made_by">
                    <option value="">Select Payment Made By</option>
                    <option value="MSLPL"  @if(isset($import_details) && $import_details->ship_co_payment_made_by == 'MSLPL') selected @endif>MSLPL</option>
                    <option value="IMPORTER"  @if(isset($import_details) && $import_details->ship_co_payment_made_by == 'IMPORTER') selected @endif>IMPORTER</option>
                    
                  </select>
                </div>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">SD AMT/PAYER/MODE:</label>
                <input type="text" class="form-control" id="inputName5" name="sd_amt_payer_mode" @if(isset($import_details)) value="{{$import_details->sd_amt_payer_mode}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">DELIVERY ORDER RCVD. ON.:</label>
                <input type="text" class="form-control" id="inputName5" name="delivery_order_rcvd_on" @if(isset($import_details)) value="{{$import_details->delivery_order_rcvd_on}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">SECUR. DEPOS. RCVD ON.:</label>
                <input type="date" class="form-control" id="inputName5" name="secur_depos_rcvd_on" @if(isset($import_details)) value="{{$import_details->secur_depos_rcvd_on}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">NO OF CONTR. W.O.S. CH. NO.:</label>
                <input type="text" class="form-control" id="inputName5" name="no_of_contr_w_o_s_ch_no" @if(isset($import_details)) value="{{$import_details->no_of_contr_w_o_s_ch_no}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">CONTR. NO: </label>
                <input type="text" class="form-control" id="inputName5" name="contr_no" @if(isset($import_details)) value="{{$import_details->contr_no}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">NAME OF THE TRANSPORTER:</label>
                <input type="text" class="form-control" id="inputName5" name="name_of_the_transporter" @if(isset($import_details)) value="{{$import_details->name_of_the_transporter}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">NAME OF CFS:</label>
                <input type="text" class="form-control" id="inputName5" name="name_of_cfs" @if(isset($import_details)) value="{{$import_details->name_of_cfs}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">CFS BILL PAID BY:</label>
                <input type="text" class="form-control" id="inputName5" name="cfs_bill_paid_by" @if(isset($import_details)) value="{{$import_details->cfs_bill_paid_by}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">CONTAINER RELEASE FROM CFS ON:</label>
                <input type="text" class="form-control" id="inputName5" name="container_release_from_cfs_on" @if(isset($import_details)) value="{{$import_details->container_release_from_cfs_on}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">CONTR. RELS. FROM PARTY WAREHOUSE ON:</label>
                <input type="text" class="form-control" id="inputName5" name="contr_rels_from_party_warehouse_on" @if(isset($import_details)) value="{{$import_details->contr_rels_from_party_warehouse_on}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">CHECKLIST SEND TO PARTY ON:</label>
                <input type="text" class="form-control" id="inputName5" name="checklist_send_to_party_on" @if(isset($import_details)) value="{{$import_details->checklist_send_to_party_on}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">CHKLIST CONF. BY PARTY ON:</label>
                <input type="text" class="form-control" id="inputName5" name="chklist_conf_by_party_on" @if(isset($import_details)) value="{{$import_details->chklist_conf_by_party_on}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">DUTY PAID BY:</label>
                <input type="text" class="form-control" id="inputName5" name="duty_paid_by" @if(isset($import_details)) value="{{$import_details->duty_paid_by}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">DESCRIPTION OF GOODS:</label>
                <input type="text" class="form-control" id="inputName5" name="description_of_goods" @if(isset($import_details)) value="{{$import_details->description_of_goods}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">H.S. CODE:</label>
                <input type="text" class="form-control" id="inputName5" name="h_s_code" @if(isset($import_details)) value="{{$import_details->h_s_code}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">VEHICLE  NUMBER:</label>
                <input type="text" class="form-control" id="inputName5" name="duty_structure" @if(isset($import_details)) value="{{$import_details->duty_structure}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">GROSS WEIGHT:</label>
                <input type="text" class="form-control" id="inputName5" name="gross_weight" @if(isset($import_details)) value="{{$import_details->gross_weight}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">NET WEIGHT:</label>
                <input type="text" class="form-control" id="inputName5" name="net_weight" @if(isset($import_details)) value="{{$import_details->net_weight}}" @endif>
              </div>
      <div class="col-md-2">
                <label for="inputName7" class="form-label">REMARKS</label>
                <input type="text" class="form-control" id="inputName5" name="remarks" @if(isset($import_details)) value="{{$import_details->remarks}}" @endif>
              </div>
              <div class="col-md-2">
                <label for="inputName7" class="form-label">TOTAL PURCHASE</label>
                <input type="text" class="form-control" id="inputName5" name="total_purchase" @if(isset($import_details)) value="{{$import_details->total_purchase}}" @endif>
              </div>
              <div class="col-md-2">
                <label for="inputName7" class="form-label">TRANSPORTING RATE</label>
                <input type="text" class="form-control" id="inputName5" name="shipping_line_name" @if(isset($import_details)) value="{{$import_details->shipping_line_name}}" @endif>
              </div>

              <div class="col-md-2">
                <label for="job_completion_date" class="form-label">JOB COMPLETION DATE</label>
                <input type="date" min="{{ date('Y-m-d') }}" class="form-control" id="job_completion_date" name="job_completion_date" @if(isset($import_details)) value="{{$import_details->job_completion_date}}" @endif>
              </div>


              {{-- <div class="col-md-2">
                <label for="inputName7" class="form-label">FORWARDING NAME</label>
                <input type="text" class="form-control" id="inputName5" name="forwarding_name" @if(isset($import_details)) value="{{$import_details->forwarding_name}}" @endif>
              </div> --}}
             

              {{-- <div class="col-md-2">
                <label for="be_no" class="form-label">B/E No</label>
                <input type="text"  class="form-control" id="be_no" name="be_no" @if(isset($import_details)) value="{{$import_details->be_no}}" @endif>
              </div> --}}
              

      
                    
              <div class="text-center">
                @if(!isset($import_details)) 
                <button type="submit" class="btn btn-primary">Save</button>
                @else
                <button type="update" class="btn btn-primary">Update</button>
                @endif
                {{-- <button type="cancel" class="btn btn-secondary">Cancel</button> --}}
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>

      
    </div>
  </section>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
     
        <div class="card2">
          <div class="card-body2">
            <h5 class="card-title">Result</h5>
            
            <!-- Table with stripped rows -->
            <div class="table-responsive">

            
              <table class="table" id="example" >
                <thead>
                  <tr>
                    <th scope="col">#</th>

                    <th scope="col">Job Created Dt:</th>
                    <th scope="col">Job No.:</th>
                    <th scope="col">Bill No.:</th>
                    <th scope="col">Total Sale Bill Amount</th>
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
                    <th scope="col">Vehicle number:</th>
                    <th scope="col">Gross Weight:</th>
                    <th scope="col">Net Weight:</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Total Purchase</th>
                    <th scope="col">Job Completion Date</th>
                    <th scope="col">TRANSPORTING Rate</th>
                    {{-- <th scope="col">Forwarding name</th> --}}
                    <th scope="col">Edit</th>

                  </tr>
                </thead>
                <tbody>


                  @foreach ($imports as $key=> $item)
                    <tr @if(!empty($item->bill_no)) style="background:#bbff99" @endif >
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$key+1}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>
                        
                        @php
                            $existingDate = $item->job_created_dt;
                            $formattedDate = date("d-m-Y", strtotime($existingDate));
                            echo $formattedDate;
                        @endphp 
                      </td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->job_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->bill_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->total_sale_bill_amount}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->bill_of_entry_n__and_date}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->invoice_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->party_importer_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->xerox_doc_rcvd_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->thro_forw_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->ship_comp_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->vessel_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->voyag_flight_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->igm_no_and_date}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->final_entry_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->line_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->bl_no_and_date}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>
                        @php
                            $existingDate = $item->free_time_till_date;
                            if ( $existingDate != '') {
                              $formattedDate = date("d-m-Y", strtotime($existingDate));
                              echo $formattedDate;
                            }
                            
                        @endphp 
                      </td>
                      </td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->shipping_comp_bill_amt}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->shipping_comp_bill_to}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->ship_comp_sec_deps_amt}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->ship_co_payment_made_by}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->sd_amt_payer_mode}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->delivery_order_rcvd_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>
                        
                        @php
                            $existingDate = $item->secur_depos_rcvd_on;
                            if ( $existingDate != '') {
                              $formattedDate = date("d-m-Y", strtotime($existingDate));
                              echo $formattedDate;
                            }
                        @endphp 
                      </td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->no_of_contr_w_o_s_ch_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->contr_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->name_of_the_transporter}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->name_of_cfs}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->cfs_bill_paid_by}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->container_release_from_cfs_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->contr_rels_from_party_warehouse_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->checklist_send_to_party_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->chklist_conf_by_party_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->duty_paid_by}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->description_of_goods}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->h_s_code}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->duty_structure}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->gross_weight}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->net_weight}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->remarks}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->total_purchase}}</td>
                      
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>
                        
                        @php
                            $existingDate = $item->job_completion_date;
                            if ( $existingDate != '') {
                              $formattedDate = date("d-m-Y", strtotime($existingDate));
                              echo $formattedDate;
                            }
                        @endphp 
                      </td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->shipping_line_name}}</td>
                      {{-- <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->forwarding_name}}</td> --}}
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif><a href="{{URL::to('admin/edit_inport_form/'.$item->id)}}">Edit</a></td>
                    </tr>
                  @endforeach

                  

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

@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
  $(document).ready(function() {
    // Function to validate date inputs
    function validateDates() {
      var jobCompletionDate = $('#job_completion_date').val();
      var freeTimeTillDate = $('#free_time_till_date').val();

      // Convert strings to Date objects
      var jobDate = new Date(jobCompletionDate);
      var freeDate = new Date(freeTimeTillDate);

      // Check if free time is after job completion date
      if (freeDate <= jobDate) {
        alert("Free time should be after job completion date.");
        $('#free_time_till_date').val(''); // Clear the value if it's invalid
        return false;
      }
      return true;
    }

    // Adding onchange event listener to free_time_till_date input using jQuery
    $('#job_completion_date').on('change', validateDates);
    $('#free_time_till_date').on('change', validateDates);
  });
</script> --}}

    
@endsection