<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use App\Models\Import;
use App\Models\export;

use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Str;

use Config;
use Mail;
use App\Mail\adminForgotPassMail;
use App\Mail\OtpVerifyMail;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    
    public function free_time(Request $request){

        $where = '1=1';
        $data = $request->all();
        $login_date = Session::get('year');

        $present_date = date('Y-m-d');
    
            if($request->create_date)
            {
                $where .= " and date(imports.job_created_dt) = '$request->create_date'" ;
                $data['create_date'] = $request->create_date;
            }
            
            //$where .= " and date(free_time_till_date) <= '$present_date'" ;

            $data['imports'] = Import::whereRaw($where)->where('create_date',$login_date)->get();


        return view('admin.report.free_time',$data);
    }
    public function bill_no_blank(Request $request){

        $where = '1=1';
        $data = $request->all();
        $login_date = Session::get('year');

        $present_date = date('Y-m-d');
    
            if($request->create_date)
            {
                $where .= " and date(exports.job_created_dt) = '$request->create_date'" ;
                $data['create_date'] = $request->create_date;
            }
            
            $where .= " and bill_no	is null" ;
      
            
            // $data['exports'] = export::whereRaw($where)->where('create_date',$login_date)->get();
            $data['exports'] = export::join('containers','containers.export_id','exports.id')
            ->whereRaw($where)
            ->where('create_date',$login_date)
            ->get();
            // dd($where);

        return view('admin.report.bill_no_blank',$data);
    }
    public function shipping_sec(Request $request){

        $where = '1=1';
        $data = $request->all();
        $login_date = Session::get('year');

        if(count($data) > 0 )
        {
            if($request->search_type)
            {
                $where .= " and imports.ship_co_payment_made_by ='$request->search_type'" ;
                $array['search_type'] = $request->search_type;
            }

            if($request->create_date)
            {
                $where .= " and date(imports.job_created_dt) = '$request->create_date'" ;
                $data['create_date'] = $request->create_date;
            }

            $data['imports'] = Import::whereRaw($where)->where('create_date',$login_date)->get();
        }else{
            $data['imports'] = [];
        }

        return view('admin.report.shipping_sec',$data);
    }

}
