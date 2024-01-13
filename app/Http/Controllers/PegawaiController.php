<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::whereNotNull('nama')->get();
        if(Auth::user()->roles == 'USER') {
            $pegawai = Pegawai::where('user_id', Auth::user()->id)->get();
        }
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $riwayatPendidikan = [];
        $riwayatPelatihan = [];
        $riwayatPekerjaan = [];
        if(!empty($data['jenjang'])) {
            foreach ($data['jenjang'] as $key => $value) {
                $riwayatPendidikan[] = [
                    'jenjang' => $data['jenjang'][$key],
                    'institusi' => $data['institusi'][$key],
                    'jurusan' => $data['jurusan'][$key],
                    'tahun_lulus' => $data['tahun_lulus'][$key],
                    'ipk' => $data['ipk'][$key],
                ];
            }
        }

        if(!empty($data['nama_kursus'])) {
            foreach ($data['nama_kursus'] as $key => $value) {
                $riwayatPelatihan[] = [
                    'nama_kursus' => $data['nama_kursus'][$key],
                    'sertifikat' => $data['sertifikat'][$key],
                    'tahun_pelatihan' => $data['tahun_pelatihan'][$key],
                ];
            }
        }

         if(!empty($data['nama_perusahaan'])) {
            foreach ($data['nama_perusahaan'] as $key => $value) {
                $riwayatPekerjaan[] = [
                    'nama_perusahaan' => $data['nama_perusahaan'][$key],
                    'posisi_terakhir' => $data['posisi_terakhir'][$key],
                    'pendapatan_terakhir' => $data['pendapatan_terakhir'][$key],
                    'tahun_pekerjaan' => $data['tahun_pekerjaan'][$key],
                ];
            }
        }

        $data['riwayat_pendidikan'] = json_encode($riwayatPendidikan);
        $data['riwayat_pelatihan'] = json_encode($riwayatPelatihan);
        $data['riwayat_pekerjaan'] = json_encode($riwayatPekerjaan);

        if(Pegawai::create($data)) {
            Alert::success("Success","Data Berhasil Di Simpan");
            return redirect()->route('pegawai.index');
        }
        Alert::error("Error","Data Gagal Di Simpan");
        return redirect()->route('pegawai.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $data = $request->all();
        $riwayatPendidikan = [];
        $riwayatPelatihan = [];
        $riwayatPekerjaan = [];
        if(!empty($data['jenjang'])) {
            foreach ($data['jenjang'] as $key => $value) {
                $riwayatPendidikan[] = [
                    'jenjang' => $data['jenjang'][$key],
                    'institusi' => $data['institusi'][$key],
                    'jurusan' => $data['jurusan'][$key],
                    'tahun_lulus' => $data['tahun_lulus'][$key],
                    'ipk' => $data['ipk'][$key],
                ];
            }
        }

        if(!empty($data['nama_kursus'])) {
            foreach ($data['nama_kursus'] as $key => $value) {
                $riwayatPelatihan[] = [
                    'nama_kursus' => $data['nama_kursus'][$key],
                    'sertifikat' => $data['sertifikat'][$key],
                    'tahun_pelatihan' => $data['tahun_pelatihan'][$key],
                ];
            }
        }

         if(!empty($data['nama_perusahaan'])) {
            foreach ($data['nama_perusahaan'] as $key => $value) {
                $riwayatPekerjaan[] = [
                    'nama_perusahaan' => $data['nama_perusahaan'][$key],
                    'posisi_terakhir' => $data['posisi_terakhir'][$key],
                    'pendapatan_terakhir' => $data['pendapatan_terakhir'][$key],
                    'tahun_pekerjaan' => $data['tahun_pekerjaan'][$key],
                ];
            }
        }

        $data['riwayat_pendidikan'] = json_encode($riwayatPendidikan);
        $data['riwayat_pelatihan'] = json_encode($riwayatPelatihan);
        $data['riwayat_pekerjaan'] = json_encode($riwayatPekerjaan);

        if($pegawai->update($data)) {
            Alert::success("Success","Data Berhasil Di Update");
            return redirect()->route('pegawai.index');
        }
        Alert::error("Error","Data Gagal Di Update");
        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        if($pegawai->delete()){
            Alert::success("Success","Data Berhasil Di Hapus");
            return redirect()->route('pegawai.index');
        }
        Alert::error("Error","Data Gagal Di Hapus");
        return redirect()->route('pegawai.index');
    }

    public function setStatus(Pegawai $pegawai)
    {
        $user = User::where('id', $pegawai->user_id)->firstOrFail();
        $data = [
            'is_active' => $user->is_active == '1' ? '0' : '1',
        ];
        if($user->update($data)) {
            Alert::success("Success","Data Berhasil Di Update");
            return redirect()->route('pegawai.index');
        }
        Alert::error("Error","Data Gagal Di Update");
        return redirect()->route('pegawai.index');
    }
}
