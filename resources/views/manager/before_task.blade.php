@extends('layouts.manager')

@if (session('success'))
    <div id="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@section('title','إنشاء مهمة جديدة')

@section('content')
<div class="row py-4">
  <div class="col-12 d-flex justify-content-between align-items-center mb-3">
    <h4 class="m-0">مرحلة ماقبل التنفيذ</h4>
    <div>
      <a href="/manager/tasks" class="btn btn-sm" style="background:var(--purple-500);color:white"><i class="bi bi-arrow-left"></i> العودة</a>
    </div>
  </div>


  <h6 class="mb-3">مرحله استلام التخصيص</h6>

  <div class="col-12">
    <form id="task-form" onsubmit="return false">

    <div class="card p-3"> 
        <div class="row g-3">
          <div class="col-12 col-md-4">
            <label class="form-label">هل تم استلام تخصيص الوزارة: <span class="text-danger">*</span></label>
            <select id="field-mashaar" class="form-select required-field">
              <option value="">اختر</option>
              <option value="تم">تم</option>
              <option value="لم ينم">لم يتم</option>
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">في حال لم يتم مالسبب <span class="text-danger">*</span></label>
            <input id="field-contractor" class="form-control required-field" placeholder="السبب">
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">في حال تم ارفق الملف ( PDF)</label>
            <input id="field-map-file" type="file" accept=".pdf" class="form-control">
            <div id="map-file-name" class="small text-muted mt-1">لم يتم رفع ملف</div>
          </div>
        </div>
    </div>

 <div class="card p-3">
 <div class="row g-3">
         <div class="col-12 col-md-4">
            <label class="form-label">هل تم استلام الموقع من كدانه : <span class="text-danger">*</span></label>
            <select id="field-mashaar" class="form-select required-field">
              <option value="">اختر</option>
              <option value="تم">تم</option>
              <option value="لم ينم">لم يتم</option>
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">في حال لم يتم مالسبب <span class="text-danger">*</span></label>
            <input id="field-contractor" class="form-control required-field" placeholder="السبب">
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">في حال تم ارفق الملف ( PDF)</label>
            <input id="field-map-file" type="file" accept=".pdf" class="form-control">
            <div id="map-file-name" class="small text-muted mt-1">لم يتم رفع ملف</div>
          </div>
 </div>         
</div>

<div class="card p-3">      
 <div class="row g-3">
         <div class="col-12 col-md-4">
            <label class="form-label">هل تم استلام رخصة الاضافات : <span class="text-danger">*</span></label>
            <select id="field-mashaar" class="form-select required-field">
              <option value="">اختر</option>
              <option value="تم">تم</option>
              <option value="لم ينم">لم يتم</option>
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">في حال لم يتم مالسبب <span class="text-danger">*</span></label>
            <input id="field-contractor" class="form-control required-field" placeholder="السبب">
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">في حال تم ارفق الملف ( PDF)</label>
            <input id="field-map-file" type="file" accept=".pdf" class="form-control">
            <div id="map-file-name" class="small text-muted mt-1">لم يتم رفع ملف</div>
          </div>
    </div>
    </div>


        <div class="mt-4 d-flex gap-2">
          <button id="alert alert-success" class="btn" style="background:var(--purple-500); color:white">ارسال</button>
          <button id="btn-reset" type="button" class="btn btn-outline-secondary">إعادة تعيين</button>
        </div>

      </form>
    </div>
  </div>


<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-end">
        <h6 class="mb-3">تم إرسال المهمة </h6>
        <pre id="collected-json" style="background:#f8f9fa;padding:12px;border-radius:6px; max-height:260px; overflow:auto;"></pre>
        <div class="text-start mt-3">
          <button class="btn btn-sm btn-primary" data-bs-dismiss="modal">حسنًا</button>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
