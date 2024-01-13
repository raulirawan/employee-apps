@extends('layouts.app')

@section('title', 'Halaman Create Data Pegawai')

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

                <div class="card-header">Create Data Pegawai</div>
                <div class="card-body">
                    <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Posisi Yang Di Lamar</label>
                                    <input type="text" class="form-control" value="{{ old('posisi_lamar') }}"
                                        name="posisi_lamar" placeholder="Masukan Posisi Yang Di Lamar" required>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Nama</label>
                                    <input type="text" class="form-control" value="{{ old('nama') }}" name="nama"
                                        placeholder="Masukan Nama Pegawai" required>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">No. KTP</label>
                                    <input type="number" class="form-control" value="{{ old('no_ktp') }}" name="no_ktp"
                                        placeholder="Masukan No KTP" required>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Tempat, Tanggal Lahir</label>
                                    <input type="text" class="form-control" value="{{ old('ttl') }}" name="ttl"
                                        placeholder="Masukan No Tempat, Tanggal Lahir" required>
                                </div>

                                <div class="form-group">
                                    <label for="helpInputTop">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="LAKI-LAKI" {{ old('status') == 'LAKI-LAKI' ? 'selected' : '' }}>
                                            LAKI-LAKI</option>
                                        <option value="PEREMPUAN" {{ old('status') == 'PEREMPUAN' ? 'selected' : '' }}>
                                            PEREMPUAN
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Agama</label>
                                    <select name="agama" id="agama" class="form-control" required>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ old('status') == 'Islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ old('status') == 'Kristen' ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="Katolik" {{ old('status') == 'Katolik' ? 'selected' : '' }}>Katolik
                                        </option>
                                        <option value="Budha" {{ old('status') == 'Budha' ? 'selected' : '' }}>Budha
                                        </option>
                                        <option value="Hindu" {{ old('status') == 'Hindu' ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="Konghuchu" {{ old('status') == 'Konghuchu' ? 'selected' : '' }}>
                                            Konghuchu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Golongan Darah</label>
                                    <input type="text" class="form-control" value="{{ old('golongan_darah') }}"
                                        name="golongan_darah" placeholder="Masukan Golongan Darah" required>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Status Perkawinan</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="">Pilih Status Perkawinan</option>
                                        <option value="Belum Menikah"
                                            {{ old('status') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                        <option value="Menikah" {{ old('status') == 'Menikah' ? 'selected' : '' }}>Menikah
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Alamat KTP</label>
                                    <textarea name="alamat_ktp" class="form-control" id="alamat_ktp" cols="30" rows="2"
                                        placeholder="Masukan Alamat KTP">{{ old('alamat_ktp') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Alamat Tinggal</label>
                                    <textarea name="alamat_tinggal" class="form-control" id="alamat_tinggal" cols="30" rows="2"
                                        placeholder="Masukan Alamat Tempat Tinggal">{{ old('alamat_tinggal') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Email</label>
                                    <input type="text" class="form-control" value="{{ old('email') }}"
                                        name="email" placeholder="Masukan Email" required>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">No. Telp</label>
                                    <input type="number" class="form-control" value="{{ old('no_telp') }}"
                                        name="no_telp" placeholder="Masukan No Telp" required>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Orang Terdekat Yang Dapat Di Hubungi</label>
                                    <input type="text" class="form-control" value="{{ old('orang_terdekat') }}"
                                        name="orang_terdekat" placeholder="Masukan Orang Terdekat Yang Dapat Di Hubungi"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Pendidikan Terakhir : </label>
                                    <span id="row-item-pendidikan">
                                        <div class="row mb-4">
                                            <div class="col-md-2">
                                                <label for="">Jenjang</label>
                                                <input type="text" name="jenjang[]" class="form-control"
                                                    placeholder="Jenjang" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Nama Institusi Akademik</label>
                                                <input type="text" name="institusi[]" class="form-control"
                                                    placeholder="Institusi" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Jurusan</label>
                                                <input type="text" name="jurusan[]" class="form-control"
                                                    placeholder="Jurusan" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Tahun Lulus</label>
                                                <input type="text" name="tahun_lulus[]" class="form-control"
                                                    placeholder="Tahun Lulus" required>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="">IPK</label>
                                                <input type="text" name="ipk[]" class="form-control"
                                                    placeholder="IPK" required>
                                            </div>
                                            <div class="col-md-1">
                                                <label for=""></label>
                                                <button class="btn btn-sm btn-success mt-4"
                                                    id="add-item-pendidikan">(+)</button>
                                            </div>
                                        </div>
                                    </span>

                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Riwayat Pelatihan : </label>
                                    <span id="row-item-pelatihan">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <label for="">Nama Kursus / Seminar</label>
                                                <input type="text" name="nama_kursus[]" class="form-control"
                                                    placeholder="Nama Kursus / Seminar">
                                            </div>
                                            <div class="col">
                                                <label for="">Sertifikat (ada/tidak)</label>
                                                <input type="text" name="sertifikat[]" class="form-control"
                                                    placeholder="Sertifikat (ada/tidak)">
                                            </div>
                                            <div class="col">
                                                <label for="">Tahun</label>
                                                <input type="text" name="tahun_pelatihan[]" class="form-control"
                                                    placeholder="Tahun">
                                            </div>
                                            <div class="col-md-1">
                                                <label for=""></label>
                                                <button class="btn btn-sm btn-success mt-4"
                                                    id="add-item-pelatihan">(+)</button>
                                            </div>
                                        </div>
                                    </span>

                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Riwayat Pekerjaan : </label>
                                    <span id="row-item-pekerjaan">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <label for="">Nama Perusahaan</label>
                                                <input type="text" name="nama_perusahaan[]" class="form-control"
                                                    placeholder="Nama Perusahaan">
                                            </div>
                                            <div class="col">
                                                <label for="">Posisi Terakhir</label>
                                                <input type="text" name="posisi_terakhir[]" class="form-control"
                                                    placeholder="Posisi Terakhir">
                                            </div>
                                            <div class="col">
                                                <label for="">Pendapatan Terakhir</label>
                                                <input type="text" name="pendapatan_terakhir[]" class="form-control"
                                                    placeholder="Pendapatan Terakhir">
                                            </div>
                                            <div class="col">
                                                <label for="">Tahun</label>
                                                <input type="text" name="tahun_pekerjaan[]" class="form-control"
                                                    placeholder="Tahun">
                                            </div>
                                            <div class="col-md-1">
                                                <label for=""></label>
                                                <button class="btn btn-sm btn-success mt-4"
                                                    id="add-item-pekerjaan">(+)</button>
                                            </div>
                                        </div>
                                    </span>

                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Skill</label>
                                    <textarea name="skill" class="form-control" id="skill" cols="30" rows="2"
                                        placeholder="Masukan Skill">{{ old('skill') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Bersedia Di Tempatkan Di Seluruh Kantor Perusahaan</label>
                                    <select name="penempatan_luar_kantor" id="penempatan_luar_kantor"
                                        class="form-control" required>
                                        <option value="">Pilih</option>
                                        <option value="1"
                                            {{ old('penempatan_luar_kantor') == '1' ? 'selected' : '' }}>Ya</option>
                                        <option value="0"
                                            {{ old('penempatan_luar_kantor') == '0' ? 'selected' : '' }}>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Penghasilan Yagn Di Harapkan / Bulan</label>
                                    <input type="number" class="form-control" value="{{ old('penghasilan') }}"
                                        name="penghasilan" placeholder="Penghasilan Yang Di Harapkan / Bulan" required>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <a href="{{ route('pegawai.index') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
    @push('down-script')
        <script>
            $(document).ready(function() {

                // pendndikan
                $("#add-item-pendidikan").click(function(e) {
                    e.preventDefault();
                    var html = `


                    <div class="row mb-4">
                        <div class="col-md-2">
                            <label for="">Jenjang</label>
                            <input type="text" name="jenjang[]" class="form-control"
                                placeholder="Jenjang" required>
                        </div>
                        <div class="col-md-3">
                            <label for="">Nama Institusi Akademik</label>
                            <input type="text" name="institusi[]" class="form-control"
                                placeholder="Institusi" required>
                        </div>
                        <div class="col-md-3">
                            <label for="">Jurusan</label>
                            <input type="text" name="jurusan[]" class="form-control"
                                placeholder="Jurusan" required>
                        </div>
                        <div class="col-md-2">
                            <label for="">Tahun Lulus</label>
                            <input type="text" name="tahun_lulus[]" class="form-control"
                                placeholder="Tahun Lulus" required>
                        </div>
                        <div class="col-md-1">
                            <label for="">IPK</label>
                            <input type="text" name="ipk[]" class="form-control"
                                placeholder="IPK" required>
                        </div>
                        <div class="col-md-1">
                            <label for=""></label>
                            <button class="btn btn-sm btn-danger delete-row-pendidikan mt-4">(-)</button>
                        </div>
                    </div>
                `;

                    $("#row-item-pendidikan").append(html);
                });

                // pelatihan
                $("#add-item-pelatihan").click(function(e) {
                    e.preventDefault();
                    var html = `
                    <div class="row mb-4">
                        <div class="col">
                            <label for="">Nama Kursus / Seminar</label>
                            <input type="text" name="nama_kursus[]" class="form-control"
                                placeholder="Jenjang">
                        </div>
                        <div class="col">
                            <label for="">Sertifikat (ada/tidak)</label>
                            <input type="text" name="sertifikat[]" class="form-control"
                                placeholder="Institusi">
                        </div>
                        <div class="col">
                            <label for="">Tahun</label>
                            <input type="text" name="Tahun[]" class="form-control"
                                placeholder="Tahun">
                        </div>
                        <div class="col-md-1">
                            <label for=""></label>
                            <button class="btn btn-sm btn-danger delete-row-pelatihan mt-4">(-)</button>
                        </div>
                    </div>
                `;

                    $("#row-item-pelatihan").append(html);
                });

                // pekerjaan
                $("#add-item-pekerjaan").click(function(e) {
                    e.preventDefault();
                    var html = `
                    <div class="row mb-4">
                        <div class="col">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan[]" class="form-control"
                                placeholder="Nama Perusahaan">
                        </div>
                        <div class="col">
                            <label for="">Posisi Terakhir</label>
                            <input type="text" name="posisi_terakhir[]" class="form-control"
                                placeholder="Posisi Terakhir">
                        </div>
                        <div class="col">
                            <label for="">Pendapatan Terakhir</label>
                            <input type="text" name="pendapatan_terakhir[]" class="form-control"
                                placeholder="Pendapatan Terakhir">
                        </div>
                        <div class="col">
                            <label for="">Tahun</label>
                            <input type="text" name="tahun[]" class="form-control"
                                placeholder="Tahun">
                        </div>
                        <div class="col-md-1">
                            <label for=""></label>
                            <button class="btn btn-sm btn-danger delete-row-pekerjaan mt-4">(-)</button>
                        </div>
                    </div>
                `;

                    $("#row-item-pekerjaan").append(html);
                });


                $(document).on('click', '.delete-row-pendidikan', function() {
                    $(this).parent().parent().remove();
                });

                $(document).on('click', '.delete-row-pelatihan', function() {
                    $(this).parent().parent().remove();
                });

                $(document).on('click', '.delete-row-pekerjaan', function() {
                    $(this).parent().parent().remove();
                });

            });
        </script>
    @endpush
@endsection
