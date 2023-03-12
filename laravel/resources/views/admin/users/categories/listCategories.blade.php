@extends('admin.users.home');
@section('content')
    @include('admin.users.alert');
    @if(!$categories -> isEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên loại tin</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật mới nhất</th>
                <th scope="col">Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>

                    <td>{{$category->created_at->format('H:i:s d/m/y')}}</td>
                    <td>{{$category->updated_at->format('H:i:s d/m/y')}}</td>


                    <td class="text-center">
                        <a href="{{route('admin.category.edit',$category->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{route('admin.category.destroy',$category->id)}}" class="text-danger "><i class="fa-solid fa-trash"></i></a>
                    </td>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
{{--        {{$category -> appends(request()->all())->links()}}--}}
    @else
        <h2 class="text-center text-danger">Hiện chưa có loại tin nào</h2>
    @endif

@endsection
