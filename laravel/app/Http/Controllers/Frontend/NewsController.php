<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsFormRequest;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use  App\Models\Category;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $title = "Trang chủ";
        $news = News::with('category')->where('id_user',Auth::id())->orderBy('id','asc')->get();

        return view('frontend.home',compact('title','news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Tạo tin";
        $categories =Category::all();
        return view('frontend.addNews',compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsFormRequest $request)
    {
        //

        $result = News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'thumb'=> $request->input('title'),// ko co anh
            'id_category' => $request->input('id_category'),
            'id_user' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Session::flash('success', 'Đăng thành công ,Vui lòng chờ Admin duyệt bài');
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $news = News::where('id_user',Auth::id())->orderBy('id','asc')->get();
    }

    public function allnews(){
        $title = "Tất cả các tin";
        $news = News::with('users')->get();

        return view('frontend.allNews',compact('title','news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $title = "Tạo tin";
        $categories =Category::all();
        $news = News::where('id',$id)->get();
        $news = $news[0];
        return view('frontend.edit',compact('title','categories','news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsFormRequest $request, string $id)
    {
        //

        News::where('id',$id)
            ->update([
                'title'=> $request->input('title'),
                'content' => $request->input('content'),
                'id_category' => $request->input('id_category'),
                'updated_at' => now()
            ]);
        Session::flash('success',"Update thành công");
        return redirect()->route('users.home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        News::where('id',$id)->delete();
        Session::flash('success',"Xóa thành công");
        return redirect()->back();

    }
}
