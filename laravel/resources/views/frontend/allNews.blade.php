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
                                @if(\Illuminate\Support\Facades\Auth::id() == $new->id_user)
                                    <span class="text-danger">Tôi</span>
                                @else
                                    {{$new->users[0]->name}}
                                @endif

                            </td>
                            <td>
                                @if($new -> status ==0)
                                    <span class="text-danger">Đang chờ duyệt  </span>
                                @else
                                    <span class="text-success">Đã duyệt</span>
                                @endif
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
