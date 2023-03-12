<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Trang quản trị";
        return view('admin.users.home',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Thêm loại tin";
        return view('admin.users.categories.addCategory',compact('title'));
    }
    public function listCategories(){
        $title = "Danh sách loại tin";
        $categories = Category::all();
        return view('admin.users.categories.listCategories',compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'name' => 'required|max:30|min:5|unique:categories',

        ],[
            'name.required'=> 'Vui lòng điền tên loại tin',
            'name.unique'=> 'Tên loại tin này đã tồn tại',
            'name.max' => "Tên loại tin Tối đa 30 ký tự , tối thiểu 5 ký tự",
            'name.min' => "Tên loại tin Tối đa 30 ký tự , tối thiểu 5 ký tự",

        ]);

        Category::create([
            'name' => $request->input('name')
        ]);
        Session::flash('success',"Tạo thành công");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = "Sửa loại tin";
        $category = Category::where('id',$id)->first();

        return view('admin.users.categories.editCategory',compact('title','category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:30|min:5|unique:categories',

        ],[
            'name.required'=> 'Vui lòng điền tên loại tin',
            'name.unique'=> 'Tên loại tin này đã tồn tại',
            'name.max' => "Tên loại tin Tối đa 30 ký tự , tối thiểu 5 ký tự",
            'name.min' => "Tên loại tin Tối đa 30 ký tự , tối thiểu 5 ký tự",

        ]);
        Category::where('id',$id)->update([
            'name' => $request->input('name')
        ]);
        Session::flash('success',"Update Thành công");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Category::where('id',$id)->delete();
        Session::flash('success',"Xóa thành công");
        return redirect()->back();
    }
}
