<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

use Hash;
use Session;
use App\Models\User;
use App\Models\Wallets;
use App\Models\Camping;
use App\Models\SpinnerForm;
use App\Models\ip_skip;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\QuestionResult;
use App\Models\MyForm;
use App\Models\feedback_form_submit;
use App\Models\privateReview;
use App\Models\TemplateCategory;

use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Str;

use Config;
use Mail;
use App\Mail\adminForgotPassMail;
use App\Mail\OtpVerifyMail;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;


class UserController extends Controller
{
    public function login(){
        // return view('admin.login');
        return view('admin.login2');
    }

    public function login_post(Request $request)
    {

        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make(123456)
        // ]);return;

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if (Auth::user()->type == 'super_admin') {
                Session::put('year',$request->year);
                return redirect('admin/dashboard');
            }

            if (Auth::user()->status == 'active') {


                    $oldDate = Auth::user()->expiry_date; // Replace this with your actual old date

                    $currentDate = date("Y-m-d");

                    // Convert dates to timestamps
                    $oldTimestamp = strtotime($oldDate);
                    $currentTimestamp = strtotime($currentDate);

                    // Compare timestamps
                    if ($currentTimestamp > $oldTimestamp) {
                        $notification = array(
                            'messege'=>'Your plan has expired please contact with admin.',
                            'alert-type'=>'error'
                        );
                        return back()->with($notification);
                    }else{
                        return redirect('admin/dashboard');
                    }
                

                
            } else {
                $notification = array(
                    'messege'=>'You are inactive please contact with admin.',
                    'alert-type'=>'error'
                );
                return back()->with($notification);
            }
             
        }
  
        $notification = array(
            'messege'=>'Login details are Invalid',
            'alert-type'=>'error'
        );
        return back()->with($notification);
    }

    public function dashboard()
    {
        if(Auth::check()){

            $presend_day = date('Y-m-d');
 
            return view('admin.dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    


    public function logout(){

        Session::flush();
      // $class=DB::table('class')->get();
       return redirect('/login');
    }


    public function sub_user_list(Request $request){

        if(Auth::check() && Auth::user()->type == 'admin'){


            $where = '1=1';

            if(isset($request))
            {
                
                if($request->start_date!='')
                {
                    $where .= " and  date(users.created_at) >=  '$request->start_date'" ;
                    $array['start_date'] = $request->start_date;
                }
                if($request->end_date!='')
                {

                    $where .= " and  date(users.created_at) <=  '$request->end_date'" ;
                    $array['end_date'] = $request->end_date ;
                }

            }

            $array['user'] = User::where('type','user')->where('user_id',Auth::user()->id)->whereRaw($where)->orderBy('id','desc')->get();
            // dd($user);
            return view('admin.user.list',$array);
        }else{
            return redirect('/');
        }
    }

    public function expiry_sub_user(Request $request){

        if(Auth::check()){

            $date = date('Y-m-d');

            $array['user'] = User::where('type','user')->where('user_id',Auth::user()->id)->whereDate('expiry_date','<=',$date)->get();
            // dd($user);
            return view('admin.user.expiry_user_list',$array);
        }
    }

    public function add_sub_user_page(){

        if(Auth::check()){
            $array['TemplateCategory'] = TemplateCategory::get();
            return view('admin.user.create',$array);
        }
    }

    public function downloadUserPdf(Request $request){

        if(Auth::check()){
                //dd($request->all());
                $user_id = $request->checkbox;
            if ($user_id != null) {
                $array['user'] = User::whereIn('id',$user_id )->get();
            $pdf = PDF::loadView('admin.user.userPdf', $array);
        
            return $pdf->download('user.pdf');
            } else {
                return back();
            }
                  
        }
    }

    public function add_sub_user(Request $request){

        if(Auth::check()){

            $name_url = str_replace(' ', '_',$request->name_url);
            $nameurl = strtolower($name_url);
            
            if ($request->id !='') {
                

                $user = User::find($request->id);

                if ($request->password != '' && $request->old_password != '') {
                    if(!Hash::check($request->old_password, $user->password)){
                        $notification = array(
                            'messege'=>'Old Password is not matching',
                            'alert-type'=>'error'
                        );
                        return back()->with($notification);
                    }else{
                        $user->password = Hash::make($request->password);
                    }
                    
                }

                if ($request->customer_password == 'changed') {
                    if(!empty($user->password)){
                        $user->password = Hash::make($request->password);
                    }
                }

                $user->name = $request->name;
                $user->name_url = $request->name_url;
                $user->email = $request->email;
                $user->phone = $request->phone;

                if ($request->template_category_id != '') {
                    $user->template_category_id = $request->template_category_id;
                }
                if ($request->status != '') {
                    $user->status = $request->status;
                }
                if ($request->expiry_date != '') {
                    $user->expiry_date = $request->expiry_date;
                }

                if ($request->note != '') {
                    $user->note = $request->note;
                }
                if ($request->background_color != '') {
                    $user->background_color = $request->background_color;
                }
                if ($request->default_background != '') {
                    $user->default_background = $request->default_background;
                }
                if ($request->review_show_option != '') {
                    $user->review_show_option = $request->review_show_option;
                }
                if ($request->front_page_text != '') {
                    $user->front_page_text = $request->front_page_text;
                }
                if ($request->private_page_text != '') {
                    $user->private_page_text = $request->private_page_text;
                }
                if ($request->dynamic_page_text != '') {
                    $user->dynamic_page_text = $request->dynamic_page_text;
                }
                if ($request->google_page_text != '') {
                    $user->google_page_text = $request->google_page_text;
                }

                if ($request->facebook_share != '') {
                    $user->facebook_share = $request->facebook_share;
                }
                if ($request->wp_share != '') {
                    $user->wp_share = $request->wp_share;
                }
                if ($request->private_feedback != '') {
                    $user->private_feedback = $request->private_feedback;
                }

                if (isset($request->file) && !empty($request->file)) {
                    if ($request->hasFile('file')) {
                        $file = $request->file('file');
                        $name = time() . '.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path('upload/');
                        $file->move($destinationPath, $name);

                        $document_link =  URL('upload/'.$name);
                        $user->logo = $document_link;
                    }

                }
                if (isset($request->background_image) && !empty($request->background_image)) {
                    if ($request->hasFile('background_image')) {
                        $file = $request->file('background_image');
                        $name = time() . '.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path('upload/');
                        $file->move($destinationPath, $name);

                        $document_link =  URL('upload/'.$name);
                        $user->background_image = $document_link;
                    }

                }
                if ($request->wp_key != '') {
                    $user->wp_key = $request->wp_key;
                }
                
                $user->save();

                
                $notification = array(
                    'messege'=>'User Updated successfully',
                    'alert-type'=>'success'
                );
                return back()->with($notification);
            } else {

                $user_create_limit = Auth::user()->user_create_limit;
                if ($user_create_limit <= 0) {
                    $notification = array(
                        'messege'=>'You have no limit to create user',
                        'alert-type'=>'error'
                    );
                    return back()->with($notification);
                }

                $user = User::where('email',$request->email)->first();

                if ($user) {
                    $notification = array(
                        'messege'=>'Please enter unique email',
                        'alert-type'=>'error'
                    );
                    return back()->with($notification);
                }

                $document_link  ='';

                if (isset($request->file) && !empty($request->file)) {
                    if ($request->hasFile('file')) {
                        $file = $request->file('file');
                        $name = time() . '.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path('upload/');
                        $file->move($destinationPath, $name);

                        $document_link =  URL('upload/'.$name);
                        
                    }
                }

                $present_date = date('Y-m-d');

                $user_id_desc = User::orderBy('id','desc')->first();
                if ($user_id_desc) {
                    $uniq_id = $user_id_desc->user_unique_id;
                } else {
                    $uniq_id = 1;
                }
                

                $formattedUserID = sprintf("%04d",  $uniq_id );

                $user = User::create([
                    'user_unique_id' => $formattedUserID,
                    'name' => $request->name,
                    'name_url' => $nameurl,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'type' => 'user',
                    'status' => $request->status,
                    'expiry_date' =>date('Y-m-d', strtotime($present_date.' +1 year')) ,
                    'note' => $request->note,
                    'wp_key' => $request->wp_key,
                    'template_category_id' => $request->template_category_id,
                    'front_page_text' => '',
                    'default_background' => 'Yes',
                    'facebook_share' => 'Yes',
                    'wp_share' => 'Yes',
                    'user_id' => Auth::user()->id,
                    'private_page_text' => 'Leave us a review, it will help us grow and better serve our customers like you.',
                    'dynamic_page_text' => 'Leave us a review, it will help us grow and better serve our customers like you.',
                    'google_page_text' => 'We want our customers to be 100% satisfied. Please let us know why you had a bad experience, so we can improve our service. Leave your email to be contacted.',
                    'logo' => $document_link
                ]);

                $MyForm = MyForm::create([
                    'form_name'=>'Give Us Your Feedback',
                    'desc'=>'Your opinion is very important to us. We appreciate your feedback and will use it to serve  you better and make improvements in our management.',
                    'customer_support'=>'How Was Your Experience?',
                    'rate_text'=>'Rate Our Staff Behaviour:',
                    'comments'=>'Additional Comment/Suggestion (Optional):',
                    'user_id'=>$user->id,
                ]);

                if ($MyForm) {
                    $Question = Question::create([
                        'question' => 'Where did you first hear about our Business?',
                        'user_id' => $user->id,
                        'status' => 'active'
                    ]);

                    if ($Question) {
                        $answers = ['Advertising','Recommendation'];
                        foreach ($answers as $key => $value) {
                            QuestionAnswer::create([
                                'question_id' => $Question->id,
                                'answers' => $value,
                                'user_id' => $user->id
                            ]);
                        }
                    }
    
                    
                }

                $my_form = User::find(Auth::user()->id);
                $my_form->user_create_limit = $my_form->user_create_limit-1;
                $my_form->save();

                $Wallets = new Wallets();
                $Wallets->user_id = Auth::user()->id;
                $Wallets->amount = 1;
                $Wallets->note = 'You have user 1 blanced.';
                $Wallets->credit_debit = 'debit';
                $Wallets->amount_credit_debit = 'user';
                $Wallets->save();


                $notification = array(
                    'messege'=>'User inserted successfully',
                    'alert-type'=>'success'
                );
                return back()->with($notification);

            }
            


        }
    }

    
    public function edit_sub_user($id){

        if(Auth::check()){
            $user = User::where('id',$id)->first();
            $TemplateCategory = TemplateCategory::get();
            return view('admin.user.create',compact('user','id','TemplateCategory'));
        }
    }
    
    public function profile(){

        if(Auth::check()){

            $id = Auth::user()->id;

            $user = User::where('id',$id)->first();
            
            if ($user->type == 'super_admin') {
                return view('admin.user.admin_profile',compact('user','id'));
            }
            else if ($user->type == 'admin') {
                return view('admin.user.admin_profile',compact('user','id'));
            } else {
                return view('admin.user.profile',compact('user','id'));
            }
              
        }
    }
    
    public function profile_update(Request $request){

        if(Auth::check()){
            
            $id = Auth::user()->id;
 
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password != '') {
                $user->password = $request->password;
            }
            $user->phone = $request->phone;
            $user->note = $request->note;
            if (isset($request->file) && !empty($request->file)) {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('upload/');
                    $file->move($destinationPath, $name);

                    $document_link =  URL('upload/'.$name);
                    $user->logo = $document_link;
                }

            }
            
            $user->save();

            
            $notification = array(
                'messege'=>'User Updated successfully',
                'alert-type'=>'success'
            );
            return back()->with($notification);

        }
    }

    public function delete_sub_user($id){

        if(Auth::check()){
            
            $user = User::where('id',$id)->first();

            // if ($user->type == 'user') {
            //     $user_owner =  User::where('id',$user->user_id)->first();
            //     $user_owner_up =  User::where('id',$user->user_id)->update([
            //         'user_create_limit'=>$user_owner->user_create_limit + 1
            //     ]);
            // }

            $user = User::where('id',$id)->delete();

            $notification = array(
                'messege'=>'User Deleted Successfully',
                'alert-type'=>'error'
            );
            return back()->with($notification);
            
        }
    }


        //Admin Forgot Password
        public function forgotPassword(){

            //echo "di";die;
    
            return view('admin.forgotPassword.forgotPassword');
         }
    
         //admin UserId Check
         public function adminUserIdCheck(Request $request){
             $userName = $request->email;
             $admin=DB::table('users')->where('email',$request->email)->first();
             if ($admin) {
                 //echo "dd";
                 //print_r($admin);
                 $adminKey = $admin->user_unique_id;
                 $adminMail = $admin->email;
                 $subject='Admin Forgot Password';
                 //$message='Thank You For Contact Us';
                 $admin=DB::table('users')->where('email',$request->email)->update(['user_email_status'=>'urlAvailable']);
    
                 $mail=DB::table('mail_configures')->first();
                 $config = array(
                    'driver' => 'smtp',
                    'host' => $mail->mail_host,
                    'port' => $mail->mail_port,
                    'from' => array('address' => $mail->mail_from_address, 'name' => $mail->mail_from_name),
                    'encryption' => $mail->mail_encryption,
                    'username' => $mail->mail_username,
                    'password' => $mail->mail_password,
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false,
                    'stream' => [
                        'ssl' => [
                            'allow_self_signed' => true,
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        ],
                    ],
                );
                Config::set('mail',$config);
                $type="ADMIN";
                 $user= Mail::to($adminMail)->send(new adminForgotPassMail($type,$adminKey,$subject));
                 $request->session()->flash('checkYourMail', 'checkYourMail');
                 $notification = array(
                            'messege'=>'Check Your Email',
                            'alert-type'=>'success'
                        );
                        return back()->with($notification);
                 //return view('admin.forgotPassword.forgotConfirmPassword',compact('userName'));
    
             } else {
                $notification = array(
                    'messege'=>'User Id Not Maching',
                    'alert-type'=>'error'
                );
                return back()->with($notification);
             }
         }
    
         //admin Password Check
         public function confirmPasswordPage($adminKey){
             $admin=DB::table('users')
             ->where('user_unique_id',$adminKey)
             ->first();
             $adminStatus='';
             if ( $admin) {
                 if ($admin->user_email_status == 'urlAvailable') {
                     $adminStatus= "urlAvailable";
                 } else {
                     $adminStatus= "urlNotAvailable";
                 }
             }else{
                 $adminStatus= "adminNotAvailable";
             }
             //echo $adminStatus;
             $adminKey = $adminKey;
             return view('admin.forgotPassword.forgotConfirmPassword',compact('adminKey','adminStatus'));
         }
    
         //admin Password Check
         public function confirmPassword(Request $request){
             $password = $request->password;
             $confirmPassword = $request->confirmPassword;
    
             if ( $password  == $confirmPassword) {
                 $adminUp=DB::table('users')->where('user_unique_id',$request->adminKey)->update(['password'=>Hash::make($password),'user_email_status'=>'urlNotAvailable']);
                 $admin=User::where('user_unique_id',$request->adminKey)->first();
                    $credentials = [
                        'email' => $admin->email,
                        'password' =>$password,
                    ];

                        if (Auth::attempt($credentials)) {
                            return redirect('admin/dashboard');
                        }
             } else {
                
                 $notification = array(
                    'messege'=>'Password Not Match',
                    'alert-type'=>'error'
                );
                return back()->with($notification);
             }
         }



    //---------------------------------- Skip Ip ------------------------------------

    public function dashboard_visit($id){

        if(Auth::check()){
            
            $user = User::where('id',$id)->first();
            Auth::login($user);

            return redirect('admin/dashboard');
            
        }
    }

    public function generatePDF()
    {
            
        $pdf = PDF::loadView('admin.my_qr_code');
        
        return $pdf->download('MyQRCode.pdf');
    }

}
