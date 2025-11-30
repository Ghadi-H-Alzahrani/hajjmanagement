@extends('layouts.manager')

@section('title','لوحة المدير')

@section('content')
<div class="row py-4">
  <div class="col-12 mb-3">
    <!-- Arabic navigation -->
    <ul class="nav nav-pills">
      <li class="nav-item"><a class="nav-link active" href="#">غير معتمد</a></li>
      <li class="nav-item"><a class="nav-link" href="#">تقارير</a></li>
      <li class="nav-item"><a class="nav-link" href="/manager/tasks">المهام</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('manager.tasks') }}">المشاريع</a></li>
    </ul>
  </div>

  <!-- Filters -->
  <div class="col-12 mb-3">
    <div class="card p-3 mb-2">
      <div class="row g-2 align-items-center">
        <div class="col-auto">
          <select id="filter-project" class="form-select form-select-sm">
            <option value="">كل المشاريع</option>
            <option value="1">مشروع أ</option>
            <option value="2">مشروع ب</option>
            <option value="3">مشروع ج</option>
          </select>
        </div>
        <div class="col-auto">
          <select id="filter-status" class="form-select form-select-sm">
            <option value="">كل الحالات</option>
            <option value="not_started">لم يبدأ</option>
            <option value="in_progress">قيد التنفيذ</option>
            <option value="complete">مكتمل</option>
            <option value="late">متأخر</option>
          </select>
        </div>
        <div class="col-auto">
          <button id="apply-filters" class="btn btn-outline-primary btn-sm">تطبيق</button>
        </div>
        <div class="col text-end">
          <span class="chip">الفلاتر تؤثر على البطاقات و المخطط</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Dynamic cards -->
  <div class="col-12 mb-3 dashboard-cards">
    <div class="row g-3" id="cards-container">
      <!-- injected by JS -->
    </div>
  </div>

  <!-- Chart area -->
  <div class="col-12">
    <div class="card p-3">
      <div class="row align-items-end mb-3">
        <div class="col-auto">
          <label class="form-label small">محور X</label>
          <select id="chart-x" class="form-select form-select-sm">
            <option value="project">المشروع</option>
            <option value="status">الحالة</option>
            <option value="assignee">المسؤول</option>
          </select>
        </div>
        <div class="col-auto">
          <label class="form-label small">محور Y</label>
          <select id="chart-y" class="form-select form-select-sm">
            <option value="count">عدد المهام</option>
            <option value="effort_hours">ساعات العمل</option>
          </select>
        </div>
        <div class="col-auto">
          <label class="form-label small">تجميعة</label>
          <select id="chart-agg" class="form-select form-select-sm">
            <option value="count">count</option>
            <option value="sum">sum</option>
            <option value="avg">avg</option>
          </select>
        </div>
        <div class="col-auto">
          <button id="update-chart" class="btn btn-sm" style="background:var(--purple-500); color:white">تحديث المخطط</button>
        </div>
      </div>

      <canvas id="managerChart" style="height:360px"></canvas>
    </div>
  </div>

</div>

@push('scripts')
<script>
/* Demo frontend data (modify as needed) */
const tasks = [
  { id:1, project: 'مشروع أ', project_id:1, title:'مهمة 1', status:'complete', assignee:'مهندس 1', effort_hours: 5, created_at:'2025-10-01' },
  { id:2, project: 'مشروع أ', project_id:1, title:'مهمة 2', status:'in_progress', assignee:'مهندس 2', effort_hours: 3, created_at:'2025-10-03' },
  { id:3, project: 'مشروع ب', project_id:2, title:'مهمة 3', status:'not_started', assignee:'مهندس 3', effort_hours: 8, created_at:'2025-10-05' },
  { id:4, project: 'مشروع ج', project_id:3, title:'مهمة 4', status:'late', assignee:'مهندس 2', effort_hours: 2, created_at:'2025-10-08' },
  { id:5, project: 'مشروع ب', project_id:2, title:'مهمة 5', status:'complete', assignee:'مهندس 1', effort_hours: 6, created_at:'2025-10-10' },
  // add more rows to demo
];

function applyFilters() {
  const pid = document.getElementById('filter-project').value;
  const st = document.getElementById('filter-status').value;
  let out = tasks.slice();
  if (pid) out = out.filter(t => String(t.project_id) === String(pid));
  if (st) out = out.filter(t => t.status === st);
  return out;
}

/* Render nicer cards */
function renderCards() {
  const container = document.getElementById('cards-container');
  container.innerHTML = '';
  const data = applyFilters();

  const total = data.length;
  const completed = data.filter(d=>d.status==='complete').length;
  const inProgress = data.filter(d=>d.status==='in_progress').length;
  const late = data.filter(d=>d.status==='late').length;
  const hours = data.reduce((s,d)=>s + (Number(d.effort_hours)||0),0);

  const cards = [
    { title:'إجمالي المهام', value: total, icon:'bi-kanban-fill', color:'var(--purple-500)' },
    { title:'المكتملة', value: completed, icon:'bi-check-circle-fill', color:'#20c997' },
    { title:'قيد التنفيذ', value: inProgress, icon:'bi-play-circle-fill', color:'#ffc107' },
    { title:'متأخرة', value: late, icon:'bi-exclamation-octagon-fill', color:'#dc3545' },
    { title:'ساعات مجمعة', value: hours, icon:'bi-clock-history', color:'var(--purple-700)' },
  ];

  cards.forEach(c=>{
    const col = document.createElement('div');
    col.className = 'col-12 col-sm-6 col-md-4 col-lg-3';
    col.innerHTML = `
      <div class="card card-ghost p-3 h-100">
        <div class="d-flex align-items-center gap-3">
          <div class="stat-icon" style="background:linear-gradient(180deg, ${c.color}, ${c.color}); opacity:0.95;">
            <i class="bi ${c.icon}" style="font-size:20px"></i>
          </div>
          <div class="flex-fill text-end">
            <div class="small text-muted">${c.title}</div>
            <div class="h4 m-0">${c.value}</div>
          </div>
        </div>
      </div>
    `;
    container.appendChild(col);
  });
}

/* Chart logic */
let managerChart = null;
function groupBy(list, keyFn) {
  return list.reduce((acc, item) => {
    const key = keyFn(item);
    acc[key] = acc[key] || [];
    acc[key].push(item);
    return acc;
  }, {});
}

function computeChartData(xField, yField, agg) {
  const data = applyFilters();
  const groups = groupBy(data, r => {
    if (xField === 'project') return r.project;
    if (xField === 'status') return ({ 'not_started':'لم يبدأ','in_progress':'قيد التنفيذ','complete':'مكتمل','late':'متأخر' })[r.status] || r.status;
    if (xField === 'assignee') return r.assignee || 'غير معين';
    return r[xField] ?? 'غير معلوم';
  });
  const labels = Object.keys(groups);
  const values = labels.map(lbl=>{
    const rows = groups[lbl];
    if (agg === 'count') return rows.length;
    if (agg === 'sum') return rows.reduce((s,r)=>s + Number(r[yField]||0),0);
    if (agg === 'avg') {
      const s = rows.reduce((s,r)=>s + Number(r[yField]||0),0);
      return rows.length ? (s/rows.length) : 0;
    }
    return 0;
  });
  return { labels, values };
}

function renderChart() {
  const x = document.getElementById('chart-x').value;
  const y = document.getElementById('chart-y').value;
  const agg = document.getElementById('chart-agg').value;

  const ds = computeChartData(x, y === 'count' ? 'effort_hours' : y, agg);
  const ctx = document.getElementById('managerChart').getContext('2d');
  if (managerChart) managerChart.destroy();

  managerChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ds.labels,
      datasets: [{
        label: `${agg}(${y})`,
        data: ds.values,
        borderRadius: 8,
        backgroundColor: 'rgba(106,78,245,0.9)'
      }]
    },
    options: {
      responsive:true,
      plugins: { legend: { display:false }, tooltip: { mode:'index', intersect:false } },
      scales: { y: { beginAtZero:true } }
    }
  });
}

document.addEventListener('DOMContentLoaded', function(){
  renderCards();
  renderChart();
  document.getElementById('apply-filters').addEventListener('click', function(){ renderCards(); renderChart(); });
  document.getElementById('update-chart').addEventListener('click', renderChart);
});
</script>
@endpush
@endsection
