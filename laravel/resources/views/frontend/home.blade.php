<!doctype html>
<html lang="en">
<head>
@include('frontend.layout.header')
</head>
<body>
<header>
    @include('frontend.layout.navbar')

    <!-- Jumbotron -->
    <div class="p-5  bg-light">
        <div class="container">

            <a href="{{route('news.create')}}"><button class="btn btn-success">Tạo tin</button> </a>

            <h3 class="text-center text-primary">Tin của bạn</h3>

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
                        <th scope="col">Ngày sửa mới nhất</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"></th>
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
                            <td>{{$new->updated_at->format('H:i:s d/m/y')}}</td>
                            <td>
                                @if($new -> status ==0)
                                    <span class="text-danger">Đang chờ duyệt  </span>
                                @else
                                    <span class="text-success">Đã duyệt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('news.edit',$new->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{route('news.destroy',$new->id)}}" class="text-danger "><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            @else
                <h2 class="text-center text-danger">Hiện chưa có tin nào</h2>
            @endif
        </div>
    </div>
    <!-- Jumbotron -->
</header>
</body>
@include('frontend.layout.footer')
</html>
