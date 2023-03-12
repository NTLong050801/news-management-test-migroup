<!doctype html>
<html lang="en">
@include('admin.users.header');
<body>
<div class="container mt-5 ">
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link " id="tab-login" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-register" href="{{route('register')}}">Register</a>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form method="post" action="{{route('register')}}">
                @csrf
                <!-- Name input -->
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            {{Session::get('error')}}
                        </ul>
                    </div>
                @endif
                @error('name')
                <span class="text-danger ">{{$message}}</span>
                @enderror
                <div class="form-outline mb-4">

                    <input type="text" id="registerName" required value="{{old('name')}}" name="name" class="form-control" />
                    <label class="form-label" for="registerName">Name</label>
                </div>
                <!-- Email input -->
                @error('email')
                <span class="text-danger ">{{$message}}</span>
                @enderror
                <div class="form-outline mb-4">
                    <input type="email" name="email" required value="{{old('email')}}" id="registerEmail" class="form-control" />
                    <label class="form-label" for="registerEmail">Email</label>

                </div>

                <!-- Password input -->
                @error('password')
                <span class="text-danger ">{{$message}}</span>
                @enderror
                <div class="form-outline mb-4">
                    <input type="password" name="password" required  id="registerPassword" class="form-control" />
                    <label class="form-label" for="registerPassword">Password</label>
                </div>
                <!-- Repeat Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="password_confirmation" required id="registerRepeatPassword" class="form-control" />
                    <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                </div>


                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
            </form>
        </div>
    </div>
    <!-- Pills content -->
</div>
</body>
@include('admin.users.footer');
</html>
