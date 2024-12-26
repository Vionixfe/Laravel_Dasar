@extends('layout.template')

@section('title', 'Detail Doctor: '. $doctor->name)

@push('meta-header')
<meta name="author" content="Vana">
@endpush

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Doctor : {{ $doctor->name }}</h1>
    </div>

    <div class="table table-striped">
        <table class= "table table-bordered table-striped table-sm">

        <tr>
            <th>Name</th>
            <td>{{ $doctor->name }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $doctor->email }}</td>
        </tr>

        <tr>
            <th>Phone</th>
            <td>{{ $doctor->phone }}</td>
        </tr>

        <tr>
            <th>Gen</th>
            <td>
                @if ($doctor->gender == 'male')
                <span class="badge bg-primary">Male</span>
                @else
                <span class="badge bg-secondary">Female</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $doctor->created_at }}</td>
        </tr>

        <tr>
            <th>Updated At</th>
            <td>{{ $doctor->updated_at }}</td>
        </tr>
        </table>
<div class="float-end">
        <a href="{{ url('doctor')}}" class="btn btn-secondary">Back</a>
    </div>
</div>
  </main>
@endsection
