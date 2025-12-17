@extends('layouts.manager')

@section('title','المهام')

@section('content')


<div class="container mb-4">
  <div class="row g-2">
    <div class="col-md-4">
      <select class="form-select" id="filterMashaar">
        <option value="">جميع المشاعر</option>
        <option value="منى">مشعر منى</option>
        <option value="عرفه">مشعر عرفة</option>
      </select>
    </div>

    <div class="col-md-4">
      <input type="text" class="form-control" id="searchInput" placeholder="ابحث برقم الشاخص">
    </div>

    <div class="col-md-4">
      <button class="btn btn-primary w-100" onclick="applyFilters()">بحث</button>
    </div>
  </div>
</div>


<div class="col-12 mb-3 d-flex justify-content-between align-items-center">
  <h5 class="m-0">قائمة المهام</h5>
  <a href="{{ route('manager.dashboard') }}" class="btn btn-sm" style="background:var(--purple-500);color:white">
    <i class="bi bi-arrow-left"></i> الرجوع
  </a>
</div>

@php
$statuses = [
'متأخر' => 'متأخر',
'مكتمل' => 'مكتملة',
'قيد التنفيذ' => 'قيد التنفيذ',
'لم يبدأ' => 'لم تبدأ',
];
@endphp

<table class="table table-borderless">
  <tbody>
    <tr>

      @foreach($statuses as $label => $statusValue)
      <td style="width:25%; vertical-align:top">

        <h5 class="mb-2" style="background:#dacce3;border-radius:1em;padding:1em">
          {{ $label }}
        </h5>
        <hr>

        @php
        $filtered = $projects->filter(fn($p) =>
        ($p->status ?? 'لم تبدأ') === $statusValue
        );
        @endphp

        @forelse($filtered as $project)
        <div class="card mb-3 project-card"
          data-mashaar="{{ $project->mashaar }}"
          data-center="{{ $project->center_number }}">

          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>{{ $project->name }}</strong></li>
            <li class="list-group-item">رقم الشاخص: {{ $project->center_number ?? '-' }}</li>
            <li class="list-group-item">المشعر: {{ $project->mashaar ?? '-' }}</li>
            <li class="list-group-item text-center">

              <div class="mt-2">
                @if(($project->status ?? 'لم تبدأ') === 'لم تبدأ')
                <a href="{{ route('manager.projects.create_task', $project->id) }}"
                  class="btn btn-sm btn-primary w-100">
                  إكمال البيانات
                </a>

                @elseif($project->status === 'قيد التنفيذ')
                <a href="#"
                  class="btn btn-sm btn-outline-secondary w-100 disabled">
                  تفاصيل
                </a>

                @endif
              </div>


            </li>
          </ul>

        </div>
        @empty
        <div class="small text-muted">لا توجد مشاريع</div>
        @endforelse

      </td>
      @endforeach

    </tr>
  </tbody>
</table>

{{-- JS --}}
<script>
  function applyFilters() {
    const mashaar = document.getElementById('filterMashaar').value;
    const search = document.getElementById('searchInput').value.toLowerCase();

    document.querySelectorAll('.project-card').forEach(card => {
      const cardMashaar = card.dataset.mashaar || '';
      const cardCenter = card.dataset.center || '';

      const matchMashaar = !mashaar || cardMashaar === mashaar;
      const matchSearch = !search || cardCenter.includes(search);

      card.style.display = (matchMashaar && matchSearch) ? '' : 'none';
    });
  }
</script>

@endsection