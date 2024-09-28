<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.createPage.index');
    }
    public function create()
    {
        return view('admin.createPage.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:pages,name',
            'title' => 'required|unique:pages,title',
            'description' => 'required',
            'status'=>'required|in:published,unpublished',
            'position'=>'required|in:header,footer',
        ]);
        if(env('APP_DEMO')){
            return redirect()->back()->with('fail','This feature is not available on demo mode');
        }
        $request['url']=Str::slug($request->title , '-');

        auth()->user()->pages()->create($request->all());

        cache()->forget('pages');

        return back()->with('success', 'Page successfully created');
    }
    public function show(){
        $pages = auth()->user()->pages()->select(['id','name','title','description','status','position']);
        return datatables()->of($pages)
            ->addColumn('description', function($q){
                return "<div class='show-more' style='max-width: 500px;white-space: pre-wrap'> $q->description </div>";
            })
            ->addColumn('action',function($q){
                return "<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='top' title='Edit' href='".route('admin.page.edit',[$q->id])."'>"."<i class='fas fa-edit'></i>"."</a> &nbsp; &nbsp;".
                    '<button class="btn btn-sm btn-danger" data-message="Are you sure you want to delete this number?"
                                        data-action='.route('admin.page.destroy',[$q]).'
                                        data-input={"_method":"delete"}
                                        data-toggle="modal" data-target="#modal-confirm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>' ;
            })
            ->rawColumns(['action','description'])
            ->toJson();
    }
    public function edit(Page $page){
        $data['page']=$page;
        return view('admin.createPage.edit',$data);
    }

    public function update(Page $page,Request $request){

        $request->validate([
            'name' => 'required|unique:pages,name,'. $page->id,
            'title' => 'required|unique:pages,title,'. $page->id,
            'description' => 'required',
            'status'=>'required|in:published,unpublished',
            'position'=>'required|in:header,footer',
        ]);
        $request['url']=Str::slug($request->title , '-');

        $page->update($request->all());
        cache()->forget('pages');
        return back()->with('success','Page successfully updated');
    }
    public function destroy(Page $page){
        $page->delete();
        cache()->forget('pages');
        return back()->with('success','Page successfully deleted');
    }

}
