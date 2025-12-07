
  

@extends('layouts.manager')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


@section('title','تفاصيل المهمة')

@section('content')



<div class="card" style=" display:flex; justify-content:center;  height:100vh; width: 500px; margin: 0 auto; padding-bottom: 20px;  align-items: center;  background-color: white;"
      >


  <div class="card-body">
    <h5 class="card-title" style="padding-top: 25%" >البيانات التفصيلية للمهمه</h5>
  </div>


  <br>
  <hr style=  "border: 6px solid black; width:100%" >

  <br>
    <div class="col-12 mb-3">
    <div class="card p-2 card-ghost">
      <div class="d-flex align-items-start gap-3">
        <div style="flex:1">
          <div class="small text-muted">اسم المشروع</div>
         <strong >مشروع ضيوف البيت - رقم 2</strong>

          <div class="small text-muted mt-2">المدير المسند: <strong id="assigned-manager">المهندس كريم</strong></div>

          <div class="mt-2">
            <div class="small text-muted">فريق العمل:  s<strong >حاتم - علي - عبدالغفور</strong></div>

          </div>

          <div class="mt-3">
            <div class="small text-muted">شركة الخدمة: <strong id="company-name">شركة ضيوف البيت</strong></div>
           
          </div>
        </div>


      </div>
    </div>
  </div>

<table class="table" style="padding:10;  width:80%; font-family: Times New Roman, Times, serif; " >

  <tbody>

     <tr>
            <td>  <strong> <h5 style=" font-weight: bold; padding-right: 10%;">كود الخيمه  35435</h5></strong></p></td>

            <td>  <strong> <h5 style=" font-weight: bold;">رقم الشاخص  35435</h5></strong></p></td>

            <td>  <strong> <h5 style=" font-weight: bold;">رقم المربع  35435</h5></strong></p></td>
    </tr>

    <tr>

      <td> <p style="width: 6em; word-spacing: 1px;padding-right: 15%;"> المشعر :      <br>عرفة</p></td>
      <td> <p style="width: 6em; word-spacing: 1px;"> الجنسية : <br>مصري</p></td>
      <td> <p style="width: 6em; word-spacing: 1px;"> الفئة :       <br> ب</p></td>

    </tr>

    <tr>

      <td> <p style="width: 6em; word-spacing: 1px; padding-right: 15%;"> المساحة الكلية 56 م2</p></td>
      <td> <p style="width: 6em; word-spacing: 1px;"> مساحة الخيام : 44 م2</p></td>
      <td> <p style="width: 6em; word-spacing: 1px;"> عدد الحجاج :<br> 55 حاج</p></td>

    </tr>

    <tr>

      <td> <p style="width: 6em; word-spacing: 1px; padding-right: 15%;"> قدرة المكيفات <br> 30 </p></td>
      <td> <p style="width: 6em; word-spacing: 1px;"> ارقام المحول :<br> 36</p></td>
      <td> <p style="width: 6em; word-spacing: 1px;"> اسم المقاول :<br> عبدالله المطيري</p></td>

    </tr>

        <tr>

      <td> <p style="width: 6em; word-spacing: 1px; padding-right: 15%;"> رابط الموقع :<br> google map </p></td>
      <td> <p style="width: 6em; word-spacing: 1px;"> خريطه الخيمه :<br> pdf</p></td>
      <td> <p style="width: 6em; word-spacing: 1px;"> رقم المركز :<br> عبدالله المطيري</p></td>

    </tr>


  </tbody>
</table>
</div>





<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-end">
        <h6 class="mb-3">تم إنشاء المهمة </h6>
        <pre id="collected-json" style="background:#f8f9fa;padding:12px;border-radius:6px; max-height:260px; overflow:auto;"></pre>
        <div class="text-start mt-3">
          <button class="btn btn-sm btn-primary" data-bs-dismiss="modal">حسنًا</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

</body>
</html>
