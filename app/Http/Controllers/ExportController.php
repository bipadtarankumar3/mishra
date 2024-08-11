<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use App\Models\export;
use App\Models\Container;

use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Str;

use Config;
use Mail;
use App\Mail\adminForgotPassMail;
use App\Mail\OtpVerifyMail;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function export_form(Request $request){

        $login_date = Session::get('year');

        if (!empty($request->job_no)) {
            $data['job_no'] = $request->job_no;
            $data['export_details'] = export::where('job_no',$request->job_no)->first();
            $data['ContainerList'] = Container::where('export_id',$data['export_details']->id)->simplePaginate(1);

        }
        

        $data['exports'] = export::join('containers','containers.export_id','exports.id')
        ->where('create_date',$login_date)
        ->orderBy('exports.id','desc')->get();

        $export = export::orderBy('id','desc')->first();
        
        if ($export) {

            $job_no = explode('-',$export->job_no);
            $no = isset($job_no[2])?$job_no[2]+1:001;

            $data['no'] = 'MIS-EXP-'.sprintf('%03d',$no);
        } else {
            $data['no'] = 'MIS-EXP-001';
        }

        return view('admin.export.export_form',$data);
    }
    // public function search_export(Request $request){

    //     $where = '1=1';
    //     $data = $request->all();    
    //     $login_date = Session::get('year');
    //     if(count($data) > 0 )
    //     {
    //         if($request->search_type == 'job_no')
    //         {
    //             $name = $request->name;
    //             $where .= " and exports.job_no =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         if($request->search_type == 'bill_no')
    //         {
    //             $name = $request->name;
    //             $where .= " and exports.bill_no =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         if($request->search_type == 'inv_no')
    //         {
    //             $name = $request->name;
    //             $where .= " and exports.invoice_no =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         if($request->search_type == 'container_no')
    //         {
    //             $name = $request->name;
    //             $where .= " and exports.no_of_containers =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         if($request->search_type == 's_b_no')
    //         {
    //             $name = $request->name;
    //             $where .= " and exports.s_b_no =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         if($request->search_type == 'document_send_to_dock_cfs_on')
    //         {
    //             $name = $request->name;
    //             $where .= " and exports.document_send_to_dock_cfs_on =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         $data['exports'] = export::join('containers','containers.export_id','exports.id')->whereRaw($where)->where('create_date',$login_date)->get();
    //     }else{
    //         $data['exports'] = [];
    //     }

    //     return view('admin.export.search_export',$data);
    // }


    public function search_export(Request $request)
    {
        $data = $request->all();
        $login_date = Session::get('year');
    
        // Initialize an array to map search types to database fields
        $searchFields = [
            'job_no' => 'exports.job_no',
            'bill_no' => 'exports.bill_no',
            'inv_no' => 'exports.invoice_no',
            'container_no' => 'exports.container_seal_no',
            's_b_no' => 'exports.s_b_no'
        ];
    
        // Check if the provided search type is valid
        if (isset($searchFields[$request->search_type])) {
            // Get the database field corresponding to the search type
            $fieldName = $searchFields[$request->search_type];
    
            $data['exports'] = Export::join('containers', 'containers.export_id', 'exports.id')
                    ->where($fieldName, 'like', '%' . $request->name . '%')
                    ->where('create_date', $login_date)
                    ->get();
        } else {
            // Invalid search type, handle accordingly
            $data['exports'] = [];
            // You might want to add a flash message or handle the error in some other way
        }
    
        return view('admin.export.search_export', $data);
    }



 
    public function export_form_submit(Request $request){

        if(Auth::check()){

            $login_date = Session::get('year');

            // dd($request->all());

            if ($request->id !='') {

                $container_id = $request->container_id;
                
                $data = export::where('id',$request->id)->update([
                    'job_created_dt' => $request->job_created_dt,
                    'job_no' => $request->job_no,
                    'bill_no' => $request->bill_no,
                    'invoice_no' => $request->invoice_no,
                    'party_name' => $request->party_name,
                    'gross_wt' => $request->gross_wt,
                    'port_of_loading' => $request->port_of_loading,
                    'port_of_discharge' => $request->port_of_discharge,
                    'vessel_and_voy' => $request->vessel_and_voy,
                    // 'ship_comp_name' => $request->ship_comp_name,
                    // 'vessel_name' => $request->vessel_name,
                    'mslpl_forwarder_name' => $request->mslpl_forwarder_name,
                    'obl_delivered_on_to' => $request->obl_delivered_on_to,
                    'through_doc_receive' => $request->through_doc_receive,
                    'no_of_pkgs' => $request->no_of_pkgs,
                    'no_of_containers' => $request->no_of_containers,
                    'e_seal_cfs_seal' => $request->e_seal_cfs_seal,
                    'phyto' => $request->phyto,
                    'fumigation' => $request->fumigation,
                    'name_of_fumgn_agent' => $request->name_of_fumgn_agent,
                    'coo_or_gsp' => $request->coo_or_gsp,
                    'name_of_goods' => $request->name_of_goods,
                    'carting_send_to_spg_co_on' => $request->carting_send_to_spg_co_on,
                    'carting_received_on' => $request->carting_received_on,
                    'b_l_draft_made_on' => $request->b_l_draft_made_on,
                    'vessel_sailed_on' => $request->vessel_sailed_on,
                    's_b_no' => $request->s_b_no,
                    'document_send_to_dock_cfs_on' => $request->document_send_to_dock_cfs_on,
                    'shipping_line_name' => $request->shipping_line_name,
                    'forwarding_name' => $request->forwarding_name,
                    'remarks' => $request->remarks
                    
                ]);

                if ($request->new_data_add == 'yes') {
                    $Container = Container::create([
                        'export_id' => $request->id,
                        'booking_no' => $request->booking_no,
                        'container_seal_no' => $request->container_seal_no,
                        'tare_wt' => $request->tare_wt,
                        'payload' => $request->payload,
                        'vgm_wt_of_cont' => $request->vgm_wt_of_cont,
                        'lorry_no' => $request->lorry_no,
                        'picked_on' => $request->picked_on,
                        'reach_at_factory' => $request->reach_at_factory,
                        'release_from_factory' => $request->release_from_factory,
                        'entry_at_dock' => $request->entry_at_dock,
                        'actual_unloading_on' => $request->actual_unloading_on,
                        'transport_name' => $request->transport_name,
                        'remark_of_cont' => $request->remark_of_cont
                    ]);
                }

                $Container = Container::where('id',$container_id)->update([
                    'booking_no' => $request->update_booking_no,
                    'container_seal_no' => $request->update_container_seal_no,
                    'tare_wt' => $request->update_tare_wt,
                    'payload' => $request->update_payload,
                    'vgm_wt_of_cont' => $request->update_vgm_wt_of_cont,
                    'lorry_no' => $request->update_lorry_no,
                    'picked_on' => $request->update_picked_on,
                    'reach_at_factory' => $request->update_reach_at_factory,
                    'release_from_factory' => $request->update_release_from_factory,
                    'entry_at_dock' => $request->update_entry_at_dock,
                    'actual_unloading_on' => $request->update_actual_unloading_on,
                    'transport_name' => $request->update_transport_name,
                    'remark_of_cont' => $request->update_remark_of_cont
                ]);
                
                $notification = array(
                    'messege'=>'Data Updated successfully',
                    'alert-type'=>'success'
                );
                return back()->with($notification);
            } else {

                $export = export::create([
                    'job_created_dt' => $request->job_created_dt,
                    'job_no' => $request->job_no,
                    'bill_no' => $request->bill_no,
                    'invoice_no' => $request->invoice_no,
                    'party_name' => $request->party_name,
                    'gross_wt' => $request->gross_wt,
                    'port_of_loading' => $request->port_of_loading,
                    'port_of_discharge' => $request->port_of_discharge,
                    'vessel_and_voy' => $request->vessel_and_voy,
                    // 'ship_comp_name' => $request->ship_comp_name,
                    // 'vessel_name' => $request->vessel_name,
                    'mslpl_forwarder_name' => $request->mslpl_forwarder_name,
                    'obl_delivered_on_to' => $request->obl_delivered_on_to,
                    'through_doc_receive' => $request->through_doc_receive,
                    'no_of_pkgs' => $request->no_of_pkgs,
                    'no_of_containers' => $request->no_of_containers,
                    'e_seal_cfs_seal' => $request->e_seal_cfs_seal,
                    'phyto' => $request->phyto,
                    'fumigation' => $request->fumigation,
                    'name_of_fumgn_agent' => $request->name_of_fumgn_agent,
                    'coo_or_gsp' => $request->coo_or_gsp,
                    'name_of_goods' => $request->name_of_goods,
                    'carting_send_to_spg_co_on' => $request->carting_send_to_spg_co_on,
                    'carting_received_on' => $request->carting_received_on,
                    'b_l_draft_made_on' => $request->b_l_draft_made_on,
                    'vessel_sailed_on' => $request->vessel_sailed_on,
                    's_b_no' => $request->s_b_no,
                    'document_send_to_dock_cfs_on' => $request->document_send_to_dock_cfs_on,
                    'remarks' => $request->remarks,
                    'shipping_line_name' => $request->shipping_line_name,
                    'forwarding_name' => $request->forwarding_name,
                    'create_date' => $login_date
                ]);

                // dd($export);

                $Container = Container::create([
                    'export_id' => $export->id,
                    'booking_no' => $request->booking_no,
                    'container_seal_no' => $request->container_seal_no,
                    'tare_wt' => $request->tare_wt,
                    'payload' => $request->payload,
                    'vgm_wt_of_cont' => $request->vgm_wt_of_cont,
                    'lorry_no' => $request->lorry_no,
                    'picked_on' => $request->picked_on,
                    'reach_at_factory' => $request->reach_at_factory,
                    'release_from_factory' => $request->release_from_factory,
                    'entry_at_dock' => $request->entry_at_dock,
                    'actual_unloading_on' => $request->actual_unloading_on,
                    'transport_name' => $request->transport_name,
                    'remark_of_cont' => $request->remark_of_cont
                ]);

                $notification = array(
                    'messege'=>'Data inserted successfully',
                    'alert-type'=>'success'
                );
                return back()->with($notification);

            }
            


        }
    }

    
    public function edit_export($id){

        if(Auth::check()){
            $login_date = Session::get('year');
            $data['export_details'] = export::where('id',$id)->first();
            $data['exports'] = export::where('create_date',$login_date)->get();

            $export = export::orderBy('id','desc')->first();
            if ($export) {

                $job_no = explode('-',$export->job_no);
                $no = isset($job_no[2])?$job_no[2]+1:001;
    
                $data['no'] = 'MIS-EXP-'.sprintf('%03d',$no);
            } else {
                $data['no'] = 'MIS-EXP-001';
            }

            return view('admin.export.export_form',$data);
        }
    }

    public function get_export_data_ajax(Request $request){

        if(Auth::check()){
            $login_date = Session::get('year');
            $job_number = $request->job_number;
            $export_details = export::where('job_no',$job_number)->where('create_date',$login_date)->first();

            if ($export_details) {
                $data = array([
                    'message'=>"",
                    'status'=>true,
                    'data'=>$export_details,
                ]);
                return Response::json($data);
            } else {
                $data = array([
                    'message'=>"Not get any job number",
                    'status'=>false,
                    'data'=>[],
                ]);
                return Response::json($data);
            }
            

            
        }
    }

}
