@extends('layouts.manager')

@section('title','ماقبل التنفيذ')

@section('content')
<div class="row py-4">
  <div class="col-12 d-flex justify-content-between align-items-center mb-3">
    <h4 class="m-0 text-center">مرحلة ماقبل التنفيذ</h4>
    <div>
      <a href="{{ route('manager.tasks') }}" class="btn btn-sm" style="background:var(--purple-500);color:white">
        <i class="bi bi-arrow-left"></i> العودة
      </a>
    </div>
  </div>

  <div class="col-12 mb-2">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $err)
        <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>

  <div class="col-12">
    <div class="card" style="max-width:900px;margin:0 auto;padding:20px;background:white;">
      <form id="task-form"
        action="{{ route('manager.projects.before_task.store', $project->id) }}"
        method="POST" enctype="multipart/form-data">
        @csrf

        <h5 class="mb-3 text-center">مرحلة استلام التخصيص</h5>

        <div class="card p-3 mb-3">
          <div class="row g-3">
            <div class="col-12 col-md-4">
              <label class="form-label">هل تم استلام تخصيص الوزارة: <span class="text-danger">*</span></label>
              <select name="pre_allocation_received" class="form-select">
                <option value="">اختر</option>
                <option value="تم" {{ old('pre_allocation_received', $project->pre_allocation_received ?? '') == 'تم' ? 'selected' : '' }}>تم</option>
                <option value="لم يتم" {{ old('pre_allocation_received', $project->pre_allocation_received ?? '') == 'لم يتم' ? 'selected' : '' }}>لم يتم</option>
              </select>
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">السبب <span class="text-danger">*</span></label>
              <input name="pre_allocation_reason" value="{{ old('pre_allocation_reason', $project->pre_allocation_reason ?? '') }}" class="form-control" placeholder="السبب">
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">ارفق الملف (PDF أو صور)</label>
              <input name="pre_allocation_files[]" id="pre_allocation_files" type="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png" multiple>
              <div id="map-file-name" class="small text-muted mt-1">
                @if($project->files->isNotEmpty()) مرفقات حالية: {{ $project->files->count() }} ملف @else لم يتم رفع ملف @endif
              </div>
            </div>
          </div>
        </div>

        <!-- second card -->
        <div class="card p-3 mb-3">
          <div class="row g-3">
            <div class="col-12 col-md-4">
              <label class="form-label">هل تم استلام الموقع من كدانه: <span class="text-danger">*</span></label>
              <select name="site_received_from_kdana" class="form-select">
                <option value="">اختر</option>
                <option value="تم" {{ old('site_received_from_kdana', $project->site_received_from_kdana ?? '') == 'تم' ? 'selected' : '' }}>تم</option>
                <option value="لم يتم" {{ old('site_received_from_kdana', $project->site_received_from_kdana ?? '') == 'لم يتم' ? 'selected' : '' }}>لم يتم</option>
              </select>
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">السبب <span class="text-danger">*</span></label>
              <input name="site_received_reason" value="{{ old('site_received_reason', $project->site_received_reason ?? '') }}" class="form-control" placeholder="السبب">
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">ارفق الملف ( PDF )</label>
              <input name="site_received_files[]" type="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png" multiple>
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">إعادة جدولة</label>
              <input name="reschedule_date" type="date" class="form-control" value="{{ old('reschedule_date', $project->reschedule_date ?? '') }}">
            </div>
          </div>
        </div>

        <!-- third card -->
        <div class="card p-3 mb-3">
          <div class="row g-3">
            <div class="col-12 col-md-4">
              <label class="form-label">هل تم استلام رخصة الإضافات: <span class="text-danger">*</span></label>
              <select name="license_received" class="form-select">
                <option value="">اختر</option>
                <option value="تم" {{ old('license_received', $project->license_received ?? '') == 'تم' ? 'selected' : '' }}>تم</option>
                <option value="لم يتم" {{ old('license_received', $project->license_received ?? '') == 'لم يتم' ? 'selected' : '' }}>لم يتم</option>
              </select>
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">السبب <span class="text-danger">*</span></label>
              <input name="license_reason" value="{{ old('license_reason', $project->license_reason ?? '') }}" class="form-control" placeholder="السبب">
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">ارفق الملف ( PDF )</label>
              <input name="license_files[]" type="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png" multiple>
            </div>
          </div>
        </div>

        <div class="d-flex gap-2 justify-content-end">
          <button type="submit" class="btn" style="background:var(--purple-500); color:white">ارسال</button>
          <button id="btn-reset" type="button" class="btn btn-outline-secondary">إعادة تعيين</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.getElementById('btn-reset')?.addEventListener('click', function() {
    document.getElementById('task-form').reset();
  });
</script>
@endpush
@endsection