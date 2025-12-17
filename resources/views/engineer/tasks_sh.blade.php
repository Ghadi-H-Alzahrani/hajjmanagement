@extends('layouts.engineer')

<!DOCTYPE html>
<html lang="en">

<body>
  


@section('title','المهام')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-md-4">
      <select class="form-select" id="filterCategory">
        <option value="">جميع الفئات</option>
        <option value="electronics">مشعر منى</option>
        <option value="books">مشعر عرفة</option>

      </select>
    </div>
        <div class="col-md-4">
      <input type="text" class="form-control" id="searchInput" placeholder="ابحث برقم الشاخص">
    </div>
    <div class="col-md-4">
      <button class="btn btn-primary" id="filterButton">بحث</button>
    </div>
  </div>
</div>




  <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
    <h5 class="m-0">قائمة المهام</h5>
   
  </div>

  
<table class="table table-borderless" style="margin-bottom: 5em"> <!-- Use table-borderless to remove default lines -->
  <tbody>
    <!-- Row 1 will be a card -->
    <tr>
      <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">متاخر</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>
      
      </td>

            <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">مكتمل</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
     <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>
        <br>
                <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
   <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>
      
      </td>
            <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">قيد التنفيذ</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
  <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>   
      </td>
 <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">لم يبداْ</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks/details'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>
        <br>
                <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
  <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks/details'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
  <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks/details'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
  <li class="list-group-item">  <button onclick="window.location.href='/engineer/tasks/details'"  type="button" class="btn btn-primary btn-sm" > التفاصيل</button></li>
  </ul>
        </div>
      
      </td>
      
    </tr>

  </tbody >
  

</table>

<hr>
<br>

  <div class="col-12">
    <div class="row g-3">

      <div class="col-12 col-md-3">
        <h6 class="mb-2">متأخر</h6>
        <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع ضيوف البيت</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
  </ul>
  <div class="card-body">
    <a href="/manager/tasks" class="card-link">التفاصيل </a>

  </div>
</div>
   <div id="col-late"></div>
      </div>

      <div class="col-12 col-md-3">
        <h6 class="mb-2">مكتمل</h6>
      <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع الرفادة</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : منى</li>
  </ul>
  <div class="card-body">
    <a href="/manager/tasks" class="card-link">التفاصيل </a>

  </div>
</div>
<br>
        <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع ضيوف البيت</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
  </ul>
  <div class="card-body">
    <a href="/manager/tasks" class="card-link">التفاصيل </a>

  </div>
</div>
<br>
        <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع ضيوف البيت</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
  </ul>
  <div class="card-body">
    <a href="/manager/tasks" class="card-link">التفاصيل </a>

  </div>
</div>
        <div id="col-complete"></div>
      </div>

      <div class="col-12 col-md-3">
        <h6 class="mb-2">قيد التنفيذ</h6>
                <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع اكرام</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
  </ul>
  <div class="card-body">
    <a href="/manager/tasks" class="card-link">التفاصيل </a>
  </div>
</div>
<br>
                <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع ضيوف البيت</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : منى</li>
  </ul>
  <div class="card-body">
    <a href="/manager/sh/tasks" class="card-link">التفاصيل </a>

  </div>
</div>
   <!-- 
        <div id="col-inprogress"></div>
      </div>
      <div class="col-12 col-md-3">
        <h6 class="mb-2">لم يبدأ</h6>
                <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع ضيوف البيت</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : منى</li>
  </ul>
  <div class="card-body">
    <a href="/manager/tasks/details" class="card-link">التفاصيل </a>

  </div>
</div>
<br>
                <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع ضيوف البيت</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : منى</li>
  </ul>
  <div class="card-body">
    <a href="/manager/tasks/details" class="card-link">التفاصيل </a>

  </div>
</div>  -->
<br>
                <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">مشروع ضيوف البيت</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : منى</li>
  </ul>
  <div class="card-body">
    <a href="/manager/tasks/details" class="card-link">التفاصيل </a>

  </div>
</div>
        <div id="col-notstarted"></div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>

@endsection
