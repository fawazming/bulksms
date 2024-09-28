<?php

namespace App\Http\Controllers;

use App\Models\CustomerContact;
use App\Models\FAQ;
use App\Models\Page;
use App\Models\Plan;
use App\Models\Subscribe;
use App\Models\Template;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrontController extends Controller
{
    public function verifyCode(Request $request){
       $code=$request->purchase_code;
       if(!$code){
           abort(404);
       }
        $client = new Client();
        $res = $client->request('GET', 'http://verify.picotech.app/verify.php?purchase_code='.$code);
        $response= json_decode($res->getBody());

        if(isset($response->id) && $response->id){
            $data=[
                'code'=>$code,
                'id'=>$response->id,
                'checked_at'=>now()
            ];
            File::put(storage_path().'/framework/build',base64_encode(json_encode($data)));
            if($request->verify){
                return back();
            }
            return back()->with('success','Purchase code verified successfully');

        }else{
            File::delete(storage_path().'/framework/build');
            return back()->withErrors(['msg'=>'Invalid purchase code']);
        }

    }

    public function demoLogin(){
        return view('front.login_demo');
    }

    public function index(){
        $data['plans'] = Plan::where('id', '!=', 1)->where('status', 'active')->get();
        if (get_settings('template')){
            $data['template'] = json_decode(get_settings('template'));
        }else{
            $data['template'] = '';
        }
        return view('front.index',$data);
    }
    public function about(){
        if (get_settings('template')){
            $data['template'] = json_decode(get_settings('template'));
        }else{
            $data['template'] = '';
        }
        return view('front.about',$data);
    }
    public function contact(){
        $data['template'] = json_decode(get_settings('template'));
        return view('front.contact',$data);
    }
    public function features(){
        if (get_settings('template')){
            $data['template'] = json_decode(get_settings('template'));
        }else{
            $data['template'] = '';
        }
        return view('front.features',$data);
    }
    public function page($page){
        $data['page'] = Page::where('url',$page)->where('status','published')->firstOrFail();
        return  view('front.page',$data);
    }
    public function customer_contact_store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        CustomerContact::create($request->all());
        return back()->with('success', 'Your message has successfully send to us');
    }
    public function subscribe(Request $request){
        $request->validate([
            'email' => 'required',
            'subscribe'=>'required'
        ]);
        $subscriber = CustomerContact::where('email',$request->email)->first();
        if ($subscriber){
            return back()->withErrors(['msg'=>'You have already subscribe']);
        }
        CustomerContact::create($request->all());
        return back()->with('success', 'successfully subscribed');
    }


}
