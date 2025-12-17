
  

@extends('layouts.manager')



@section('title','تفاصيل المهمة')

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Report Page</title>
    <!-- Bootstrap CSS CDN link (Bootstrap 5) -->
    <link href="cdn.jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Optional custom CSS for styling (add a <style> tag or link an external file) -->
    <style>
        body { background-color: #f4f7f9; }
        .report-card { margin-top: 20px; }
        .report-header { padding: 20px; background-color: #ffffff; border-bottom: 1px solid #dee2e6; }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">  </a>
        </div>
    </nav>

    <!-- Main Content Container -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (optional, adjust grid classes as needed) -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                ماقبل التنفيذ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                التنفيذ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                الاغلاق
                            </a>
                        </li>
                                                <li class="nav-item">
                            <a class="nav-link" href="#">
                                المستندات
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">التقرير النهائي للمشروع  </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-sm btn-outline-secondary">طباعه</button>
                    </div>
                </div>

                <!-- Report Content (Table) -->
                <div class="card report-card shadow-sm">
                    <div class="card-header">
                        ملخص الاعمال  
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
    
                                        <th scope="col">الشواخص</th>
                                        <th scope="col"> ماقبل التنفيذ</th>
                                        <th scope="col"> اثناء التنفيذ</th>
                                        <th scope="col"> الاغلاق</th>
                                        <th scope="col"> المستندات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                     
                                        <td>9575 </td>
                                        <td>استلام التخصيص</td>
                                        <td>الاعمال المدنيه</td>
                                        <td>مطابقه الاعمال </td>
                                         <td><button  type="button" class="btn btn-primary"  style="width:4em" id="showAttachmentsButton" > عرض</button> </td>
                                    </tr>
                                    <tr>
                                    
                                        <td>96524</td>
                                        <td>استلام الموقع من كدانه</td>
                                        <td>الاعمال الكهربائيه</td>
                                        <td>سلامه التمديدات الكهربا~يه</td>
                                         <td><button  type="button" class="btn btn-primary"  style="width:4em" id="showAttachmentsButton" > عرض</button> </td>
                                    </tr>
                                    <tr>
                                     
                                        <td>85265</td>
                                        <td>رخصه الجاهزيه</td>
                                        <td>اعمال الميكانيا</td>
                                        <td>المستخلصات</td>
                                         <td><button  type="button" class="btn btn-primary"  style="width:4em" id="showAttachmentsButton" > عرض</button> </td>
                                    </tr>
      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS CDN links (Popper and JS bundle) -->
    <script src="cdn.jsdelivr.net" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="cdn.jsdelivr.net" integrity="sha384-0pUGZvb3lLSFkoRN7IzCDKlmhBA+OWrBnT+KjP/bQchQCWzXx21RpKa51rQnQER9K" crossorigin="anonymous"></script>


</body>
</html>

@endsection