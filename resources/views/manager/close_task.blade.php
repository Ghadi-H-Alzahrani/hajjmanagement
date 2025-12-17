@extends('layouts.manager')

@if (session('success'))
    <div id="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@section('title','الإغلاق')

@section('content')
<div class="row py-4">
  <div class="col-12 d-flex justify-content-between align-items-center mb-3" >
    <h4 class="m-0" style="text-align: center">الإغلاق</h4>
    <div>
      <a href="/manager/tasks" class="btn btn-sm" style="background:var(--purple-500);color:white"><i class="bi bi-arrow-left"></i> العودة</a>
    </div>
  </div>

<div class="card" style="  width: 800px;  margin: 0 auto; padding-bottom: 20px; padding-top: 20px; align-items: center; background-color: white;"
      >
  <div class="col-12">
    <form id="task-form" onsubmit="return false">
<h5 class="mb-3"style="text-align: center" >مرحله الإغلاق</h5>
    <div class="card p-3" > 
        <div class="row g-3">
          <div class="col-12 col-md-4">
            <label class="form-label" >شهادة سلامة التمديدات الكهربائية: <span class="text-danger">*</span></label>
            <select id="field-mashaar" class="form-select required-field">
              <option value="">اختر</option>
              <option value="تم">تم</option>
              <option value="لم ينم">لم يتم</option>
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">السبب <span class="text-danger">*</span></label>
            <input id="field-contractor" class="form-control required-field" placeholder="السبب">
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">ارفق الملف ( PDF)</label>
              <input id="field-map-file" type="file"  class="form-control" accept="video/*, audio/*, .png, .pdf" multiple >
            <div id="map-file-name" class="small text-muted mt-1">لم يتم رفع ملف</div>
          </div>
        </div>
    </div>

 <div class="card p-3">
 <div class="row g-3">
         <div class="col-12 col-md-4">
            <label class="form-label">شهادة مطابقة الاعمال : <span class="text-danger">*</span></label>
            <select id="field-mashaar" class="form-select required-field">
              <option value="">اختر</option>
              <option value="تم">تم</option>
              <option value="لم ينم">لم يتم</option>
            </select>
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">السبب <span class="text-danger">*</span></label>
            <input id="field-contractor" class="form-control required-field" placeholder="السبب">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">ارفق الملف ( PDF)</label>
            <input id="field-map-file" type="file"  class="form-control" accept="video/*, audio/*, .png, .pdf" multiple >
            <div id="map-file-name" class="small text-muted mt-1">لم يتم رفع ملف</div>
          </div>

 </div>         
</div>

<div class="card p-3">      
 <div class="row g-3">
         <div class="col-12 col-md-4">
            <label class="form-label">رخصة الجاهزية : <span class="text-danger">*</span></label>
            <select id="field-mashaar" class="form-select required-field">
              <option value="">اختر</option>
              <option value="تم">تم</option>
              <option value="لم ينم">لم يتم</option>
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">السبب <span class="text-danger">*</span></label>
            <input id="field-contractor" class="form-control required-field" placeholder="السبب">
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">ارفق الملف ( PDF)</label>
           <input id="field-map-file" type="file"  class="form-control" accept="video/*, audio/*, .png, .pdf" multiple >
            <div id="map-file-name" class="small text-muted mt-1">لم يتم رفع ملف</div>
          </div>
    </div>
    </div>

    <div class="card p-3">      
 <div class="row g-3">
         <div class="col-12 col-md-4">
            <label class="form-label">المستخلصات : <span class="text-danger">*</span></label>
            <select id="field-mashaar" class="form-select required-field">
              <option value="">اختر</option>
              <option value="تم">تم</option>
              <option value="لم ينم">لم يتم</option>
            </select>
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">السبب <span class="text-danger">*</span></label>
            <input id="field-contractor" class="form-control required-field" placeholder="السبب">
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">ارفق الملف ( PDF)</label>
           <input id="field-map-file" type="file"  class="form-control" accept="video/*, audio/*, .png, .pdf" multiple >
            <div id="map-file-name" class="small text-muted mt-1">لم يتم رفع ملف</div>
          </div>
    </div>
    </div>


  </div>

<div >
<button  onclick="alert('تم الارسال')" type="button"  style="width: 6em" class="btn btn-success btn-sm" >ارسال</button>
<button id="myForm" onclick="customReset()" type="submit" style="width: 6em" class="btn btn-secondary btn-sm" >تفريغ</button>
</button>
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
