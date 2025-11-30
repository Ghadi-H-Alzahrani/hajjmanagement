@extends('layouts.manager')

@section('title','المهام')

@section('content')
<div class="row py-4">
  <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
    <h5 class="m-0">قائمة المهام</h5>
    <a class="btn btn-sm" style="background:var(--purple-500); color:white" href="{{ route('manager.dashboard') }}">
      <i class="bi bi-arrow-left"></i> الرجوع للوحة
    </a>
  </div>

  <div class="col-12">
    <div class="row g-3">
      @php
        $statuses = [
          'late' => 'متأخر',
          'complete' => 'مكتمل',
          'in_progress' => 'قيد التنفيذ',
          'not_started' => 'لم يبدأ'
        ];
      @endphp

      @foreach($statuses as $statusKey => $statusLabel)
      <div class="col-12 col-md-3">
        <h6 class="mb-2">{{ $statusLabel }}</h6>
        @foreach($projects->where('status', $statusKey) as $project)
        <div class="card p-2 mb-2 task-card">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <strong>{{ $project->name }}</strong>
              <div class="task-status mt-1">
                {{ $project->company ?? '-' }} • {{ $project->assigned_manager->name }} • موعد: {{ $project->due_date ?? '-' }}
              </div>
            </div>
            <div class="text-muted small">
              @if($statusKey == 'late')
              <span class="text-danger">متأخر</span>
              @endif
            </div>
          </div>
          <a href="{{ route('manager.projects.createTask', $project->id) }}" class="btn btn-sm btn-primary mt-2">إكمال البيانات</a>
        </div>
        @endforeach
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
