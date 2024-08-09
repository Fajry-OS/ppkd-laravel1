@extends('layout_2.app')
@section('content')
    <div class="card">
        <div class="card-header">Profiles</div>
        <div class="card-body">
            <a href="{{ route('profile.create') }}" class="btn btn-primary btn-sm mb-2">ADD</a>
            <div class="table table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No.Telp</th>
                            <th>Gambar</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td></td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_telpon }}</td>
                                <td><img src="{{ asset('storage/image/' . $item->picture) }}" alt=""></td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('profile.edit', $item->id) }}"
                                        class="btn btn-success btn-sm mr-2">Edit</a>
                                    <form action="{{ route('profile.softdelete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
