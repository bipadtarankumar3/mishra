<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\mail_configure as MailConfigure;
use App\Http\Requests;
use DB;
use Validator;
use Session;
use File;
use Config;
use Mail;
use App\Mail\adminForgotPassMail;
use Illuminate\Support\Facades\Redirect;

class MailConfigureController extends Controller
{
    public function mailConfiguration(Request $request)
    {
        // //echo 'ff';die;
        //  $admin=DB::table('mail_configures')->insert([
        //      'mail_host'=>'smtp.gmail.com',
        //      'mail_port'=>'587',
        //      'mail_username'=>'bipadtarankumar1997@gmail.com',
        //      'mail_password'=>'bipu954766',
        //      'mail_encryption'=>'tls',
        //      'mail_from_address'=>'bipadtarankumar1997@gmail.com',
        //      'mail_from_name'=>'Go Kitchen',
        //  ]);die;

        //  $mail=DB::table('mail_configures')->first();
        //  $config = array(
        //               'driver' => 'smtp',
        //               'host' => $mail->mail_host,
        //               'port' => $mail->mail_post,
        //               'from' => array('address' => $mail->mail_username, 'name' => 'Go Kitchen'),
        //               'encryption' => $mail->mail_encryption,
        //               'username' => $mail->mail_username,
        //               'password' => $mail->mail_password,
        //               'sendmail' => '/usr/sbin/sendmail -bs',
        //               'pretend' => false,
        //               'stream' => [
        //                 'ssl' => [
        //                     'allow_self_signed' => true,
        //                     'verify_peer' => false,
        //                     'verify_peer_name' => false,
        //                 ],
        //             ],
        //           );
        //   Config::set('mail',$config);

        //   $adminKey ='sss';
        //   $adminMail = 'bipadtarankumar3@gmail.com';
        //   $subject='Admin Forgot Password';
        //   $user= Mail::to($adminMail)->send(new adminForgotPassMail($adminKey,$subject));

        $MailConfigure = MailConfigure::first();
        //print_r($MailConfigure);die;
        return view('admin.mailConfiguration',compact('MailConfigure'));
    }

    //Add mail configuration
    public function addMailConfiguration(Request $request){

         $this->validate($request, [
                'mailHost' => 'required',
                'mailPort' => 'required',
                'mailUserName' => 'required',
                'mailPassword' => 'required',
                'mailEncription' => 'required',
                'mailFromAddress' => 'required',
                'mailFromName' => 'required',
            ]);


        if ( $request->mailConfigureStatus == 'mailConfigureInsert') {
            $MailConfigure = new MailConfigure();
            $MailConfigure->mail_host =  $request->mailHost;
            $MailConfigure->mail_port =  $request->mailPort;
            $MailConfigure->mail_username =  $request->mailUserName;
            $MailConfigure->mail_password =  $request->mailPassword;
            $MailConfigure->mail_encryption =  $request->mailEncription;
            $MailConfigure->mail_from_address =  $request->mailFromAddress;
            $MailConfigure->mail_from_name =  $request->mailFromName;

            $success = $MailConfigure->save();
            return back();
        } else {
            $mailConfigure = array();
            $mailConfigure['mail_host']=$request->mailHost;
            $mailConfigure['mail_port']=$request->mailPort;
            $mailConfigure['mail_username']=$request->mailUserName;
            $mailConfigure['mail_password']=$request->mailPassword;
            $mailConfigure['mail_encryption']=$request->mailEncription;
            $mailConfigure['mail_from_address']=$request->mailFromAddress;
            $mailConfigure['mail_from_name']=$request->mailFromName;

            $success = MailConfigure::where('id',$request->mailConfigureKey)->update($mailConfigure);
            if ($success > 0 ) {
               return back();
            }
        }


    }
}
