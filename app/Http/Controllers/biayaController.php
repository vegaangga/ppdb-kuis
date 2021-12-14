<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == '0') {
            $ub = Biaya::with('user')->get();
            $datas = Biaya::all();
            return view('admin.biaya_daftar.index',['datas'=>$datas,'ub'=>$ub]);
        }
        // if(Auth::user()->level == '1') {
        //     // Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     // $user = Auth::user();
        //     // return view('siswa.profile',['user' =>$user]);

        //     $user = Auth::user();
        //     $datas = Biaya::where('user_id', Auth::user()->id);
        //     $ub = Biaya::with('user')->get();
        //     //$datas = Biaya::all();
        //     return view('siswa.biaya.index',['user' =>$user,'datas'=>$datas,'ub'=>$ub]);
        //     //return view('siswa.biaya.index',['user' =>$user,'datas'=>$datas]);
        // }

        if(Auth::user()->level == '1')
        {
            //$datas = DB::table('biaya_daftar')->where('user_id', '8')->first();
            //$datas = Biaya::where('id','8');
            $datas = Biaya::all()->where('user_id',Auth::user()->id);
            //$user = DB::table('biaya_daftar')->find(3);
            //$datas = Biaya::find('8');
            return view('siswa.daftar.biaya.index',compact('datas'));
            //return view('Admin.Transaksi.tb-transaksi', compact('datas'));
        }

        // return view('siswa.step',['user' =>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == '1'){
            $a = Auth::user()->id;
        $b = Biaya::where('user_id', $a)->first();
        if($b == null){
            $user = Auth::user();
            return view('siswa.daftar.biaya.create',['user' =>$user]);
        }
        Alert::info('Oopss..', 'Anda Sudah Mengisi Formulir');
        return redirect()->to('/daftar');
        }
        $datas = User::all()->where('level','1')
        ->where('verif_daftar',null);

        return view('admin.biaya_daftar.create',compact('datas'));

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
            'struk' => 'required|file',
        ]);

        if($request->file('struk') == '') {
            $struk = NULL;
        } else {
            $file = $request->file('struk');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('struk')->move("images/bd", $fileName);
            $struk = $fileName;
        }
        // $a = Auth::user()->id;
        Biaya::create([
            'user_id' => $request->input('user_id'),
            'struk' => $struk,
            'status' => 'belum'
        ]);

        $a = Auth::user()->id;
        $biaya = User::find($a);

        $biaya->update([
                 'verif_daftar' => '0',
                 ]);

            alert()->success('Berhasil.','Struk Telah Ter-Upload');
        return redirect()->route('biaya.index');
        }
        //Admin
        $this->validate($request, [
            'user_id',
            'struk' => 'required|file',
        ]);

        if($request->file('struk') == '') {
            $struk = NULL;
        } else {
            $file = $request->file('struk');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('struk')->move("images/bd", $fileName);
            $struk = $fileName;
        }
        // $a = Auth::user()->id;

        Biaya::create([
            'user_id' => $request->input('user_id'),
            'struk' => $struk,
            'status' => 'belum'
        ]);

        $user_id = $request->input('user_id');
        User::find($user_id)->update([
            'verif_daftar' => '0'
            ]);
        alert()->success('Berhasil.','Data telah ditambahkan');
        return redirect()->route('biaya.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->level == '1') {
            $data = Biaya::findOrFail($id);
            return view('siswa.daftar.biaya.show', compact('data'));
        }

        $data = Biaya::findOrFail($id);
        return view('admin.biaya_daftar.show', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $biaya = Biaya::find($user_id);
        $biaya->update([
                'status' => 'sudah'
                ]);

        $user = User::find($user_id);
        $user->update([
                'verif_daftar' => '1'
        ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('biaya.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Biaya::find($id)->delete();
        $user = User::find($id);
        $user->update([
                'verif_daftar' => null
        ]);
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('biaya.index');
    }
}
