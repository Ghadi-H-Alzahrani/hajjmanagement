@extends('layouts.manager')
@section('title','المهام')

@section('content')
<div class="row py-4">
  <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
    <h5 class="m-0">قائمة المهام</h5>
    <a class="btn btn-sm" style="background:var(--purple-500); color:white" href="{{ route('manager.dashboard') }}"><i class="bi bi-arrow-left"></i> الرجوع للوحة</a>
  </div>

  <div class="col-12">
    <div class="row g-3">
      @php
      $statusCols = [
      'متأخر' => 'late',
      'مكتمل' => 'مكتملة',
      'قيد التنفيذ' => 'قيد التنفيذ',
      'لم يبدأ' => 'لم تبدأ'
      ];
      @endphp

      @foreach($statusCols as $label => $statusValue)
      <div class="col-12 col-md-3">
        <h6 class="mb-2">{{ $label }}</h6>

        @php
        $filtered = $projects->filter(function($p) use ($statusValue) {
        return ($p->status ?? 'لم تبدأ') === $statusValue;
        });
        @endphp

        @forelse($filtered as $project)
        <div class="card p-2 mb-2 task-card">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <strong>{{ $project->name }}</strong>
              <div class="task-status mt-1">{{ $project->company ?? '-' }} • {{ $project->assigned_manager?->name ?? '-' }}</div>
            </div>
            <div class="text-muted small">{{ $statusValue === 'late' ? 'متأخر' : '' }}</div>
          </div>

          <div class="mt-2 d-flex gap-2">
            <a href="{{ route('manager.projects.create_task', $project->id) }}" class="btn btn-sm btn-outline-primary">إكمال البيانات</a>
            <a href="{{ route('manager.projects.create_task', $project->id) }}" class="btn btn-sm btn-outline-secondary">تفاصيل</a>
          </div>

        </div>
        @empty
        <div class="small text-muted">لا توجد مشاريع</div>
        @endforelse
      </div>
      @endforeach

    </div>
  </div>
</div>
@endsection