@extends('adminLayouts.home')
@section('content')



<div class="pagetitle">
    <h1>Search Export</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
     <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" >
              <div class="col-md-3">
                <label for="inputName5" class="form-label">Search By</label>
                <div class="col-sm-12">
                  <select class="form-select" name="search_type" aria-label="Default select example">
                    <option selected="">Select one from list</option>
                    <option value="s_b_no"  @if(isset($_GET['search_type']) && $_GET['search_type'] == 's_b_no') selected @endif >S/B No</option>
                    <option value="bill_no"  @if(isset($_GET['search_type']) && $_GET['search_type'] == 'bill_no') selected @endif >Bill No</option>
                    <option value="inv_no"  @if(isset($_GET['search_type']) && $_GET['search_type'] == 'inv_no') selected @endif >Invoice No</option>
                    <option value="container_no"  @if(isset($_GET['search_type']) && $_GET['search_type'] == 'container_no') selected @endif >Container No</option>
                   
                  </select>
                </div>
              </div>
          
      
              <div class="col-md-2">
                <label for="inputName7" class="form-label"><br></label>
                <input type="text" @if(isset($_GET['name'])) value="{{$_GET['name']}}" @endif name="name" class="form-control" id="inputdate">
              </div>
              <div class="col-md-2">
                <label for="inputName5" class="form-label"><br></label>
                <button type="submit" class="btn btn-primary form-control">Search</button>
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
                    <td>{{$item->invoice_no}}</td>
                    <td>{{$item->party_name}}</td>
                    <td>{{$item->gross_wt}}</td>
                    <td>{{$item->port_of_loading}}</td>
                    <td>{{$item->port_of_discharge}}</td>
                    <td>{{$item->vessel_and_voy}}</td>
                    <td>{{$item->mslpl_forwarder_name}}</td>
                    <td>{{$item->obl_delivered_on_to}}</td>
                    <td>{{$item->through_doc_receive}}</td>
                    <td>{{$item->no_of_pkgs}}</td>
                    <td>{{$item->no_of_containers}}</td>
                    <td>{{$item->e_seal_cfs_seal}}</td>
                    <td>{{$item->phyto}}</td>
                    <td>{{$item->fumigation	}}</td>
                    <td>{{$item->name_of_fumgn_agent}}</td>
                    <td>{{$item->coo_or_gsp}}</td>
                    <td>{{$item->name_of_goods}}</td>
                    <td>{{$item->carting_send_to_spg_co_on}}</td>
                    <td>{{$item->carting_received_on}}</td>
                    <td>{{$item->b_l_draft_made_on}}</td>
                    <td>{{$item->vessel_sailed_on}}</td>
                    <td>{{$item->s_b_no}}</td>
                    <td>{{$item->document_send_to_dock_cfs_on}}</td>
                    <td>{{$item->remarks}}</td>
                    <td>{{$item->booking_no}}</td>
                    <td>{{$item->container_seal_no}}</td>
                    <td>{{$item->tare_wt}}</td>
                    <td>{{$item->payload}}</td>
                    <td>{{$item->vgm_wt_of_cont}}</td>
                    <td>{{$item->lorry_no}}</td>
                    <td>{{$item->picked_on}}</td>
                    <td>{{$item->reach_at_factory}}</td>
                    <td>{{$item->release_from_factory}}</td>
                    <td>{{$item->entry_at_dock}}</td>
                    <td>{{$item->actual_unloading_on}}</td>
                    <td>{{$item->transport_name}}</td>
                    <td>{{$item->remark_of_cont}}</td>
                    <td><a href="{{URL::to('admin/export_form?job_no='.$item->job_no)}}">Edit</a></td>
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