@extends('layouts.admin')

@section('title','المشاريع')

@section('content')
<div class="row py-4">
  <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
    <h5 class="m-0">قائمة المشاريع</h5>
    <a class="btn btn-sm" style="background:var(--purple-500); color:white" href="/admin/dashboard"><i class="bi bi-arrow-left"></i> الرجوع للوحة</a>
  </div>

  <div class="col-12">
    <div class="row g-3">

      <div class="col-12 col-md-3">
        <h6 class="mb-2">لم يبدأ</h6>
        <div id="col-notstarted"></div>
      </div>

      <div class="col-12 col-md-3">
        <h6 class="mb-2">قيد التنفيذ</h6>
        <div id="col-inprogress"></div>
      </div>

      <div class="col-12 col-md-3">
        <h6 class="mb-2">مكتمل</h6>
        <div id="col-complete"></div>
      </div>

      <div class="col-12 col-md-3">
        <h6 class="mb-2">متأخر</h6>
        <div id="col-late"></div>
      </div>

    </div>
  </div>
</div>

@push('scripts')
<script>
const tasks_local = [
  { id:1, title:'مشروع الرفاده 1', status:'complete', project:'شاخص 77722', assignee:'مدير هيثم', due:'2025-10-01' },
  { id:2, title:'مشروع الرفاده 2', status:'in_progress', project:'شاخص 58899', assignee:'مدير كريم', due:'2025-10-05' },
  { id:3, title:'مشروع اكرام 3', status:'not_started', project:'شاخص 55566', assignee:'مدير كريم', due:'2025-10-10' },
  { id:4, title:'مشروع ضيوف البيت 4', status:'late', project:'شاخص 44411', assignee:'مدير عبدالله', due:'2025-09-20' },
  { id:5, title:'مشروع احسان 5', status:'complete', project:'شاخص 66333', assignee:'مدير هيثم', due:'2025-10-12' },
  { id:6, title:'مشروع الرفاده 6', status:'in_progress', project:'شاخص 58899', assignee:'مدير كريم', due:'2025-10-05' },
  { id:7, title:'مشروع اكرام 7', status:'not_started', project:'شاخص 55566', assignee:'مدير كريم', due:'2025-10-10' },
  { id:8, title:'مشروع ضيوف البيت 8', status:'late', project:'شاخص 44411', assignee:'مدير عبدالله', due:'2025-09-20' },
  { id:9, title:'مشروع الرفاده 9', status:'in_progress', project:'شاخص 58899', assignee:'مدير كريم', due:'2025-10-05' },
  { id:10, title:'مشروع اكرام 10', status:'not_started', project:'شاخص 55566', assignee:'مدير كريم', due:'2025-10-10' },
  { id:11, title:'مشروع الرفاده 11', status:'complete', project:'شاخص 77722', assignee:'مدير هيثم', due:'2025-10-01' },
  { id:12, title:'مشروع الرفاده 12', status:'not_started', project:'شاخص 58899', assignee:'مدير كريم', due:'2025-10-05' },
  { id:13, title:'مشروع اكرام 13', status:'not_started', project:'شاخص 55566', assignee:'مدير كريم', due:'2025-10-10' },
  { id:14, title:'مشروع ضيوف البيت 14', status:'late', project:'شاخص 44411', assignee:'مدير عبدالله', due:'2025-09-20' },
  { id:15, title:'مشروع احسان 15', status:'complete', project:'شاخص 66333', assignee:'مدير هيثم', due:'2025-10-12' },
];

function renderTasks() {
  const map = {
    not_started: document.getElementById('col-notstarted'),
    in_progress: document.getElementById('col-inprogress'),
    late: document.getElementById('col-late'),
    complete: document.getElementById('col-complete'),

   
  };
  Object.values(map).forEach(el => el.innerHTML = '');

  tasks_local.forEach(t=>{
    const div = document.createElement('div');
    div.className = 'card p-2 mb-2 task-card';
    div.innerHTML = `
      <div class="d-flex justify-content-between align-items-start">
        <div>
          <strong>${t.title}</strong>
          <div class="task-status mt-1">${t.project} • ${t.assignee} • موعد: ${t.due}</div>
        </div>
        <div class="text-muted small">${t.status === 'late' ? '<span class="text-danger">متأخر</span>' : ''}</div>
      </div>
    `;
    if (map[t.status]) map[t.status].appendChild(div);
  });
}

document.addEventListener('DOMContentLoaded', renderTasks);
</script>
@endpush
@endsection
