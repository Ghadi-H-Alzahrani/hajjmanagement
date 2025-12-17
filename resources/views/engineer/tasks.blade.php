@extends('layouts.engineer')

@section('title','مرحلة التنفيذ')

@section('content')
<div class="row py-4">
  <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
    <h5 class="m-0"> مرحلة التنفيذ</h5>
    <a class="btn btn-sm" style="background:var(--purple-500); color:white" href="/engineer/dashboard"><i class="bi bi-arrow-left"></i> الرجوع للوحة</a>
  </div>



<table class="table table-borderless" style="margin-bottom: 5em"> <!-- Use table-borderless to remove default lines -->
  <tbody>
    <!-- Row 1 will be a card -->
    <tr>
      <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">اعمال الشاخص</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/camp'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>

            <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">الاعمال المدنية</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/civilian'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
        <br>
                <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/civilian'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/civilian'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/civilian'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
      
      </td>
            <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">اعمال الكهربائيه</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/electrical'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/electrical'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>   
      </td>
 <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">الاعمال المكانيكية</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/mechanic'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
        <br>
                <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/mechanic'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/mechanic'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item"> <button onclick="window.location.href='/engineer/tasks/mechanic'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
      
      </td>
<td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">اعمال التجهيزات</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item">        <button onclick="window.location.href='/engineer/tasks/addition'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item">        <button onclick="window.location.href='/engineer/tasks/addition'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  كود الخيمة : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
 <li class="list-group-item">        <button onclick="window.location.href='/engineer/tasks/addition'"  type="button" class="btn btn-primary btn-sm" > اكمال</button></li>
  </ul>
  </ul>
        </div>
      
      </td>
      
    </tr>

  </tbody >
  

</table>

<hr>
<br>