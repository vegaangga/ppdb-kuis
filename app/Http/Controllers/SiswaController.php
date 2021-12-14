<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Dau;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
class SiswaController extends Controller
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
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $user = Auth::user();
        return view('siswa.index',['user' =>$user]);
        // return view('siswa.step',['user' =>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a = Auth::user()->nisn;
        $b = Siswa::where('nisn', $a)->first();
        if($b == null){
            $user = Auth::user();
            return view('siswa.create',['user' =>$user]);
        }
        Alert::info('Oopss..', 'Anda Sudah Mengisi Formulir');
        return redirect()->to('/home');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn'=>'required',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'no_handphone'=>'required',
            'email'=>'required',
            'tgl_lahir'=>'required'
            ]);
            //fungsieloquentuntukmenambahdata
            Siswa::create($request->all());
            //jikadataberhasilditambahkan,akankembalikehalamanutama
            //return redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil Ditambahkan');

            return redirect()->route('siswa.formulir')
            ->with('success','Data Berhasil Dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nisn)
    {
        $siswa = Siswa::where('nisn', $nisn)->first();
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.ubah', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nisn)
    {
        $request->validate([
            'nama'=>'required',
            'tgl_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'no_handphone'=>'required'
            ]);

        //fungsieloquentuntukmenambahdata
        Siswa::find($nisn)->update($request->all());
        //jikadataberhasilditambahkan,akankembalikehalamanutama
        $siswa = Siswa::where('nisn', $nisn)->first();
        // return view('siswa.show', compact('siswa'));
        // return redirect()->route('siswa.show', compact('siswa'))->with('success','Siswa Berhasil Diupdate');
        return redirect('siswa/'.$nisn,)->with('success','Data Berhasil Diupdate');

        // return redirect('siswa/'.$nisn)->with();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $user = Auth::user();
        return view('siswa.profile',['user' =>$user]);
    }

    // public function formulir()
    // {
    //     $user = Auth::user();
    //     return view('siswa.create',['user' =>$user]);
    // }

    // public function cetak($nisn){
    //     $siswa = Siswa::where('nisn', $nisn)->first();
    //     return view('siswa.cetak_pdf',compact('posts'))->with('i',(request()->input('posts',1)-1)*5);
    // }

    // public function cetak($nisn)
    // {
    //     $siswa = Siswa::where('nisn', $nisn)->first();

    //     $pdf = PDF::loadView('siswa.cetak_pdf',['siswa'=>$siswa]);
    //     // return view('siswa.cetak_pdf', compact('siswa'));
    //     return $pdf->stream();
    // }

    // public function cetak_transaksi(){
    //     $posts = Siswa::all();

    //     $pdf = PDF::loadView('admin.laporan.transaksi_pdf',['posts'=>$posts]);

    //     return $pdf->stream();
    // }

    public function cetak($nisn){
        $siswa = Siswa::find($nisn);
        $pdf = PDF::loadview('siswa.cetak_pdf', compact('siswa'));
        return $pdf->stream();
        // return view('siswa.cetak_pdf', compact('siswa'));
    }

    public function daftar()
    {
        $biaya = Biaya::all()->where('user_id',Auth::user()->id);
        $dau = Dau::all()->where('user_id',Auth::user()->id);
        $siswa = Siswa::all()->where('user_id',Auth::user()->id);
        $user = Auth::user();
        return view('siswa.daftar.daftar',['user' =>$user,'biaya'=>$biaya,'siswa'=>$siswa,'dau'=>$dau]);
    }
}
