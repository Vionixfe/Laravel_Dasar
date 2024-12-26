@extends('layout.template')

@section('title', 'Doctor')

@push('meta-header')
    <meta name="author" content="Vana">
@endpush

@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Doctor</h1>
        </div>

        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a href="{{ url('doctor/create') }}" class="btn btn-primary">Create</a>

                <div class="row g-3 float-end">
                    <div class="col-auto">
                        <form  method="get" class="d-flex" action="{{ url('doctor') }}">
                      <input type="search" name="search"  placeholder="Name or Email" value="{{ request('search')}}" aria-label="Search" required>
                      <button type="submit" class="btn btn-info">Search</button>
                        </form>
                    </div>
                  </div>
            </div>
          </nav>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error : {{ session ('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive small">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ ($doctors->currentPage()-1) * $doctors->perPage() + $loop->iteration }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>
                                <a href="{{ url('doctor/' . $doctor->uuid) }}" class="btn btn-primary btn-sm">Detail</a>
                                <a href="{{ url('doctor/' . $doctor->uuid . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ url('doctor/' . $doctor->uuid) }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $doctors->links() }}
        </div>
    </main>
@endsection
