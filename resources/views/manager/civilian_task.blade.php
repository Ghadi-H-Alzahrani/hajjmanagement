
@extends('layouts.manager')


@section('title','إلاعمال المدنية')

@section('content')


<div class="card" style="  width: 500px; margin: 0 auto; padding-bottom: 20px;  align-items: center;  background-color: white;"
      >


  <div class="card-body">
    <h5 class="card-title" >الاعمال المدنية</h5>
  </div>

  <div class="small text-muted">رقم الشاخص : 65865</div>

   <br>
<div>
<input type="text" id="myInput" placeholder="كود الخيمة">
<button onclick="window.location.href='/manager/tasks/civilian'" id="btn-add-member" class="btn btn-sm btn-outline-secondary" type="submit">اضف  </button>
</div>
  <hr style=  "border: 6px solid black; width:100%" >

  <br>



<table  class="table" style="align-content: center;  width:60%; font-family: Times New Roman, Times, serif;" >
  <thead >

    <tr >

      <th scope="col">البند</th>
      <th scope="col">المستهدف</th>
    </tr>
  </thead>
  <tbody>

    <tr>

      <td> <p style="width: 6em">التسوية</p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" value="Submit" ></td>

    </tr>

    <tr>
      <td> <p style="width: 6em"> هياكل الخيام</p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>

    </tr>

    <tr>
      <td> <p style="width: 6em"> طرابيل جانبية-جبس بورد</p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>

    </tr>

    <tr>
      <td> <p style="width: 6em"> طرابيل علوية </p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>

    </tr>

    <tr>
      <td> <p style="width: 6em"> قواعد شد</p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>

    </tr>

    <tr>
      <td> <p style="width: 6em"> شدادات </p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>

    </tr>

    
    <tr>
      <td> <p style="width: 6em"> أبواب الخيام </p></td>
      <td> <input id="field-tent-area" type="number" min="0" class="form-control required-field" style="width:4em" ></td>
    </tr>


  </tbody>
</table>

<div >
  <!-- Button trigger modal -->
<button style="width: 6em" class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
ارسال
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
لقد تم الارسال...
      </div>
      <div class="modal-footer">
        <button type="button" style="width: 6em" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

<button id="myForm" onclick="customReset()" type="submit" style="width: 6em" class="btn btn-secondary btn-sm" >تفريغ</button>
</button>
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

  function customReset() {
  // Option A: Use the built-in reset() method on the form element
  document.getElementById("myForm").reset();}

const initial = {
  projectName: '58745',
};

</script>

@endpush

@endsection
