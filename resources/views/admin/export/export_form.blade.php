@extends('adminLayouts.home') 


@section('content') <div class="pagetitle">

  <style>
    .pagination_p nav{
      margin-top: 10px;
    }
  </style>

  <h1>Export Form</h1>
</div>
<!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <!-- Multi Columns Form -->
          <form class="row g-2" method="POST" action="{{URL::to('admin/export_form_submit')}}">
            @csrf
            <input type="hidden" name="id" @if(isset($export_details)) value="{{$export_details->id}}" @endif>
            <div class="col-md-2">
              <label for="inputName5" class="form-label">JOB CREATED DT.:</label>
              <input type="date" class="form-control" id="inputName5" name="job_created_dt"  @if(isset($export_details)) value="{{$export_details->job_created_dt}}" @else value="{{date('Y-m-d')}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName6" class="form-label">JOB NO.:</label>
              <input type="text" class="form-control" id="inputName5" name="job_no" onkeyup="get_export_details(this.value)"  @if(isset($export_details)) value="{{$export_details->job_no}}" @else value="{{$no}}" @endif>
              <span class="job_num_error" style="color: red;display:none;" ></span>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">BILL NO.:</label>
              <input type="text" class="form-control" id="bill_no" name="bill_no"  @if(isset($export_details)) value="{{$export_details->bill_no}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputAddress5" class="form-label">INVOICE. NO.:</label>
              <input type="text" class="form-control" id="invoice_no" name="invoice_no"  @if(isset($export_details)) value="{{$export_details->invoice_no}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputEmai1" class="form-label">PARTY NAME:</label>
              <input type="text" class="form-control" id="party_name" name="party_name"  @if(isset($export_details)) value="{{$export_details->party_name}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputEmai2" class="form-label">GROSS WT.:</label>
              <input type="text" class="form-control" id="gross_wt" name="gross_wt"  @if(isset($export_details)) value="{{$export_details->gross_wt}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">PORT OF LOADING:</label>
              <input type="text" class="form-control" id="port_of_loading" name="port_of_loading"  @if(isset($export_details)) value="{{$export_details->port_of_loading}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">PORT OF DISCHARGE:</label>
              <input type="text" class="form-control" id="port_of_discharge" name="port_of_discharge"  @if(isset($export_details)) value="{{$export_details->port_of_discharge}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">VESSEL & VOY.:</label>
              <input type="text" class="form-control" id="vessel_and_voy" name="vessel_and_voy"  @if(isset($export_details)) value="{{$export_details->vessel_and_voy}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="mslpl_forwarder_name" class="form-label">MSLPL FORWARDER NAME:</label>
              <select id="mslpl_forwarder_name" name="mslpl_forwarder_name" class="form-select">
                <option value="">Choose...</option>
                <option value="Yes" @if(isset($export_details) && $export_details->mslpl_forwarder_name == 'Yes') selected @endif>Yes</option>
                <option value="No" @if(isset($export_details) && $export_details->mslpl_forwarder_name == 'No') selected @endif>No</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">OBL DELIVERED ON/TO:</label>
              <input type="text" class="form-control" id="obl_delivered_on_to" name="obl_delivered_on_to"  @if(isset($export_details)) value="{{$export_details->obl_delivered_on_to}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">THROUGH DOC. RECEIVE:</label>
              <input type="text" class="form-control" id="through_doc_receive" name="through_doc_receive"  @if(isset($export_details)) value="{{$export_details->through_doc_receive}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">NO. OF PKGS:</label>
              <input type="text" class="form-control" id="no_of_pkgs" name="no_of_pkgs"  @if(isset($export_details)) value="{{$export_details->no_of_pkgs}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">NO. OF CONTAINERS:</label>
              <input type="text" class="form-control" id="no_of_containers" name="no_of_containers"  @if(isset($export_details)) value="{{$export_details->no_of_containers}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">E SEAL / CFS SEAL:</label>
              <input type="text" class="form-control" id="e_seal_cfs_seal" name="e_seal_cfs_seal"  @if(isset($export_details)) value="{{$export_details->e_seal_cfs_seal}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="phyto" class="form-label">PHYTO:</label>
              <select id="phyto" name="phyto" class="form-select">
                <option value="">Choose...</option>
                <option value="Yes" @if(isset($export_details) && $export_details->phyto == 'Yes') selected @endif>Yes</option>
                <option value="No" @if(isset($export_details) && $export_details->phyto == 'No') selected @endif>No</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="fumigation" class="form-label">FUMIGATION:</label>
              <select id="fumigation" name="fumigation" class="form-select">
                <option value="">Choose...</option>
                <option value="Yes" @if(isset($export_details) && $export_details->fumigation == 'Yes') selected @endif>Yes</option>
                <option value="No" @if(isset($export_details) && $export_details->fumigation == 'No') selected @endif>No</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">NAME OF FUMGN. AGENT:</label>
              <input type="text" class="form-control" id="name_of_fumgn_agent" name="name_of_fumgn_agent"  @if(isset($export_details)) value="{{$export_details->name_of_fumgn_agent}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">COO. OR GSP.:</label>
              <input type="text" class="form-control" id="coo_or_gsp" name="coo_or_gsp"  @if(isset($export_details)) value="{{$export_details->coo_or_gsp}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">NAME OF GOODS:</label>
              <input type="text" class="form-control" id="name_of_goods" name="name_of_goods"  @if(isset($export_details)) value="{{$export_details->name_of_goods}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">CARTING SEND TO SPG CO. ON:</label>
              <input type="text" class="form-control" id="carting_send_to_spg_co_on" name="carting_send_to_spg_co_on"  @if(isset($export_details)) value="{{$export_details->carting_send_to_spg_co_on}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">CARTING RECEIVED ON:</label>
              <input type="text" class="form-control" id="carting_received_on" name="carting_received_on"  @if(isset($export_details)) value="{{$export_details->carting_received_on}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">B/L DRAFT MADE ON:</label>
              <input type="text" class="form-control" id="b_l_draft_made_on" name="b_l_draft_made_on"  @if(isset($export_details)) value="{{$export_details->b_l_draft_made_on}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">VESSEL SAILED ON:</label>
              <input type="text" class="form-control" id="vessel_sailed_on" name="vessel_sailed_on"  @if(isset($export_details)) value="{{$export_details->vessel_sailed_on}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">S/B NO:</label>
              <input type="text" class="form-control" id="s_b_no" name="s_b_no"  @if(isset($export_details)) value="{{$export_details->s_b_no}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">DOCUMENT SEND TO DOCK/CFS ON:</label>
              <input type="text" class="form-control" id="document_send_to_dock_cfs_on" name="document_send_to_dock_cfs_on"  @if(isset($export_details)) value="{{$export_details->document_send_to_dock_cfs_on}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">REMARKS:</label>
              <input type="text" class="form-control" id="remarks" name="remarks"  @if(isset($export_details)) value="{{$export_details->remarks}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">SHIPPING LINE NAME</label>
              <input type="text" class="form-control" id="inputName5" name="shipping_line_name" @if(isset($export_details)) value="{{$export_details->shipping_line_name}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">FORWARDING NAME</label>
              <input type="text" class="form-control" id="inputName5" name="forwarding_name" @if(isset($export_details)) value="{{$export_details->forwarding_name}}" @endif>
            </div>
            {{-- <div class="text-center">
              <button type="save" class="btn btn-primary">Save</button>
              <button type="update" class="btn btn-primary">Update</button>
            </div> --}}
            <p></p>
            <hr>
            <h5 class="card-title">CONTAINER DETAILS</h5>

            @if (isset($_GET['job_no']))

              <div class="add_new_container row" style="display: none">
                <div>
                  <input type="hidden" name="new_data_add" id="new_data_add" value="">
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">BOOKING NO.:</label>
                  <input type="text" class="form-control" id="booking_no" name="booking_no"  @if(isset($Container)) value="{{$Container->booking_no}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">CONTAINER & SEAL NO.:</label>
                  <input type="text" class="form-control" id="container_seal_no" name="container_seal_no"  @if(isset($Container)) value="{{$Container->container_seal_no}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">TARE WT.:</label>
                  <input type="text" class="form-control" id="tare_wt" name="tare_wt"  @if(isset($Container)) value="{{$Container->tare_wt}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">PAY LOAD:</label>
                  <input type="text" class="form-control" id="payload" name="payload"  @if(isset($Container)) value="{{$Container->payload}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">VGM WT. OF CONT.:</label>
                  <input type="text" class="form-control" id="vgm_wt_of_cont" name="vgm_wt_of_cont"  @if(isset($Container)) value="{{$Container->vgm_wt_of_cont}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">LORRY NO.:</label>
                  <input type="text" class="form-control" id="lorry_no" name="lorry_no"  @if(isset($Container)) value="{{$Container->lorry_no}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">PICKED ON:</label>
                  <input type="text" class="form-control" id="picked_on" name="picked_on"  @if(isset($Container)) value="{{$Container->picked_on}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">REACH AT FACTORY:</label>
                  <input type="text" class="form-control" id="reach_at_factory" name="reach_at_factory"  @if(isset($Container)) value="{{$Container->reach_at_factory}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">RELEASE FROM FACTORY:</label>
                  <input type="text" class="form-control" id="release_from_factory" name="release_from_factory"  @if(isset($Container)) value="{{$Container->release_from_factory}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">ENTRY AT DOCK:</label>
                  <input type="text" class="form-control" id="entry_at_dock" name="entry_at_dock"  @if(isset($Container)) value="{{$Container->entry_at_dock}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">ACTUAL UNLOADING ON:</label>
                  <input type="text" class="form-control" id="actual_unloading_on" name="actual_unloading_on"  @if(isset($Container)) value="{{$Container->actual_unloading_on}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">TRANSPORT NAME:</label>
                  <input type="text" class="form-control" id="transport_name" name="transport_name"  @if(isset($Container)) value="{{$Container->transport_name}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">REMARK OF CONT.:</label>
                  <input type="text" class="form-control" id="remark_of_cont" name="remark_of_cont"  @if(isset($Container)) value="{{$Container->remark_of_cont}}" @endif>
                </div>
              </div>

              <div class="update_container row">
                @foreach ($ContainerList as $Container)
                <div>
                  <input type="hidden" name="container_id" value="{{$Container->id}}">
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">BOOKING NO.:</label>
                  <input type="text" class="form-control" id="booking_no" name="update_booking_no"  @if(isset($Container)) value="{{$Container->booking_no}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">CONTAINER & SEAL NO.:</label>
                  <input type="text" class="form-control" id="container_seal_no" name="update_container_seal_no"  @if(isset($Container)) value="{{$Container->container_seal_no}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">TARE WT.:</label>
                  <input type="text" class="form-control" id="tare_wt" name="update_tare_wt"  @if(isset($Container)) value="{{$Container->tare_wt}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">PAY LOAD:</label>
                  <input type="text" class="form-control" id="payload" name="update_payload"  @if(isset($Container)) value="{{$Container->payload}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">VGM WT. OF CONT.:</label>
                  <input type="text" class="form-control" id="vgm_wt_of_cont" name="update_vgm_wt_of_cont"  @if(isset($Container)) value="{{$Container->vgm_wt_of_cont}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">LORRY NO.:</label>
                  <input type="text" class="form-control" id="lorry_no" name="update_lorry_no"  @if(isset($Container)) value="{{$Container->lorry_no}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">PICKED ON:</label>
                  <input type="text" class="form-control" id="picked_on" name="update_picked_on"  @if(isset($Container)) value="{{$Container->picked_on}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">REACH AT FACTORY:</label>
                  <input type="text" class="form-control" id="reach_at_factory" name="update_reach_at_factory"  @if(isset($Container)) value="{{$Container->reach_at_factory}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">RELEASE FROM FACTORY:</label>
                  <input type="text" class="form-control" id="release_from_factory" name="update_release_from_factory"  @if(isset($Container)) value="{{$Container->release_from_factory}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">ENTRY AT DOCK:</label>
                  <input type="text" class="form-control" id="entry_at_dock" name="update_entry_at_dock"  @if(isset($Container)) value="{{$Container->entry_at_dock}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">ACTUAL UNLOADING ON:</label>
                  <input type="text" class="form-control" id="actual_unloading_on" name="update_actual_unloading_on"  @if(isset($Container)) value="{{$Container->actual_unloading_on}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">TRANSPORT NAME:</label>
                  <input type="text" class="form-control" id="transport_name" name="update_transport_name"  @if(isset($Container)) value="{{$Container->transport_name}}" @endif>
                </div>
                <div class="col-md-2">
                  <label for="inputName7" class="form-label">REMARK OF CONT.:</label>
                  <input type="text" class="form-control" id="remark_of_cont" name="update_remark_of_cont"  @if(isset($Container)) value="{{$Container->remark_of_cont}}" @endif>
                </div>
                @endforeach
              </div>

              <div class="my-4 row">

                <div class="col-md-6 text-right float-right" style="    text-align: right;">
                  @if(isset($export_details))
                  <button type="button" class="btn btn-info show_add_container_btn" onclick="add_new_container_sec()">Add New</button>
                  <button type="button" style="display: none" class="btn btn-warning show_update_container_btn" onclick="show_update_container_sec()">Old Container</button>
                  <button type="save" class="btn btn-primary">Update</button>
                  @endif
                </div>
                <div class="col-md-6 pagination_p">
                  {{$ContainerList->appends(request()->query())->links();}}
                </div>
                
                
              </div>
              

            @else
            <div class="col-md-2">
              <label for="inputName7" class="form-label">BOOKING NO.:</label>
              <input type="text" class="form-control" id="booking_no" name="booking_no"  @if(isset($Container)) value="{{$Container->booking_no}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">CONTAINER & SEAL NO.:</label>
              <input type="text" class="form-control" id="container_seal_no" name="container_seal_no"  @if(isset($Container)) value="{{$Container->container_seal_no}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">TARE WT.:</label>
              <input type="text" class="form-control" id="tare_wt" name="tare_wt"  @if(isset($Container)) value="{{$Container->tare_wt}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">PAY LOAD:</label>
              <input type="text" class="form-control" id="payload" name="payload"  @if(isset($Container)) value="{{$Container->payload}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">VGM WT. OF CONT.:</label>
              <input type="text" class="form-control" id="vgm_wt_of_cont" name="vgm_wt_of_cont"  @if(isset($Container)) value="{{$Container->vgm_wt_of_cont}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">LORRY NO.:</label>
              <input type="text" class="form-control" id="lorry_no" name="lorry_no"  @if(isset($Container)) value="{{$Container->lorry_no}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">PICKED ON:</label>
              <input type="text" class="form-control" id="picked_on" name="picked_on"  @if(isset($Container)) value="{{$Container->picked_on}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">REACH AT FACTORY:</label>
              <input type="text" class="form-control" id="reach_at_factory" name="reach_at_factory"  @if(isset($Container)) value="{{$Container->reach_at_factory}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">RELEASE FROM FACTORY:</label>
              <input type="text" class="form-control" id="release_from_factory" name="release_from_factory"  @if(isset($Container)) value="{{$Container->release_from_factory}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">ENTRY AT DOCK:</label>
              <input type="text" class="form-control" id="entry_at_dock" name="entry_at_dock"  @if(isset($Container)) value="{{$Container->entry_at_dock}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">ACTUAL UNLOADING ON:</label>
              <input type="text" class="form-control" id="actual_unloading_on" name="actual_unloading_on"  @if(isset($Container)) value="{{$Container->actual_unloading_on}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">TRANSPORT NAME:</label>
              <input type="text" class="form-control" id="transport_name" name="transport_name"  @if(isset($Container)) value="{{$Container->transport_name}}" @endif>
            </div>
            <div class="col-md-2">
              <label for="inputName7" class="form-label">REMARK OF CONT.:</label>
              <input type="text" class="form-control" id="remark_of_cont" name="remark_of_cont"  @if(isset($Container)) value="{{$Container->remark_of_cont}}" @endif>
            </div>

            <div class="text-center">
              
              
              <button type="save" class="btn btn-primary">Save</button>
            </div>

            @endif

            

            
            
          </form>
          <!-- End Multi Columns Form -->
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
            <table class="table"  id="example" >
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Job Created Dt.:</th>
                  <th scope="col">Job No.:</th>
                  <th scope="col">Bill No.:</th>
                  <th scope="col">Invoice. No.:</th>
                  <th scope="col">Party Name:</th>
                  <th scope="col">Gross Wt.:</th>
                  <th scope="col">Port Of Loading:</th>
                  <th scope="col">Port Of Discharge:</th>
                  <th scope="col">Vessel & Voy.:</th>
                  <th scope="col">Mslpl Forwarder Name:</th>
                  <th scope="col">Obl Delivered On/To:</th>
                  <th scope="col">Through Doc. Receive:</th>
                  <th scope="col">No. Of Pkgs:</th>
                  <th scope="col">No. Of Containers:</th>
                  <th scope="col">E Seal / Cfs Seal:</th>
                  <th scope="col">Phyto:</th>
                  <th scope="col">Fumigation:</th>
                  <th scope="col">Name Of Fumgn. Agent:</th>
                  <th scope="col">Coo. Or Gsp.:</th>
                  <th scope="col">Name Of Goods:</th>
                  <th scope="col">Carting Send To Spg Co. On:</th>
                  <th scope="col">Carting Received On:</th>
                  <th scope="col">B/L Draft Made On:</th>
                  <th scope="col">Vessel Sailed On:</th>
                  <th scope="col">S/B No.:</th>
                  <th scope="col">Document Send To Dock/Cfs On:</th>
                  <th scope="col">Remarks:</th>
                  <th scope="col">Forwarder name</th>
                  <th scope="col">Shipping Line</th>
                  <th scope="col">Booking No.:</th>
                  <th scope="col">Container & Seal No.:</th>
                  <th scope="col">Tare Wt.:</th>
                  <th scope="col">Pay Load:</th>
                  <th scope="col">Vgm Wt. Of Cont.:</th>
                  <th scope="col">Lorry No.:</th>
                  <th scope="col">Picked On:</th>
                  <th scope="col">Reach At Factory:</th>
                  <th scope="col">Release From Factory:</th>
                  <th scope="col">Entry At Dock:</th>
                  <th scope="col">Actual Unloading On:</th>
                  <th scope="col">Transport Name:</th>
                  <th scope="col">Remark Of Cont.:</th>
                  
                  <th scope="col">Edit</th>
                </tr>
              </thead>
              <tbody>


                @foreach ($exports as $key=> $item)
                    <tr @if(!empty($item->bill_no)) style="background:#bbff99" @endif>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$key+1}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>
                      @php
                            $existingDate = $item->job_created_dt;
                            if ( $existingDate != '') {
                              $formattedDate = date("d-m-Y", strtotime($existingDate));
                              echo $formattedDate;
                            }
                        @endphp 
                      </td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->job_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->bill_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->invoice_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->party_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->gross_wt}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->port_of_loading}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->port_of_discharge}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->vessel_and_voy}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->mslpl_forwarder_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->obl_delivered_on_to}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->through_doc_receive}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->no_of_pkgs}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->no_of_containers}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->e_seal_cfs_seal}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->phyto}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->fumigation	}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->name_of_fumgn_agent}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->coo_or_gsp}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->name_of_goods}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->carting_send_to_spg_co_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->carting_received_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->b_l_draft_made_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->vessel_sailed_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->s_b_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->document_send_to_dock_cfs_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->remarks}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->forwarding_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->shipping_line_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->booking_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->container_seal_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->tare_wt}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->payload}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->vgm_wt_of_cont}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->lorry_no}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->picked_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->reach_at_factory}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->release_from_factory}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->entry_at_dock}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->actual_unloading_on}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->transport_name}}</td>
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif>{{$item->remark_of_cont}}</td>
                      
                      <td @if(!empty($item->bill_no)) style="background:#bbff99" @endif><a href="{{URL::to('admin/export_form?job_no='.$item->job_no)}}">Edit</a></td>
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
    <script>

      function add_new_container_sec() {
          $('.add_new_container').show();
          $('.show_update_container_btn').show();
          $('.update_container').hide();
          $('.show_add_container_btn').hide();

          $('#new_data_add').val('yes');
      }

      function show_update_container_sec() {
          $('.add_new_container').hide();
          $('.show_update_container_btn').hide();
          $('.update_container').show();
          $('.show_add_container_btn').show();
          $('#new_data_add').val('no');
      }

      function get_export_details(job_number) {

        

        $.ajax({
            type: "GET",
            url: "{{URL::to('admin/get_export_data_ajax')}}",// where you wanna post
            data: {
                'job_number':job_number
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            },
            success: function(response) {
              console.log(data);
              var data  = response[0];
              if (data.status == true) {
                window.location.href = "{{URL::to('admin/export_form?job_no=')}}"+job_number;
              } else {
                $('.job_num_error').html(data.message);
                $('.job_num_error').show();
                
                // $('#bill_no').val(data.bill_no);
                // $('#invoice_no').val(data.invoice_no);
                // $('#party_name').val(data.party_name);
                // $('#gross_wt').val(data.gross_wt);
                // $('#port_of_loading').val(data.port_of_loading);
                // $('#port_of_discharge').val(data.port_of_discharge);
                // $('#vessel_and_voy').val(data.vessel_and_voy);
                // $('#mslpl_forwarder_name').val(data.mslpl_forwarder_name);
                // $('#obl_delivered_on_to').val(data.obl_delivered_on_to);
                // $('#through_doc_receive').val(data.through_doc_receive);
                // $('#no_of_pkgs').val(data.no_of_pkgs);
                // $('#no_of_containers').val(data.no_of_containers);
                // $('#e_seal_cfs_seal').val(data.e_seal_cfs_seal);
                // $('#phyto').val(data.phyto);
                // $('#fumigation').val(data.fumigation);
                // $('#name_of_fumgn_agent').val(data.name_of_fumgn_agent);
                // $('#coo_or_gsp').val(data.coo_or_gsp);
                // $('#name_of_goods').val(data.name_of_goods);
                // $('#carting_send_to_spg_co_on').val(data.carting_send_to_spg_co_on);
                // $('#carting_received_on').val(data.carting_received_on);
                // $('#b_l_draft_made_on').val(data.b_l_draft_made_on);
                // $('#vessel_sailed_on').val(data.vessel_sailed_on);
                // $('#s_b_no').val(data.s_b_no);
                // $('#document_send_to_dock_cfs_on').val(data.document_send_to_dock_cfs_on);
                // $('#remarks').val(data.remarks);
              }
              

                
                
            } 
        });















      }
    </script>
@endsection