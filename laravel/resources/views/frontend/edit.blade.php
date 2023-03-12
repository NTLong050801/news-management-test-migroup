<!doctype html>
<html lang="en">
<head>
    @include('frontend.layout.header')
</head>
<body>
@include('frontend.layout.navbar')
<div class="container">
    @include('admin.users.alert')
    <form action="{{route('news.update',$news->id)}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
            <input value="{{$news->title}}" type="text" class="form-control" required name="title" id="exampleFormControlInput1" placeholder="Tiêu đề">
            @error('title')
            <span class="text-danger ">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Loại tin</label>
            <select class="form-select" aria-label="Default select example" name="id_category">
                @if(!empty($categories))
                    @foreach($categories as $cate)
                        <option value="{{$cate->id}}"
                        @if($news->id_category ==$cate->id )
                            selected
                        @endif
                        >{{$cate->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
            <textarea  id="editor" name="content" required>
            {!! $news->content !!}
        </textarea>
            @error('content')
            <span class="text-danger ">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Đăng tin
        </button>
    </form>
</div>

</body>
@include('frontend.layout.footer');
</html>
