<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Dau;
use App\Models\Siswa;
use App\Models\User;
use BiayaDaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
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
        if(Auth::user()->level == '1') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/login');
        }
        elseif(Auth::user()->level == '0')
        {
            $datas = User::where('level','!=', '0')
                    ->paginate(10);
            return view('auth.user', compact('datas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == '1') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/login');
        }
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->level == '0') {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'nisn' => 'required|string|max:20|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            User::create([
                'level' => $request->input('level'),
                'name' => $request->input('name'),
                'nisn' => $request->input('nisn'),
                'email' => $request->input('email'),
                'password' => bcrypt(($request->input('password'))),
            ]);

            Session::flash('message', 'Berhasil ditambahkan!');
            Session::flash('message_type', 'success');

            alert()->success('Berhasil.','Data telah ditambahkan!');
            return redirect()->route('user.index');
        }
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'nisn' => $request->input('nisn'),
            'email' => $request->input('email'),
            'password' => bcrypt(($request->input('password'))),
        ]);

        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('user.index');

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
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/login');
        }
        $data = User::findOrFail($id);
        return view('auth.show', compact('data'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::find($id)->delete();
        if(Auth::user()->id != $id) {
            User::find($id)->delete();
            // Biaya::find($id)->delete();
            // Siswa::find($id)->delete();
            
            Session::flash('message', 'Berhasil dihapus!');
            Session::flash('message_type', 'success');
        } else {
            Session::flash('message', 'Akun anda sendiri tidak bisa dihapus!');
            Session::flash('message_type', 'danger');
        }
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('user.index');
    }
}
