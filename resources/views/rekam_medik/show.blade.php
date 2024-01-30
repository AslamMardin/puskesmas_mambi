@extends('layouts.admin.main')

@section('title', $title)

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{route('admin.index')}}" class="btn btn-secondary btn-icon icon-left">Kembali</a>
    </div>
    <div class="card-body">
       
     
      <table class="table table-hover"  id="table-pasien">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
          
           
          </tr>
        </thead>
        <tbody>
            @foreach($rekamMedik as $rm)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rm->pasien->nama }}</td>
                <td>{{ $rm->pasien->jk }}</td>
                <td>{{ $rm->pasien->umur }}</td>
            </tr>
        @endforeach
        </tbody>
      </table>
      
    </div>
  </div>


  <div class="row mt-4">
    <div class="col-12 col-lg-8 offset-lg-2">
      <div class="wizard-steps">
        <div class="wizard-step wizard-step-active">
          <div class="wizard-step-icon">
            <i class="fas bi bi-person-standing"></i>
          </div>
          <div class="wizard-step-label">
            Laki-Laki
            <p>{{$result['jumlahLaki']}}</p>
          </div>
        </div>
        <div class="wizard-step wizard-step-active">
          <div class="wizard-step-icon">
            <i class="bi fas bi-person-standing-dress"></i>
          </div>
          <div class="wizard-step-label">
           Perempuan
           <p>{{$result['jumlahPerempuan']}}</p>
          </div>
        </div>
        <div class="wizard-step wizard-step-success">
          <div class="wizard-step-icon">
            <i class="fas bi bi-person-arms-up"></i>
          </div>
          <div class="wizard-step-label">
            Umur
            <p>{{$result['umur_minimum'] ." - ". $result['umur_maksimum']}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table-pasien').DataTable({
                "bInfo": false,
                "lengthMenu": [10, 25, 50],
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;",
                    }
                },
            });
        });

       
    </script>
@endpush
