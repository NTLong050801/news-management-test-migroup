@extends('admin.users.home');
@section('content')
    <div class="p-5  bg-light">
        <div class="container">
            <h3 class="text-center text-primary">Tất cả các tin</h3>

            @include('admin.users.alert')
            @if(!$news -> isEmpty())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Loại tin</th>
                        <th scope="col">Ngày Đăng</th>
                        <th scope="col">Người Đăng</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                        <tr>
                            <th scope="row">{{$new->id}}</th>
                            <td>{{$new->title}}</td>
                            <td>{!! $new->content !!}</td>
                            <td>{{$new->category[0]->name}}</td>
                            <td>{{$new->created_at->format('H:i:s d/m/y')}}</td>
                            <td>

                                    {{$new->users[0]->name}}

                            </td>
                            <td width="15%">

                                @if($new -> status ==0)
                                    <a href="{{route('admin.apply',$new->id)}}">
                                        <button class="btn btn-danger btn-sm" >
                                            Duyệt
                                        </button>
                                    </a>
                                @else
                                    <button class="btn btn-success btn-sm disabled">
                                       Đã Duyệt
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
                {{$news -> appends(request()->all())->links()}}
            @else
                <h2 class="text-center text-danger">Hiện chưa có tin nào</h2>
            @endif
        </div>
    </div>
@endsection
