<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use App\Models\Import;

use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Str;

use Config;
use Mail;
use App\Mail\adminForgotPassMail;
use App\Mail\OtpVerifyMail;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class ImportController extends Controller
{
    public function import_form(){

         $login_date = Session::get('year');
        $data['imports'] = Import::where('create_date',$login_date)->orderBy('imports.id','desc')->get();

        $import = Import::orderBy('id','desc')->first();

        if ($import) {

            $job_no = explode('-',$import->job_no);
            $no = isset($job_no[2])?$job_no[2]+1:001;

            $data['no'] = 'MIS-IMP-'.sprintf('%03d',$no);
        } else {
            $data['no'] = 'MIS-IMP-001';
        }
        return view('admin.import.import_form',$data);
    }

    // public function search_import(Request $request){

    //     $where = '1=1';
    //     $data = $request->all();
    //      $login_date = Session::get('year');
    //     if(count($data) > 0 )
    //     {
    //         if($request->search_type == 'bl_no_and_date')
    //         {
    //             $name = $request->name;
    //             $where .= " and imports.bl_no_and_date =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         if($request->search_type == 'bill_no')
    //         {
    //             $name = $request->name;
    //             $where .= " and imports.bill_no =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         if($request->search_type == 'inv_no')
    //         {
    //             $name = $request->name;
    //             $where .= " and imports.invoice_no =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
    //         if($request->search_type == 'be_no')
    //         {
    //             $name = $request->name;
    //             $where .= " and imports.be_no =  '$name'" ;
    //             $array['search_type'] = $request->name;
    //             $array['name'] = $request->name;
    //         }
            
    //         $data['imports'] = Import::whereRaw($where)->where('create_date',$login_date)->get();
    //     }else{
    //         $data['imports'] = [];
    //     }
    //     return view('admin.import.search_import',$data);
    // }

public function search_import(Request $request)
{
    $data = $request->all();
    $login_date = Session::get('year');

    // Initialize the WHERE clause
    $where = [];

    // Check if any search parameters are provided
    if (count($data) > 0) {
        // Construct the WHERE clause based on the search type
        switch ($request->search_type) {
            case 'bl_no_and_date':
                $where[] = ['imports.bl_no_and_date', 'like', '%' . $request->name . '%'];
                break;
            case 'bill_no':
                $where[] = ['imports.bill_no', 'like', '%' . $request->name . '%'];
                break;
            case 'inv_no':
                $where[] = ['imports.invoice_no', 'like', '%' . $request->name . '%'];
                break;
            case 'bill_of_entry_n__and_date':
                $where[] = ['imports.bill_of_entry_n__and_date', 'like', '%' . $request->name . '%'];
                break;
        }
    }

    // Execute the query
    $data['imports'] = Import::where($where)->where('create_date', $login_date)->get();

    // If no results found, return an empty array
    if (!$data['imports']) {
        $data['imports'] = [];
    }

    return view('admin.import.search_import', $data);
}



    
    public function add_inport_form(Request $request){

        $login_date = Session::get('year');

        if(Auth::check()){

            if ($request->id !='') {
                

                $data = Import::where('id',$request->id)->update([
                    'job_created_dt' => $request->job_created_dt,
                    'job_no' => $request->job_no,
                    'bill_no' => $request->bill_no,
                    'total_sale_bill_amount' => $request->total_sale_bill_amount,
                    'bill_of_entry_n__and_date' => $request->bill_of_entry_n__and_date,
                    'invoice_no' => $request->invoice_no,
                    'party_importer_name' => $request->party_importer_name,
                    'xerox_doc_rcvd_on' => $request->xerox_doc_rcvd_on,
                    'thro_forw_name' => $request->thro_forw_name,
                    'ship_comp_name' => $request->ship_comp_name,
                    'vessel_name' => $request->vessel_name,
                    'voyag_flight_no' => $request->voyag_flight_no,
                    'igm_no_and_date' => $request->igm_no_and_date,
                    'final_entry_on' => $request->final_entry_on,
                    'line_no' => $request->line_no,
                    'bl_no_and_date' => $request->bl_no_and_date,
                    'free_time_till_date' => $request->free_time_till_date,
                    'shipping_comp_bill_amt' => $request->shipping_comp_bill_amt,
                    'shipping_comp_bill_to' => $request->shipping_comp_bill_to,
                    'ship_comp_sec_deps_amt' => $request->ship_comp_sec_deps_amt,
                    'ship_co_payment_made_by' => $request->ship_co_payment_made_by,
                    'sd_amt_payer_mode' => $request->sd_amt_payer_mode,
                    'delivery_order_rcvd_on' => $request->delivery_order_rcvd_on,
                    'secur_depos_rcvd_on' => $request->secur_depos_rcvd_on,
                    'no_of_contr_w_o_s_ch_no' => $request->no_of_contr_w_o_s_ch_no,
                    'contr_no' => $request->contr_no,
                    'name_of_the_transporter' => $request->name_of_the_transporter,
                    'name_of_cfs' => $request->name_of_cfs,
                    'cfs_bill_paid_by' => $request->cfs_bill_paid_by,
                    'container_release_from_cfs_on' => $request->container_release_from_cfs_on,
                    'contr_rels_from_party_warehouse_on' => $request->contr_rels_from_party_warehouse_on,
                    'checklist_send_to_party_on' => $request->checklist_send_to_party_on,
                    'chklist_conf_by_party_on' => $request->chklist_conf_by_party_on,
                    'duty_paid_by' => $request->duty_paid_by,
                    'description_of_goods' => $request->description_of_goods,
                    'h_s_code' => $request->h_s_code,
                    'duty_structure' => $request->duty_structure,
                    'gross_weight' => $request->gross_weight,
                    'net_weight' => $request->net_weight,
                    'remarks' => $request->remarks,
                    'total_purchase' => $request->total_purchase,
                    'shipping_line_name' => $request->shipping_line_name,
                    'forwarding_name' => $request->forwarding_name,
                    'job_completion_date' => $request->job_completion_date
                ]);
                
                $notification = array(
                    'messege'=>'Data Updated successfully',
                    'alert-type'=>'success'
                );
                return back()->with($notification);
            } else {

                
                

                $data = Import::create([
                    'job_created_dt' => $request->job_created_dt,
                    'job_no' => $request->job_no,
                    'bill_no' => $request->bill_no,
                    'total_sale_bill_amount' => $request->total_sale_bill_amount,
                    'bill_of_entry_n__and_date' => $request->bill_of_entry_n__and_date,
                    'invoice_no' => $request->invoice_no,
                    'party_importer_name' => $request->party_importer_name,
                    'xerox_doc_rcvd_on' => $request->xerox_doc_rcvd_on,
                    'thro_forw_name' => $request->thro_forw_name,
                    'ship_comp_name' => $request->ship_comp_name,
                    'vessel_name' => $request->vessel_name,
                    'voyag_flight_no' => $request->voyag_flight_no,
                    'igm_no_and_date' => $request->igm_no_and_date,
                    'final_entry_on' => $request->final_entry_on,
                    'line_no' => $request->line_no,
                    'bl_no_and_date' => $request->bl_no_and_date,
                    'free_time_till_date' => $request->free_time_till_date,
                    'shipping_comp_bill_amt' => $request->shipping_comp_bill_amt,
                    'shipping_comp_bill_to' => $request->shipping_comp_bill_to,
                    'ship_comp_sec_deps_amt' => $request->ship_comp_sec_deps_amt,
                    'ship_co_payment_made_by' => $request->ship_co_payment_made_by,
                    'sd_amt_payer_mode' => $request->sd_amt_payer_mode,
                    'delivery_order_rcvd_on' => $request->delivery_order_rcvd_on,
                    'secur_depos_rcvd_on' => $request->secur_depos_rcvd_on,
                    'no_of_contr_w_o_s_ch_no' => $request->no_of_contr_w_o_s_ch_no,
                    'contr_no' => $request->contr_no,
                    'name_of_the_transporter' => $request->name_of_the_transporter,
                    'name_of_cfs' => $request->name_of_cfs,
                    'cfs_bill_paid_by' => $request->cfs_bill_paid_by,
                    'container_release_from_cfs_on' => $request->container_release_from_cfs_on,
                    'contr_rels_from_party_warehouse_on' => $request->contr_rels_from_party_warehouse_on,
                    'checklist_send_to_party_on' => $request->checklist_send_to_party_on,
                    'chklist_conf_by_party_on' => $request->chklist_conf_by_party_on,
                    'duty_paid_by' => $request->duty_paid_by,
                    'description_of_goods' => $request->description_of_goods,
                    'h_s_code' => $request->h_s_code,
                    'duty_structure' => $request->duty_structure,
                    'gross_weight' => $request->gross_weight,
                    'net_weight' => $request->net_weight,
                    'remarks' => $request->remarks,
                    'total_purchase' => $request->total_purchase,
                    'job_completion_date' => $request->job_completion_date,
                    'shipping_line_name' => $request->shipping_line_name,
                    'forwarding_name' => $request->forwarding_name,
                    'create_date' => $login_date
                ]);

                $notification = array(
                    'messege'=>'Data inserted successfully',
                    'alert-type'=>'success'
                );
                return back()->with($notification);

            }
            


        }
    }

    
    public function edit_inport_form($id){

        if(Auth::check()){
            $login_date = Session::get('year');
            $data['import_details'] = Import::where('id',$id)->first();
            $data['imports'] = Import::where('create_date',$login_date)->get();

            $import = Import::orderBy('id','desc')->first();

            if ($import) {

                $job_no = explode('-',$import->job_no);
                $no = isset($job_no[2])?$job_no[2]+1:001;
    
                $data['no'] = 'MIS-IMP-'.sprintf('%03d',$no);
            } else {
                $data['no'] = 'MIS-IMP-001';
            }

            return view('admin.import.import_form',$data);
        }
    }

}
