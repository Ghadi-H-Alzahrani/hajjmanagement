
@extends('layouts.manager')


@section('title','إعمال الميكانيكا')

@section('content')


<div class="card" style="  width: 500px; margin: 0 auto; padding-bottom: 20px;  align-items: center;  background-color: white;"
      >


  <div class="card-body">
    <h5 class="card-title" >اعمال الميكانيكا</h5>
  </div>

  
  <div class="mt-2">
            <div class="small text-muted">كود الخيمة: 7413</div>
            <hr>

            <div class="small text-muted">رقم الشاخص : 65865</div>

            </div>

  <br>
  <hr style=  "border: 6px solid black; width:100%" >

  <br>
<table class="table" style="align-content: center;  width:60%; font-family: Times New Roman, Times, serif;" >
  <thead >

    <tr >

      <th scope="col">البند</th>
      <th scope="col">المستهدف</th>
      <th scope="col">الفعلي</th>
      <th scope="col">الصور</th>
    </tr>
  </thead>
  <tbody>

    <tr>

      <td> <p style="width: 6em">توريد التكييف</p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>
     <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>
      <td>  <button  type="button" class="btn btn-primary"  style="width:4em" id="showAttachmentsButton" > عرض</button>  </td>

    </tr>

    <tr>
      <td> <p style="width: 6em"> توزيع التكييف </p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>
      <td>  <button  type="button" class="btn btn-primary"  style="width:4em" id="showAttachmentsButton" > عرض</button>  </td>
    </tr>

    <tr>
      <td> <p style="width: 6em"> توصيل التكييف </p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>
      <td>  <button  type="button" class="btn btn-primary"  style="width:4em" id="showAttachmentsButton" > عرض</button>  </td>
    </tr>


  </tbody>
</table>

<div >

<button  onclick="alert('تم الارسال')" type="button"  style="width: 6em" class="btn btn-warning btn-sm" >يعتمد</button>
<button onclick="window.location.href='/manager/unaccredited'" style="width: 6em" class="btn btn-secondary btn-sm" >لا يعتمد</button>

</div>
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

@push('scripts')
<script>
const initial = {
  projectName: '58745',
};

document.addEventListener('DOMContentLoaded', function(){
  document.getElementById('project-name').innerText = initial.projectName;
  renderTeam();
});

</script>

@endpush

@endsection
