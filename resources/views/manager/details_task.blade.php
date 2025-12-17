@extends('layouts.manager')


@section('title','قائمه المشاريع')

@section('content')


  

  <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
    <h5 class="m-0">قائمة المشاريع</h5>
   
  </div>

  
<table class="table table-borderless" style="margin-bottom: 5em"> <!-- Use table-borderless to remove default lines -->
  <tbody>
    <!-- Row 1 will be a card -->
    <tr>
      <td>

          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
            <li class="list-group-item">  <h3>بيانات المشروع</h3> </li>
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item">  <button onclick="window.location.href='/manager/tasks/create'"  type="button" class="btn btn-primary btn-sm" > بدء</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
                <li class="list-group-item">  <h3>بيانات المشروع</h3> </li>
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item">  <button onclick="window.location.href='/manager/tasks/create'"  type="button" class="btn btn-primary btn-sm" > بدء</button></li>
  </ul>
        </div>

</body>
</html>
@endsection