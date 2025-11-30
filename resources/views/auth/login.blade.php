@extends('layouts.admin')

@section('title','تسجيل الدخول')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height:78vh">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card card-ghost p-4">
            <h4 class="mb-3 text-end">تسجيل الدخول</h4>

            {{-- validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger small">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">كلمة المرور</label>
                    <input name="password" type="password" class="form-control">
                </div>

                <button type="submit" class="btn" style="background:var(--purple-500); color:white">
                    دخول
                </button>

                <hr class="my-3">

                
            </form>
        </div>
    </div>
</div>
@endsection
