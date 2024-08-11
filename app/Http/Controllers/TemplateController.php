<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\FormFields;
use App\Models\ReviewForm;
use App\Models\ReviewFormField;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\QuestionResult;
use App\Models\MyForm;

use App\Models\feedback_form_submit;
use Illuminate\Support\Facades\Auth;
use Response;
use PDF;

class TemplateController extends Controller
{
    public function template(Request $request){

        if(Auth::check()){

            $where = '1=1';
            
            $array['Template'] = MyForm::select('my_forms.*','template_categories.category_name')->join('template_categories','template_categories.id','my_forms.category_id')
            ->where('my_forms.user_id',Auth::user()->id)
            ->whereRaw($where)
            ->orderBy('id','asc')
            ->get();
            //dd($Spinner);
            return view('admin.template.list',$array);
        }
    }

    public function template_add(Request $request){

        if(Auth::check()){

            $Template = MyForm::create([
                'template_name'=>'Template Name',
                'form_name'=>'Form Name',
                'desc'=>'Add Description',
                'customer_support'=>'How was your experience',
                'rate_text'=>'Rate our services',
                'comments'=>'Additional Comment',
                'type'=>'template',
                'user_id'=>Auth::user()->id,
            ]);
            
            return redirect('admin/template_edit/'.$Template->id);

        }
    }

    public function template_status($id,$status)

    {
        // dd($status);
       if($status=="active"){
        $data['customer'] = MyForm::where('id', $id)->update(['active_status'=>'active']);
       }else{
       
        $data['customer'] = MyForm::where('id', $id)->update(['active_status'=>'inactive']);

       }
       $notification = array(
            'messege'=>'Status Updated successfully',
            'alert-type'=>'success',
            'success'=>true
        );
        return Response::json($notification);
    }

    public function template_edit($id){

        if(Auth::check()){

            $where = '1=1';

            $array['TemplateCategory'] = TemplateCategory::get();

            $array['form_data'] = MyForm::where('id',$id)->first();
            // dd($array['form_data']);
    
            $array['Question'] = Question::where('questions.user_id', $array['form_data']->id)
            ->whereRaw($where)
            ->orderBy('id','asc')
            ->get();
            //dd($Spinner);
            return view('admin.template.template_add',$array);
        }
    }

    public function delete_template($id){

        if(Auth::check()){

            $array['form_data'] = MyForm::where('id',$id)->delete();
            // dd($array['form_data']);
    
            $array['Question'] = Question::where('questions.user_id', $id)
            ->delete();
            //dd($Spinner);
            $notification = array(
                'messege'=>'Question Updated successfully',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        }
    }


    
    
    public function downloadSpinnerPdf(Request $request){

        if(Auth::check()){
                //dd($request->all());
                $id = $request->checkbox;
            if ($id != null) {

                $array['Spinner'] = Spinner::select('spinners.*','campings.campaign_name as c_name','campings.title as c_title')
                    ->leftJoin('campings','campings.id','spinners.camping_id')
                    ->whereIn('spinners.id',$id )
                    ->where('spinners.created_by',Auth::user()->id)
                    ->get();
                $pdf = PDF::loadView('admin.spinner.spinnerPdf', $array);
        
            return $pdf->download('spinner.pdf');
            } else {
                return back();
            }
                  
        }
    }

    public function question_field_form(){

        if(Auth::check()){
            //$camping = Camping::where('created_by',Auth::user()->id)->where('status','active')->get();
            return view('admin.template.form');
        }
    }

    

    public function my_form_update(Request $request){

        ///dd($request->all());

        if(Auth::check()){
            
            if ($request->form_id !='') {

                if ($request->type == 'category_id') {
                    if ($request->category_id !='') {
                        $update = ['category_id'=>$request->category_id];
                    }else{
                        $update = ['category_id'=>''];
                    }
                }
                if ($request->type == 'template_name') {
                    if ($request->template_name !='') {
                        $update = ['template_name'=>$request->template_name];
                    }else{
                        $update = ['template_name'=>''];
                    }
                }
                if ($request->type == 'form_name') {
                    if ($request->form_name !='') {
                        $update = ['form_name'=>$request->form_name];
                    }else{
                        $update = ['form_name'=>''];
                    }
                }
                if ($request->type == 'desc') {
                    if ($request->desc !='') {
                        $update = ['desc'=>$request->desc];
                    }else{
                        $update = ['desc'=>''];
                    }
                }
                if ($request->type == 'customer_support') {
                    if ($request->customer_support !='') {
                        $update = ['customer_support'=>$request->customer_support];
                    }else{
                        $update = ['customer_support'=>''];
                    }
                }
                if ($request->type == 'rate_text') {
                    if ($request->rate_text !='') {
                        $update = ['rate_text'=>$request->rate_text];
                    }else{
                        $update = ['rate_text'=>''];
                    }
                }
                if ($request->type == 'comments') {
                    if ($request->comments !='') {
                        $update = ['comments'=>$request->comments];
                    }else{
                        $update = ['comments'=>''];
                    }
                }

                $Template = MyForm::where('id',$request->form_id)->update($update);

                $notification = array(
                    'messege'=>'Question Updated successfully',
                    'alert-type'=>'success'
                );
                // return back()->with($notification);
                return Response::json($notification);

            }
            
        }
    }

    public function questions_form(Request $request){

        ///dd($request->all());

        if(Auth::check()){
            
            if ($request->id !='') {

                $Question = Question::where('id',$request->id)->update([
                    'question' => $request->question,
                    'status' => $request->status
                ]);

                $answers = $request->answers;
                $right_answer = $request->right_answer;
                $QuestionAnswer = QuestionAnswer::where('question_id',$request->id)->delete();
                //dd( $answers );
                foreach ($answers as $key => $value) {
                    // dd($value);
                    // if ($key == 0) {
                        QuestionAnswer::create([
                            'question_id' => $request->id,
                            'answers' => $value,
                            'user_id' => Auth::user()->id
                        ]);
                    // }
                    
                }

                $notification = array(
                    'messege'=>'Question Updated successfully',
                    'alert-type'=>'success'
                );
                // return back()->with($notification);
                return Response::json($notification);

            } else {


                $Question = Question::create([
                    'question' => $request->question,
                    'user_id' => Auth::user()->id,
                    'status' => $request->status
                ]);

                $answers = $request->answers;
                $right_answer = $request->right_answer;

                // dd( $right_answer );
                foreach ($answers as $key => $value) {
                    QuestionAnswer::create([
                        'question_id' => $Question->id,
                        'answers' => $value,
                        'user_id' => Auth::user()->id
                    ]);
                }

                $notification = array(
                    'messege'=>'Data inserted successfully',
                    'alert-type'=>'success'
                );
                return Response::json($notification);

            }
            
        }
    }

    public function edit_question($id){

        if(Auth::check()){
            $Question = Question::where('id',$id)->first();
            $QuestionAnswer = QuestionAnswer::where('question_id',$id)->get();
            return view('admin.template.form',compact('Question','QuestionAnswer','id'));
        }
    }

    public function view_question($id){

        if(Auth::check()){
            $Question = Question::where('id',$id)->first();
            $QuestionAnswer = QuestionAnswer::where('question_id',$id)->get();
            return view('admin.template.view_question',compact('Question','QuestionAnswer','id'));
        }
    }

    public function delete_question($id){

        if(Auth::check()){
            
            $Question = Question::where('id',$id)->delete();
            $QuestionAnswer = QuestionAnswer::where('question_id',$id)->delete();

            $notification = array(
                'messege'=>'Feedback Deleted Successfully',
                'alert-type'=>'error'
            );
            return back()->with($notification);
            
        }
    }

    public function list_question_answers(Request $request){

        if(Auth::check()){

            $where = '1=1';

            if(isset($request))
            {
                
                if($request->start_date!='')
                {
                    $where .= " and  date(feedback_form_submits.created_at) >=  '$request->start_date'" ;
                    $array['start_date'] = $request->start_date;
                }
                if($request->end_date!='')
                {

                    $where .= " and  date(feedback_form_submits.created_at) <=  '$request->end_date'" ;
                    $array['end_date'] = $request->end_date ;
                }

            }
            
            $feedback_form_submit = feedback_form_submit::where('user_id',Auth::user()->id)
            ->whereRaw($where)
            ->orderBy('id','desc')
            ->get();

            $QuestionResult = QuestionResult::join('questions','questions.id','question_results.r_question_id')
            ->join('question_answers','question_answers.id','question_results.result_id')
            ->where('question_results.user_id',Auth::user()->id)
            ->get();

            // dd( $QuestionResult );

            return view('admin.template.list_question_answers',compact('QuestionResult','feedback_form_submit'));
            
        }
    }

    public function view_question_answers($id){

        if(Auth::check()){

            
            $feedback_form_submit = feedback_form_submit::
                select(
                    'feedback_form_submits.*',
                    'my_forms.form_name',
                    'my_forms.desc',
                    'my_forms.customer_support',
                    'my_forms.rate_text',
                    'my_forms.comments'
                    )
            ->leftJoin('my_forms','my_forms.id','feedback_form_submits.form_id')
            ->where('feedback_form_submits.user_id',Auth::user()->id)
            ->where('feedback_form_submits.id',$id)
            ->first();

            //dd($feedback_form_submit );

            $QuestionResult = QuestionResult::join('questions','questions.id','question_results.r_question_id')
            ->join('question_answers','question_answers.id','question_results.result_id')
            ->where('question_results.feedback_id',$id)
            ->get();

            //dd( $QuestionResult );

            return view('admin.template.view_question_answers',compact('QuestionResult','feedback_form_submit'));
            
        }
    }

    public function delete_question_answers($id){

        if(Auth::check()){
            
            $feedback_form_submit = feedback_form_submit::where('id',$id)->delete();
            $QuestionResult = QuestionResult::where('feedback_id',$id)->delete();

            $notification = array(
                'messege'=>'Feedback Deleted Successfully',
                'alert-type'=>'error'
            );
            return back()->with($notification);
            
        }
    }
}
