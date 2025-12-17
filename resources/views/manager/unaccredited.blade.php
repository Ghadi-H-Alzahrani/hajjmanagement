@extends('layouts.manager')

@section('title','المهام الغير معتمدة')

@section('content')

  <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
    <h5 class="m-0"> قائمة المهام الغير معتمدة</h5>
    <a class="btn btn-sm" style="background:var(--purple-500); color:white" href="/manager/dashboard"><i class="bi bi-arrow-left"></i> الرجوع للوحة</a>
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
    <li class="list-group-item"><a href="/manager/sh/tasks/camp" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/camp" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/camp" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
      
      </td>

            <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">الاعمال المدنية</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/civilian" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
                <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/civilian" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/civilian" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/civilian" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
      
      </td>
            <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">اعمال الكهربائيه</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/electrical" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/electrical" class="card-link">التفاصيل </a></li>
  </ul>
        </div>   
      </td>
 <td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">الاعمال المكانيكية</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/mechanic" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
                <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/mechanic" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/mechanic" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/mechanic" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
      
      </td>
<td>
          <h5 class="mb-2" style="background-color:#dacce3 ; border-radius: 1em; padding: 1em;">اعمال التجهيزات</h5>
          <hr>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/addition" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/addition" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
        <br>
        <div class="card">
  <ul class="list-group list-group-flush">
        <li class="list-group-item">  مشروع ضيوف البيت </li>
    <li class="list-group-item">  رقم الشاخص : 98745</li>
    <li class="list-group-item">   المشعر : عرفة</li>
    <li class="list-group-item"><a href="/manager/sh/tasks/addition" class="card-link">التفاصيل </a></li>
  </ul>
        </div>
      
      </td>
      
    </tr>

  </tbody >
  

</table>

<hr>
<br>



@endsection
