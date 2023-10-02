{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.app')

@section('titletab')
    Dashboard
@endsection

@section('pageName')
    Dashboard
@endsection

@section('title')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    Entry Data
                </button>
            </div>
        </div>
        {{-- <div class="card-body table-responsive p-0"> --}}
        <div class="card-body">
          <table id="example1" class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>name</th>
                <th>price</th>
                <th>foto</th>
                <th>deskripsi</th>
              </tr>
            </thead>
            <tbody>
               @foreach ($product as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->price }}</td>
                            <td><img src="{{ $data->foto }}" height="auto" width="100" alt="product"></td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modal-edit-{{ $data->id }}">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <form action="{{ route('dashboard.destroy', $data->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                @endforeach
          </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- Create Modal -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Form fields go here -->
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Barang</label>
                        <input type="text" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto barang - dalam bentuk link</label>
                        <input type="text" name="foto" id="foto" class="form-control" required>
                    </div>
                    <div class="form-group d-flex flex-row">
                        <label for="deskripsi">Deskripsi Barang</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="ml-3"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($product as $data)
<!-- Edit Modal for each data -->
<div class="modal fade" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Form fields go here -->
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Barang</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ $data->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto barang - dalam bentuk link</label>
                        <input type="text" name="foto" id="foto" class="form-control" value="{{ $data->foto }}" required>
                    </div>
                    <div class="form-group d-flex flex-row">
                        <label for="deskripsi">Nama Barang</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="ml-3">{{ $data->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
