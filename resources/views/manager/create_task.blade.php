@extends('layouts.manager')

@section('title','إنشاء مهمة جديدة')

@section('content')
<div class="row py-4">
  <div class="col-12 d-flex justify-content-between align-items-center mb-3">
    <h4 class="m-0">إنشاء مهمة</h4>
    <div>
      <a href="{{ route('manager.tasks') }}" class="btn btn-sm" style="background:var(--purple-500);color:white">
        <i class="bi bi-arrow-left"></i> العودة
      </a>
    </div>
  </div>

  {{-- flash --}}
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

  <div class="col-12 mb-3">
    <div class="card p-2 card-ghost">
      <div class="d-flex align-items-start gap-3">
        <div style="flex:1">
          <div class="small text-muted">اسم المشروع</div>
          <h5 id="project-name" class="mb-1">{{ $project->name }}</h5>

          <div class="small text-muted mt-2">المدير المسند:
            <strong id="assigned-manager">{{ $project->assigned_manager?->name ?? '-' }}</strong>
          </div>

          <div class="mt-2">
            <div class="small text-muted">فريق العمل:</div>
            <div id="team-list" class="d-flex flex-wrap gap-2 mt-1">
              {{-- optional: if you store team members as relation or json, render here --}}
            </div>
          </div>

          <div class="mt-3">
            <div class="small text-muted">شركة الخدمة:
              <strong id="company-name">{{ $project->company ?? '-' }}</strong>
            </div>
            <div class="small text-muted mt-1">ملاحظة (اختياري):
              <em id="admin-note">{{ $project->note ?? '-' }}</em>
            </div>
          </div>
        </div>

        {{-- show current map file if exists --}}
        <div class="text-start">
          @if($project->map_file_name)
            <a href="{{ Storage::url('project_maps/'.$project->map_file_name) }}" target="_blank" class="btn btn-sm btn-outline-secondary mb-2">
              تحميل خريطة المشروع
            </a>
          @else
            <div class="small text-muted">لا توجد خريطة مرفوعة</div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="col-12">
    <div class="card p-3">
      <h6 class="mb-3">البيانات التفصيلية للشاخص</h6>

      <form id="task-form" action="{{ route('manager.projects.create_task.store', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
          <div class="col-12 col-md-4">
            <label class="form-label">المشعر <span class="text-danger">*</span></label>
            <select name="mashaar" id="field-mashaar" class="form-select">
              <option value="">اختر</option>
              <option value="عرفه" {{ old('mashaar', $project->mashaar) == 'عرفه' ? 'selected' : '' }}>عرفة</option>
              <option value="منى" {{ old('mashaar', $project->mashaar) == 'منى' ? 'selected' : '' }}>منى</option>
              <option value="مشعر آخر" {{ old('mashaar', $project->mashaar) == 'مشعر آخر' ? 'selected' : '' }}>مشعر آخر</option>
            </select>
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">الجنسية <span class="text-danger">*</span></label>
            <input name="nationality" id="field-nationality" class="form-control" placeholder="مثال: سعودي" value="{{ old('nationality', $project->nationality) }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">رقم الشاخص <span class="text-danger">*</span></label>
            <input name="center_number" id="field-center-number" class="form-control" placeholder="مثال: 123" value="{{ old('center_number', $project->center_number) }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">الفئة <span class="text-danger">*</span></label>
            <input name="category" id="field-category" class="form-control" placeholder="مثال: أ\ب" value="{{ old('category', $project->category) }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">المساحة الكلية (م²) <span class="text-danger">*</span></label>
            <input name="total_area" id="field-total-area" type="number" min="0" step="0.01" class="form-control" placeholder="مثال: 1000" value="{{ old('total_area', $project->total_area) }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">مساحة الخيام (م²) <span class="text-danger">*</span></label>
            <input name="tent_area" id="field-tent-area" type="number" min="0" step="0.01" class="form-control" placeholder="مثال: 600" value="{{ old('tent_area', $project->tent_area) }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">عدد الحجاج <span class="text-danger">*</span></label>
            <input name="pilgrims_count" id="field-pilgrims-count" type="number" min="0" class="form-control" placeholder="مثال: 5000" value="{{ old('pilgrims_count', $project->pilgrims_count) }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">قدرة المكيفات المستخدمة</label>
            <input name="ac_capacity" type="number" min="0" class="form-control" placeholder="مثال: 5000" value="{{ old('ac_capacity', $project->ac_capacity ?? '') }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">أرقام المحول المغذية</label>
            <input name="transformer_numbers" type="text" class="form-control" placeholder="مثال: 12345,67890" value="{{ old('transformer_numbers', $project->transformer_numbers ?? '') }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">اسم المقاول <span class="text-danger">*</span></label>
            <input name="contractor" id="field-contractor" class="form-control" placeholder="اسم المقاول" value="{{ old('contractor', $project->contractor) }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">رابط موقع Google <span class="text-danger">*</span></label>
            <input name="google_map_link" id="field-map-link" type="url" class="form-control" placeholder="مثال: https://maps.app.goo.gl/...." value="{{ old('google_map_link', $project->google_map_link) }}">
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">خريطة الموقع (ملف PDF)</label>
            <input name="map_file" id="field-map-file" type="file" accept=".pdf" class="form-control">
            <div id="map-file-name" class="small text-muted mt-1">{{ $project->map_file_name ? $project->map_file_name : 'لم يتم رفع ملف' }}</div>
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">حالة المشروع</label>
            <select name="status" class="form-select">
              <option value="لم تبدأ" {{ old('status', $project->status) == 'لم تبدأ' ? 'selected':'' }}>لم تبدأ</option>
              <option value="قيد التنفيذ" {{ old('status', $project->status) == 'قيد التنفيذ' ? 'selected':'' }}>قيد التنفيذ</option>
              <option value="مكتملة" {{ old('status', $project->status) == 'مكتملة' ? 'selected':'' }}>مكتملة</option>
            </select>
          </div>
        </div>

        {{-- uploaded project files list --}}
        <div class="mt-3">
          <h6 class="mb-2">ملفات المشروع</h6>
          @if($project->files->isEmpty())
            <div class="small text-muted">لا توجد ملفات مرفوعة</div>
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

        <div class="mt-4 d-flex gap-2">
          <button id="btn-submit" type="submit" class="btn" style="background:var(--purple-500); color:white">حفظ البيانات</button>
          <button id="btn-reset" type="button" class="btn btn-outline-secondary">إعادة تعيين</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
document.getElementById('field-map-file')?.addEventListener('change', function(e){
  const f = e.target.files[0];
  const nameEl = document.getElementById('map-file-name');
  if (!f) { nameEl.innerText = 'لم يتم رفع ملف'; return; }
  nameEl.innerText = f.name + ' (' + Math.round(f.size/1024) + ' KB)';
});

document.getElementById('btn-reset')?.addEventListener('click', function(){
  document.getElementById('task-form').reset();
  document.getElementById('map-file-name').innerText = '{{ $project->map_file_name ? $project->map_file_name : "لم يتم رفع ملف" }}';
});
</script>
@endpush
@endsection
