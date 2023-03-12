@extends('admin.users.home');
@section('content')
   <div class="container">
        @include('admin.users.alert')
       <form action="{{route('admin.category.store')}}" method="post">
           @csrf

           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Tên loại tin</label>
               @error('name')
               <div class="text-danger">{{$message}}</div>
               @enderror
               <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Pháp luật , chính trị , đời sống , thể thao , ...">
           </div>

           <button class="btn btn-info" type="submit">Thêm</button>
       </form>
   </div>
@endsection
