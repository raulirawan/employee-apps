@extends('layouts.app')

@section('title', 'Halaman Data Pegawai')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Pegawai</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Pegawai
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">

                <div class="card-header">Tabel Pegawai</div>
                <div class="card-body">
                    @if (Auth::user()->roles=='ADMIN')
                    <a href="{{ route('pegawai.create') }}" class="btn btn-success mb-3">
                        Tambah Pegawai
                    </a>
                    @endif

                    <!--Basic Modal -->

                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th style="width: 25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama ?? '-' }}</td>
                                        <td>{{ $item->ttl ?? '-' }}</td>
                                        <td>{{ $item->posisi_lamar ?? '-' }}</td>
                                        <td>
                                            @if ($item->user)
                                            @if ($item->user->is_active == '1')
                                            <span class="badge bg-success">Aktif</span>
                                            @else
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                            @endif
                                            @else
                                            <span class="badge bg-danger">No User</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (Auth::user()->roles == 'ADMIN')
                                                @if (!empty($item->user))
                                                    @if ($item->user->is_active == '1')
                                                        <a href="{{ route('pegawai.setStatus', $item->id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            style="float: left; margin-right: 10px">Non Aktif</a>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('pegawai.setStatus', $item->id) }}"
                                                            class="btn btn-success btn-sm"
                                                            style="float: left; margin-right: 10px">Active</a>
                                                        </a>
                                                    @endif
                                                @endif
                                                <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-info btn-sm"
                                                    style="float: left; margin-right: 10px">Edit</a>
                                                </a>
                                                <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ?')">Delete</button>
                                                </form>
                                            @else
                                                <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-info btn-sm"
                                                    style="float: left; margin-right: 10px">Update Profile</a>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>

    @push('down-style')
        <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/fontawesome.css" />
        <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/datatables.css" />
    @endpush
    @push('down-script')
        <script src="{{ asset('assets') }}/js/extensions/datatables.js"></script>
    @endpush

@endsection
