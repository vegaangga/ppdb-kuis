<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
    #table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
    #normal{
    border: 0 solid #dddddd;
    text-align: left;
    padding: 0;
    }

    #isi-table {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
	</style>
  <link rel="stylesheet" href="">
	<title>Laporan Data User</title>
</head>
<body>
<table style="width: 100%">
  <tr>
    {{-- <td><img src=" {{ asset('images/logo-smk.png') }}" style="width: 150px"></td> --}}
    <td>
      <center>
        <font size="4">PPDB</font><br>
        <font size="5"><b>SMAN 1 PURI MOJOKERTO</b></font><br>
        <font size="2"></font><br>
        <font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa Timur</i></font>
      </center>
    </td>
  </tr>
  <tr>
    <td colspan="2"><hr></td>
  </tr>
</table>
 <table id="table">
    <thead>
      <tr>
        <th colspan="7">Laporan Data User Aktif</th>
        <th></th>
      </tr>
      <tr>
        <th id="isi-table"> Name </th>
        <th id="isi-table"> NISN </th>
        <th id="isi-table"> Email </th>
        <th id="isi-table"> Level </th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <td id="isi-table">
          {{$data->name}}
        </td>
        <td id="isi-table">{{$data->nisn}}</td>
        <td id="isi-table">{{$data->email}}</td>
        <td id="isi-table">
          @if ($data->level == '0')
          <label class="badge badge-warning">Admin</label>
          @endif
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</body>
</html>
