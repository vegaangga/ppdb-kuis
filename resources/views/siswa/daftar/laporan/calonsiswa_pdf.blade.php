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
    border: 0 solid;
    text-align: left;
    padding: 0;
    }

    #isi-table {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
	</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".btn1").click(function(){
        $(".btn1").hide();
      });
      $('.btn1').hide(function(){
           window.print();
           return false;
  });
    });
    </script>
	<title>Laporan Data</title>
</head>
<body>
<table style="width: 100%" >
  <tr>
    <td><img src=" {{ asset('homepage/img/logocastle.png') }}" style="width: 125px"></td>
    <td>
      <center>
        <font size="4">PPDB</font><br>
        <font size="5"><b>SMAN1 PURI MOJOKERTO</b></font><br>
        <font size="2"></font><br>
        <font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa Timur</i></font>
      </center>
    </td>
  </tr>
  <tr>
    <td colspan="2"><hr></td>
  </tr>
</table>

<table style="width:100%">
  @foreach ($datas as $datas)
  <tr>
    <th colspan="3">
      <h3>Data Pribadi</h3>
    </th>
  </tr>
  <tr>
    <th id="normal">NISN</th>
    <td>{{$datas->user->nisn}}</td>
    <td  rowspan="3" align="center" style="padding: right 0;"><img  src="{{ asset('homepage/img/logocastle.png') }}" style="width: 90px;"></td>
  </tr>
  <tr>
    <th  id="normal">Nama</th>
    <td>{{$datas->user->name}}</td>
  </tr>
  <tr>
    <th id="normal">Email</th>
    <td>{{$datas->user->email}}</td>
  </tr>
  <tr>
    <th id="normal">Jenis Kelamin</th>
    <td>{{$datas->jk}}</td>
  </tr>
  <tr>
    <th id="normal">No Handphone</th>
    <td>{{$datas->no_telp}}</td>
  </tr>
  <tr>
    <th id="normal">Tanggal Lahir</th>
    <td>{{$datas->tgl_lahir}}</td>
  </tr>
  <tr>
    <th id="normal">Tempat Lahir</th>
    <td>{{$datas->tempat_lahir}}</td>
  </tr>
  <tr>
    <th id="normal">Alamat</th>
    <td>{{$datas->alamat}}</td>
  </tr>
  <tr>
    <th id="normal">Asal Sekolah</th>
    <td>{{$datas->asal_sekolah}}</td>
  </tr>
  <th colspan="3">
    <h3>Data Orang tua</h3>
  </th>
  <tr>
    <th id="normal">Status Ayah</th>
    <td>{{$datas->status_ayah}}</td>
  </tr>
  <tr>
    <th id="normal">Nama Ayah</th>
    <td>{{$datas->nama_ayah}}</td>
  </tr>
  <tr>
    <th id="normal">Pekerjaan Ayah</th>
    <td>{{$datas->pekerjaan_ayah}}</td>
  </tr>
  <tr>
    <th id="normal">Gaji Ayah</th>
    <td>{{$datas->gaji_ayah}}</td>
  </tr>
  <tr>
    <th id="normal">Status Ibu</th>
    <td>{{$datas->status_ibu}}</td>
  </tr>
  <tr>
    <th id="normal">Nama Ibu</th>
    <td>{{$datas->nama_ibu}}</td>
  </tr>
  <tr>
    <th id="normal">Pekerjaan Ibu</th>
    <td>{{$datas->pekerjaan_ibu}}</td>
  </tr>
  <tr>
    <th id="normal">Gaji Ibu</th>
    <td>{{$datas->gaji_ibu}}</td>
  </tr>
  <tr>
  </tr>
  @endforeach
</table>
  <button class="btn1" onclick="window.print()">Print this page</button>
</body>
</html>
