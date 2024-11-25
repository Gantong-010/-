@extends('register.layout_register')
@section('title')
@endsection
@section('content')
    <div style="display: flex; justify-content: center;">
        <h1>Registration</h1>
    </div>

    <div class="mt-5">
        @if ($errors->any())
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    {{-- ในกรณีที่มีข้อผิดพลาด, จะใช้ลูป foreach ในการแสดงข้อความแจ้งเตือนทั้งหมด. --}}
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

    <form style="width:100%;" class="ms-auto me-auto mt-auto" action="{{ route('registration.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full name</label>
            <input type="taxt" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">register</button>
    </form>
@endsection
