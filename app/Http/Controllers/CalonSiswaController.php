<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->level == '0') {
            $ub = Siswa::with('user')->get();
            $datas = Siswa::all();
            return view('admin.calonsiswa.index',['datas'=>$datas,'ub'=>$ub]);
        }
        $user = Auth::user();
        $datas = Siswa::all()->where('user_id',Auth::user()->id);
        return view('siswa.daftar.formulir.index',['user' =>$user,'datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if(Auth::user()->level == '1'){
        $a = Auth::user()->id;
        $b = Siswa::where('user_id', $a)->first();
        if($b == null){
            $user = Auth::user();
            return view('siswa.daftar.formulir.create',['user' =>$user]);
        }
        Alert::info('Oopss..', 'Anda Sudah Mengisi Formulir');
        return redirect()->to('/daftar');
        }
        if(Auth::user()->level == '0') {
            $datas = User::all()->where('level','1')
            ->where('verif_daftar','1')
            ->where('data_diri',null);
            return view('admin.calonsiswa.create',['datas'=>$datas]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->level == '1'){
            $this->validate($request, [
                'user_id',
                'jk',
                'email',
                'no_telp'=>'required|string|max:13',
                'foto' => 'required|file',
                'tgl_lahir',
                'alamat'=>'required|string|max:255',
                'asal_sekolah'=>'required|string|max:100',
                'add_ijazah' => 'required|file',
                'status_ayah',
                'nama_ayah'=>'required|string|max:255',
                'nik_ayah'=>'required|string|max:15',
                'pekerjaan_ayah',
                'gaji_ayah'=>'required|integer|max:1000000000',
                'status_ibu',
                'nama_ibu',
                'nik_ibu',
                'pekerjaan_ibu',
                'gaji_ibu'=>'required|integer|max:1000000000',
            ]);

            if($request->file('foto') == '') {
                $foto = NULL;
            } else {
                $file1 = $request->file('foto');
                $dt = Carbon::now();
                $acak1  = $file1->getClientOriginalExtension();
                $fileName1 = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak1;
                $request->file('foto')->move("images/foto_siswa", $fileName1);
                $foto = $fileName1;
            }
            if($request->file('add_ijazah') == '') {
                $foto2 = NULL;
            } else {
                $file2 = $request->file('add_ijazah');
                $dt = Carbon::now();
                $acak2  = $file2->getClientOriginalExtension();
                $filename2 = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak2;
                $request->file('add_ijazah')->move("images/ijazah_siswa", $filename2);
                $foto2 = $filename2;
            }

            // $a = Auth::user()->id;
            Siswa::create([
                'user_id' => $request->input('user_id'),
                'nisn'=> $request->input('nisn'),
                // 'nama'=> $request->input('nama'),
                'jk'=> $request->input('jk'),
                'email'=> $request->input('email'),
                'no_telp'=> $request->input('no_telp'),
                'foto' => $foto,
                'tgl_lahir'=> $request->input('tgl_lahir'),
                'alamat'=> $request->input('alamat'),
                'asal_sekolah'=> $request->input('asal_sekolah'),
                'add_ijazah' => $foto2,
                'status_ayah'=> $request->input('status_ayah'),
                'nama_ayah'=> $request->input('nama_ayah'),
                'nik_ayah'=> $request->input('nik_ayah'),
                'pekerjaan_ayah'=> $request->input('pekerjaan_ayah'),
                'gaji_ayah'=> $request->input('gaji_ayah'),
                'status_ibu'=> $request->input('status_ibu'),
                'nama_ibu'=> $request->input('nama_ibu'),
                'nik_ibu'=> $request->input('nik_ibu'),
                'pekerjaan_ibu'=> $request->input('pekerjaan_ibu'),
                'gaji_ibu'=> $request->input('gaji_ibu'),
            ]);

            $a = Auth::user()->id;
            $data_diri = User::find($a);

            $data_diri->update([
                     'data_diri' => '0',
                     ]);

            alert()->success('Berhasil.','Data Telah Ter-Simpan');
            return redirect()->route('formulir.index');
        }
        if(Auth::user()->level == '0'){
            //Admin
            $this->validate($request, [
                'user_id'=>'required',
                'nisn',
                'jk',
                'email',
                'no_telp'=>'required|string|max:13',
                'foto' => 'required|file',
                'tgl_lahir',
                'tempat_lahir',
                'alamat'=>'required|string|max:255',
                'asal_sekolah'=>'required|string|max:100',
                'add_ijazah' => 'required|file',
                'status_ayah',
                'nama_ayah'=>'required|string|max:255',
                'nik_ayah'=>'required|string|max:15',
                'pekerjaan_ayah',
                'gaji_ayah'=>'required|integer|max:1000000000',
                'status_ibu',
                'nama_ibu',
                'nik_ibu',
                'pekerjaan_ibu',
                'gaji_ibu'=>'required|integer|max:1000000000',
            ]);

            if($request->file('foto') == '') {
                $foto = NULL;
            } else {
                $file1 = $request->file('foto');
                $dt = Carbon::now();
                $acak1  = $file1->getClientOriginalExtension();
                $fileName1 = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak1;
                $request->file('foto')->move("images/foto_siswa", $fileName1);
                $foto = $fileName1;
            }
            if($request->file('add_ijazah') == '') {
                $foto2 = NULL;
            } else {
                $file2 = $request->file('add_ijazah');
                $dt = Carbon::now();
                $acak2  = $file2->getClientOriginalExtension();
                $filename2 = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak2;
                $request->file('add_ijazah')->move("images/ijazah_siswa", $filename2);
                $foto2 = $filename2;
            }

            Siswa::create([
                'user_id' => $request->input('user_id'),
                'jk'=> $request->input('jk'),
                'no_telp'=> $request->input('no_telp'),
                'foto' => $foto,
                'tgl_lahir'=> $request->input('tgl_lahir'),
                'tempat_lahir'=> $request->input('tgl_lahir'),
                'alamat'=> $request->input('alamat'),
                'asal_sekolah'=> $request->input('asal_sekolah'),
                'add_ijazah' => $foto2,
                'status_ayah'=> $request->input('status_ayah'),
                'nama_ayah'=> $request->input('nama_ayah'),
                'nik_ayah'=> $request->input('nik_ayah'),
                'pekerjaan_ayah'=> $request->input('pekerjaan_ayah'),
                'gaji_ayah'=> $request->input('gaji_ayah'),
                'status_ibu'=> $request->input('status_ibu'),
                'nama_ibu'=> $request->input('nama_ibu'),
                'nik_ibu'=> $request->input('nik_ibu'),
                'pekerjaan_ibu'=> $request->input('pekerjaan_ibu'),
                'gaji_ibu'=> $request->input('gaji_ibu'),
            ]);

            $user_id = $request->input('user_id');
            User::find($user_id)->update([
                'data_diri' => '1'
                ]);
            alert()->success('Berhasil.','Data telah ditambahkan');
            return redirect()->route('formulir.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->level == '1') {
            $data = Siswa::findOrFail($id);
            return view('siswa.daftar.formulir.show', compact('data'));
        }
        $user = Siswa::with('user')->get();
        $data = Siswa::findOrFail($id);
        return view('admin.calonsiswa.show', ['data'=>$data,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->level == '1') {
            $data = Biaya::findOrFail($id);
            return view('siswa.daftar.biaya.show', compact('data'));
        }
        $user = Siswa::with('user')->get();
        $data = Siswa::findOrFail($id);
        return view('admin.calonsiswa.edit', ['data'=>$data,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->file('foto')) {
            $file1 = $request->file('foto');
            $dt1 = Carbon::now();
            $acak1  = $file1->getClientOriginalExtension();
            $fileName1 = rand(11111,99999).'-'.$dt1->format('Y-m-d-H-i-s').'.'.$acak1;
            $request->file('foto')->move("images/foto_siswa", $fileName1);
            $foto1 = $fileName1;
        } else {
            $data = Siswa::findOrFail($id);
            $awal = $data->foto;
            $foto1 = $awal;
        }
        if($request->file('add_ijazah')) {
            $file2 = $request->file('add_ijazah');
            $dt2 = Carbon::now();
            $acak2  = $file2->getClientOriginalExtension();
            $fileName2 = rand(11111,99999).'-'.$dt2->format('Y-m-d-H-i-s').'.'.$acak2;
            $request->file('add_ijazah')->move("images/ijazah_siswa", $fileName2);
            $foto2 = $fileName2;
        } else {
            $data = Siswa::findOrFail($id);
            $awal = $data->foto;
            $foto2 = $awal;
        }

        Siswa::find($id)->update([

            'jk' => $request->get('jk'),
            'email'=> $request->get('email'),
            'no_telp'=> $request->get('no_telp'),
            'foto' => $foto1,
            'tgl_lahir'=> $request->get('tgl_lahir'),
            'tempat_lahir'=> $request->get('tgl_lahir'),
            'alamat'=> $request->get('alamat'),
            'asal_sekolah'=> $request->get('asal_sekolah'),
            'add_ijazah' => $foto2,
            'status_ayah'=> $request->get('status_ayah'),
            'nama_ayah'=> $request->get('nama_ayah'),
            'nik_ayah'=> $request->get('nik_ayah'),
            'pekerjaan_ayah'=> $request->get('pekerjaan_ayah'),
            'gaji_ayah'=> $request->get('gaji_ayah'),
            'status_ibu'=> $request->get('status_ibu'),
            'nama_ibu'=> $request->get('nama_ibu'),
            'nik_ibu'=> $request->get('nik_ibu'),
            'pekerjaan_ibu'=> $request->get('pekerjaan_ibu'),
            'gaji_ibu'=> $request->get('gaji_ibu'),
            'konfirmasi'=> $request->get('konfirmasi'),
        ]);

        Siswa::find($id)->update([
            'konfirmasi' => 'sudah'
            ]);

        User::find($id)->update([
            'verif_daftar' => '1',
                'data_diri' => '1'
                ]);
        alert()->success('Berhasil.','Data telah dirubah');
        return redirect()->route('formulir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->update([
                'verif_daftar' => null
        ]);
        Siswa::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('formulir.index');
    }

    // public function konfirmasi($id){
    //     $user = User::find($id);
    //     $user->update([
    //             'data_diri' => '1'
    //     ]);
    //     alert()->success('Berhasil.','Data telah terkonfimasi!');
    //     return redirect()->route('formulir.index');
    // }

}
