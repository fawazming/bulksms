<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerContact;
use App\Models\Settings;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(){
        return  view('admin.template.index');
    }
    public function store(Request $request){
        if(env('APP_DEMO')){
            return redirect()->back()->with('fail','This feature is not available on demo mode');
        }
        $data_template = auth()->user()->settings()->where('name','template')->first();
        if ($data_template){
            $template = json_decode($data_template->value);
        }

        if(isset($template) && isset($template->bg_image_file_name)){
            $request['bg_image_file_name'] = $template->bg_image_file_name;
        }
        if ($request->hasFile('bg_image')) {
            $file = $request->file('bg_image');
            $imageName = time() . '_1' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageName);
            $request['bg_image_file_name'] = $imageName;
        }

        if(isset($template) && isset($template->first_img_file_name)){
            $request['first_img_file_name'] = $template->first_img_file_name;
        }

        if ($request->hasFile('first_img')) {
            $file = $request->file('first_img');
            $imageOneName = time(). '_2'. '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageOneName);
            $request['first_img_file_name'] = $imageOneName;
        }

        if(isset($template) && isset($template->sec_img_file_name)){
            $request['sec_img_file_name'] = $template->sec_img_file_name;
        }
        if ($request->hasFile('sec_img')) {
            $file = $request->file('sec_img');
            $imageTwoName = time(). '_3' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageTwoName);
            $request['sec_img_file_name'] = $imageTwoName;
        }

        if(isset($template) && Isset($template->thr_img_file_name)){
            $request['thr_img_file_name'] = $template->thr_img_file_name;
        }


        if ($request->hasFile('thr_img')) {
            $file = $request->file('thr_img');
            $imageThreeName = time(). '_4' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageThreeName);
            $request['thr_img_file_name'] = $imageThreeName;
        }

        if(isset($template) && isset($template->sec_thr_bg_image_file)){
            $request['sec_thr_bg_image_file'] = $template->sec_thr_bg_image_file;
        }

        if ($request->hasFile('sec_thr_bg_image')) {
            $file = $request->file('sec_thr_bg_image');
            $imagefourName = time(). '_5' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imagefourName);
            $request['sec_thr_bg_image_file'] = $imagefourName;
        }

        if(isset($template) && isset($template->sec_seven_bg_image_file)){
            $request['sec_seven_bg_image_file'] = $template->sec_seven_bg_image_file;
        }

        if ($request->hasFile('sec_seven_bg_image')) {
            $file = $request->file('sec_seven_bg_image');
            $imageFiveName = time(). '_6' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageFiveName);
            $request['sec_seven_bg_image_file'] = $imageFiveName;
        }

        if(isset($template) && isset($template->first_commenter_img)){
            $request['first_commenter_img'] = $template->first_commenter_img;
        }

        if ($request->hasFile('first_commenter_image')) {
            $file = $request->file('first_commenter_image');
            $imageSixName = time(). '_7' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageSixName);
            $request['first_commenter_img'] = $imageSixName;
        }


        if(isset($template) && isset($template->sec_commenter_img)){
            $request['sec_commenter_img'] = $template->sec_commenter_img;
        }

        if ($request->hasFile('sec_commenter_image')) {
            $file = $request->file('sec_commenter_image');
            $imageSevenName = time(). '_8' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageSevenName);
            $request['sec_commenter_img'] = $imageSevenName;
        }



        if(isset($template->first_brand_img) && isset($template->first_brand_img)){
            $request['first_brand_img'] = $template->first_brand_img;
        }

        if ($request->hasFile('first_brand_image')) {
            $file = $request->file('first_brand_image');
            $imageEightName = time(). '_9' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageEightName);
            $request['first_brand_img'] = $imageEightName;
        }

        if(isset($template->sec_brand_img) && isset($template->sec_brand_img)){
            $request['sec_brand_img'] = $template->sec_brand_img;
        }

        if ($request->hasFile('sec_brand_image')) {
            $file = $request->file('sec_brand_image');
            $imageNineName = time(). '_10' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageNineName);
            $request['sec_brand_img'] = $imageNineName;
        }

        if(isset($template->thr_brand_img) && isset($template->thr_brand_img)){
            $request['thr_brand_img'] = $template->thr_brand_img;
        }

        if ($request->hasFile('thr_brand_image')) {
            $file = $request->file('thr_brand_image');
            $imageTenName = time(). '_11' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageTenName);
            $request['thr_brand_img'] = $imageTenName;
        }

        if (isset($data_template) && $data_template->name == 'template'){
            $template = Settings::where('name', '=', 'template')->first();
            $template->value = json_encode($request->only('email','phone_number','address','title','description','first_title','first_description','sec_title',
                'sec_description','thr_title','thr_description','sec_thr_title','sec_thr_description','main_title','sec_four_title','sec_four_description','sec_six_title',
                'sec_seven_title','sec_seven_description','bg_image_file_name','first_img_file_name','sec_img_file_name','thr_img_file_name','sec_thr_bg_image_file',
                'sec_seven_bg_image_file','section_marketing_tool_sub_title','section_marketing_tool_main_title','first_commenter_img','sec_commenter_img',
                'first_commenter_name','first_commenter_comment','sec_commenter_name','sec_commenter_comment','first_brand_title','first_brand_description','sec_brand_title',
                'sec_brand_description','thr_brand_title','thr_brand_description','first_brand_img','sec_brand_img','thr_brand_img'));
            $template->save();
        }else{
            $template = new Settings();
            $template->name = 'template';
            $template->value = json_encode($request->only('email','phone_number','address','title','description','first_title','first_description','sec_title',
                'sec_description','thr_title','thr_description','sec_thr_title','sec_thr_description','main_title','sec_four_title','sec_four_description','sec_six_title',
                'sec_seven_title','sec_seven_description','bg_image_file_name','first_img_file_name','sec_img_file_name','thr_img_file_name','sec_thr_bg_image_file',
                'sec_seven_bg_image_file','section_marketing_tool_sub_title','section_marketing_tool_main_title','first_commenter_img','sec_commenter_img',
                'first_commenter_name','first_commenter_comment','sec_commenter_name','sec_commenter_comment','first_brand_title','first_brand_description',
                'sec_brand_title','sec_brand_description','thr_brand_title','thr_brand_description','first_brand_img','sec_brand_img','thr_brand_img'));
            $template->admin_id = auth()->user()->id;
            $template->save();
        }
        cache()->flush();
        return redirect()->back()->with('success','Template successfully update');
    }
    public function guest_user_massage(){
        return  view('admin.template.customer_contact');
    }
    public function guest_user_massage_get_all(){
        $messages = CustomerContact::orderBy('created_at', 'desc')->where('subscribe','no')->select(['id', 'name', 'email','message', 'created_at']);
        return datatables()->of($messages)
            ->addColumn('created_at', function ($q) {
                return $q->created_at->format('d-m-Y');
            })
            ->addColumn('message', function($q){
                return "<div class='show-more' style='max-width: 500px;white-space: pre-wrap'> $q->message </div>";
            })
            ->addColumn('action', function (CustomerContact $q) {
                return '<button class="btn btn-sm btn-danger" data-message="Are you sure you want to delete this message?"
                                        data-action='.route('admin.guest.user.massage.delete',['id'=>$q]).'
                                        data-input={"_method":"delete"}
                                        data-toggle="modal" data-target="#modal-confirm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>' ;
            })
            ->rawColumns(['created_at','action','message'])
            ->toJson();
    }
    public function guest_user_massage_delete(Request $request){
        if(!$request->id) abort(404);
        CustomerContact::where('id',$request->id)->delete();
        return redirect()->back()->with('success','message successfully deleted');
    }
    public function subscribe(){
        return  view('admin.template.subscribe');
    }

    public function subscribe_get_all(){
        $messages = CustomerContact::orderBy('created_at', 'desc')->where('subscribe','yes')->select(['id','email', 'created_at']);
        return datatables()->of($messages)
            ->addColumn('created_at', function ($q) {
                return $q->created_at->format('d-m-Y');
            })
            ->addColumn('action', function (CustomerContact $q) {
                return '<button class="btn btn-sm btn-danger" data-message="Are you sure you want to delete this subscriber?"
                                        data-action='.route('admin.subscribe.delete',['id'=>$q]).'
                                        data-input={"_method":"delete"}
                                        data-toggle="modal" data-target="#modal-confirm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>' ;
            })
            ->rawColumns(['created_at','action'])
            ->toJson();
    }
    public function subscribe_delete(Request $request){
        if(!$request->id) abort(404);
        CustomerContact::where('id',$request->id)->delete();
        return redirect()->back()->with('success','Subscriber successfully deleted');
    }



}
