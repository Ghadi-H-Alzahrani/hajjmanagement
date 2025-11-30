<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','لوحة التحكم')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

  <style>
    :root{
      --purple-50: #f3f0ff;
      --purple-200: #cdbcff;
      --purple-500: #6a4ef5;
      --purple-700: #4b2bd6;
      --muted: #757585;
      --white: #fff;
    }
    html,body { height:100%; }
    body{
      font-family: "Tajawal", "Noto Naskh Arabic", system-ui, sans-serif;
      background: var(--purple-50);
      color:#222;
      padding-top:70px;
      direction: rtl;
    }

    /* navbar */
    .navbar { background: var(--white); box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
    .navbar-brand { color: var(--purple-700); font-weight:700; }

    /* cards */
    .card-ghost {
      background: linear-gradient(180deg, rgba(106,78,245,0.06), rgba(106,78,245,0.02));
      border: none;
      box-shadow: 0 6px 18px rgba(75,43,214,0.06);
      border-radius: 12px;
    }
    .stat-icon {
      width:56px; height:56px; border-radius:12px;
      display:flex; align-items:center; justify-content:center; font-size:22px;
      background: linear-gradient(180deg, var(--purple-500), var(--purple-700));
      color: white;
      box-shadow: 0 6px 14px rgba(75,43,214,0.14);
    }
    .dashboard-cards .card { border-radius:10px; }

    /* responsive grid tweak */
    .dashboard-cards .col {
      display:flex; align-items:stretch;
    }

    /* tasks */
    .task-card { border-left:4px solid rgba(0,0,0,0.04); border-radius:10px; }
    .task-status { font-size:13px; color:var(--muted); }

    /* filters */
    .chip {
      padding:6px 10px; border-radius:999px; display:inline-block; font-size:13px;
      border:1px solid rgba(106,78,245,0.12); background: rgba(106,78,245,0.06); color:var(--purple-700);
    }

    /* small screens */
    @media (max-width:768px){
      .stat-icon { width:48px; height:48px; font-size:20px; }
    }
  </style>
  @stack('head')
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="/manager/dashboard">نظام الإدارة</a>

    <div class="d-flex gap-2 align-items-center">
      <a class="btn btn-sm btn-outline-secondary" href="/manager/dashboard"><i class="bi bi-house-door"></i> لوحة</a>
      <a class="btn btn-sm" style="background:var(--purple-500); color:white" href="/manager/tasks"><i class="bi bi-list-check"></i> المهام</a>
    </div>
  </div>
</nav>

<div class="container-fluid">
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
