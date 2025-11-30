@extends('layouts.manager')

@section('title', 'تفاصيل المشروع - تعبئة المدير')

@section('content')
<div class="row py-4">
  <div class="col-12 d-flex justify-content-between align-items-center mb-3">
    <h4 class="m-0">تفاصيل المشروع — {{ $project->name }}</h4>
    <div>
      <a href="{{ route('manager.projects.index') }}" class="btn btn-sm" style="background:var(--purple-500);color:white">
        <i class="bi bi-arrow-left"></i> العودة
      </a>
    </div>
  </div>

  <div class="col-12 mb-3">
    <div class="card p-3">
      <div class="row g-3 align-items-start">
        <div class="col-md-8">
          <div class="small text-muted">اسم المشروع</div>
          <h5 class="mb-1">{{ $project->name }}</h5>

          <div class="small text-muted mt-2">المدير المسند:
            <strong>{{ $project->manager?->name ?? 'غير معروف' }}</strong>
          </div>

          <div class="small text-muted mt-3">معلومات الشركة:</div>
          <div>{{ $project->company ?? '-' }}</div>

          <div class="small text-muted mt-2">ملاحظة المشرف:</div>
          <div>{{ $project->note ?? '-' }}</div>
        </div>

        <div class="col-md-4 text-start">
          @if($project->map_file_name)
            <a href="{{ asset('storage/project_maps/' . $project->map_file_name) }}" target="_blank" class="btn btn-sm btn-outline-secondary mb-2">تحميل خريطة المشروع</a>
          @else
            <div class="small text-muted">لا توجد خريطة مرفوعة</div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="col-12">
    <form action="{{ route('manager.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="card p-3 mb-3">
        <h6 class="mb-3">البيانات التنفيذية (املأ الحقول المطلوبة)</h6>

        <div class="row g-3">
          <div class="col-12 col-md-4">
            <label class="form-label">المشعر</label>
            <input name="mashaar" value="{{ old('mashaar', $project->mashaar) }}" class="form-control" placeholder="مثل: عرفه">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">الجنسية</label>
            <input name="nationality" value="{{ old('nationality', $project->nationality) }}" class="form-control" placeholder="مثال: سعودي">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">رقم الشاخص</label>
            <input name="center_number" value="{{ old('center_number', $project->center_number) }}" class="form-control" placeholder="مثال: 123">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">الفئة</label>
            <input name="category" value="{{ old('category', $project->category) }}" class="form-control" placeholder="مثال: أ\ب">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">المساحة الكلية (م²)</label>
            <input name="total_area" type="number" step="0.01" value="{{ old('total_area', $project->total_area) }}" class="form-control" placeholder="مثال: 1000">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">مساحة الخيام (م²)</label>
            <input name="tent_area" type="number" step="0.01" value="{{ old('tent_area', $project->tent_area) }}" class="form-control" placeholder="مثال: 600">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">عدد الحجاج</label>
            <input name="pilgrims_count" type="number" value="{{ old('pilgrims_count', $project->pilgrims_count) }}" class="form-control" placeholder="مثال: 5000">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">اسم المقاول</label>
            <input name="contractor" value="{{ old('contractor', $project->contractor) }}" class="form-control" placeholder="اسم المقاول">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">رابط Google Maps</label>
            <input name="google_map_link" type="url" value="{{ old('google_map_link', $project->google_map_link) }}" class="form-control" placeholder="https://maps.app.goo.gl/...">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">حالة المشروع</label>
            <select name="status" class="form-select">
              <option value="لم تبدأ" {{ $project->status === 'لم تبدأ' ? 'selected':'' }}>لم تبدأ</option>
              <option value="قيد التنفيذ" {{ $project->status === 'قيد التنفيذ' ? 'selected':'' }}>قيد التنفيذ</option>
              <option value="مكتملة" {{ $project->status === 'مكتملة' ? 'selected':'' }}>مكتملة</option>
            </select>
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">خريطة الموقع (PDF)</label>
            <input name="map_file" type="file" accept=".pdf" class="form-control">
            <div class="small text-muted mt-1">
              @if($project->map_file_name) الملف الحالي: {{ $project->map_file_name }} @else لم يتم رفع ملف @endif
            </div>
          </div>
        </div>
      </div>

      {{-- project files upload + list --}}
      <div class="card p-3 mb-3">
        <h6 class="mb-2">ملفات المشروع</h6>

        <form action="{{ route('manager.projects.files.store', $project->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
          @csrf
          <div class="input-group input-group-sm">
            <input type="file" name="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png,.zip,.doc,.docx" required>
            <button class="btn btn-primary" type="submit">رفع ملف</button>
          </div>
          @error('file') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </form>

        @if($project->files->isEmpty())
          <div class="small text-muted">لا توجد ملفات مرفوعة بعد</div>
        @else
          <ul class="list-group list-group-flush">
            @foreach($project->files as $f)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <i class="bi bi-file-earmark-text me-2"></i>
                  {{ $f->file_name }}
                  <div class="small text-muted">مرفوع: {{ $f->created_at->diffForHumans() }}</div>
                </div>

                <div class="d-flex gap-2">
                  <a href="{{ route('manager.projects.files.download', [$project->id, $f->id]) }}" class="btn btn-sm btn-outline-secondary">تحميل</a>

                  <form action="{{ route('manager.projects.files.destroy', [$project->id, $f->id]) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الملف؟');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">حذف</button>
                  </form>
                </div>
              </li>
            @endforeach
          </ul>
        @endif
      </div>

      <div class="d-flex gap-2">
        <button type="submit" class="btn" style="background:var(--purple-500); color:white">حفظ بيانات التنفيذ</button>
        <a href="{{ route('manager.projects.index') }}" class="btn btn-outline-secondary">إلغاء</a>
      </div>
    </form>
  </div>
</div>
@endsection
