@extends('register.layout_register')
@section('title')
    Login
@endsection
@section('content')

<h1  style="text-align:center">Login</h1>

<div class="mt-5">
    @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
    @endif
        
    @if(session()->has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
</div>

<form action="{{route('login.post')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>
    <button type="submit" class="btn btn-primary">Singin</button>
  </form>
  <div class="mt-3 text-center">
    <p>ยังไม่มีบัญชี? <a href="{{ route('registration') }}">ลงทะเบียนที่นี่</a></p>
</div>
@endsection