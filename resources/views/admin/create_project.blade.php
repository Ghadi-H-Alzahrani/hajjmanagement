@extends('layouts.admin')

@section('title','إنشاء مشروع جديد')

@section('content')
<div class="row py-4">
  <div class="col-12 d-flex justify-content-between align-items-center mb-3">
    <h4 class="m-0">إنشاء مشروع</h4>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm" style="background:var(--purple-500);color:white">
      <i class="bi bi-arrow-left"></i> العودة
    </a>
  </div>

  <form action="{{ route('admin.project.store') }}" method="POST" id="project-form">
    @csrf
    <div class="card p-3 card-ghost mb-3">
      <div class="mb-3">
        <label class="form-label">اسم المشروع <span class="text-danger">*</span></label>
        <input name="name" class="form-control" required placeholder="اسم المشروع">
      </div>

      <div class="mb-3">
        <label class="form-label">المدير المقترح <span class="text-danger">*</span></label>
        <select name="assigned_manager" class="form-select" required>
          <option value="">اختر</option>
          @foreach($managers as $manager)
          <option value="{{ $manager->id }}">{{ $manager->name }}</option>
          @endforeach
        </select>

      </div>

      <!-- <div class="mb-3">
        <label class="form-label">فريق العمل</label>
        <input type="text" name="team[]" class="form-control mb-1" placeholder="أضف عضو جديد">
        <small class="text-muted">يمكن إضافة أكثر من عضو لاحقًا بعد حفظ المشروع</small>
      </div> -->

      <div class="mb-3">
        <label class="form-label">الملاحظة</label>
        <input type="text" name="note" class="form-control" placeholder="اكتب هنا">
      </div>

      <button type="submit" class="btn btn-sm" style="background:var(--purple-500);color:white">إنشاء مشروع</button>
      <button type="reset" class="btn btn-outline-secondary">إعادة تعيين</button>
    </div>
  </form>
</div>
@endsection