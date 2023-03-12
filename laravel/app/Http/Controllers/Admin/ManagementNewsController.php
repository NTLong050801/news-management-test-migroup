<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagementNewsController extends Controller
{
    //
    public function index(){
        $title = "Quản lý tin tức";
        $news = News::with('users')->paginate('5');
        return view('admin.users.listnews',compact('title','news'));
    }
    public function applly($id){
        News::where('id',$id)->update([
            'status' => 1
        ]);
        Session::flash('success',"Duyệt thành công bài viết id:$id");
        return redirect() ->back();
    }
}
