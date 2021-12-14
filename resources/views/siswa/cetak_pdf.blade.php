
<!DOCTYPE html>
<html>
<head>
	<title>Formulir</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>

				<td><img src=" {{ asset('homepage/img/logo-puri.png') }}" width="90" height="90"></td>
				<td>
				<center>
					<font size="4">PERPUSTAKAAN</font><br>
					<font size="5"><b>SMK NEGERI 2 SUKOREJO </b></font><br>
					<font size="2"></font><br>
					<font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa Timur</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>

		</table>
    </center>
		<table style="width:100%">
      <tr>
      </tr>
      <tr>

        <th>NISN</th>
        <td>{{$siswa->nisn}}</td>
        <td  rowspan="9" align="center" style="padding: right 0;"><img src="{{asset('homepage/img/castle.jpg')}}" style="width: 90px;"></td>
      </tr>
      <tr>
        <th>Nama</th>
        <td>{{$siswa->nama}}</td>
      </tr>
        <th>Tanggal Lahir</th>
        <td>{{$siswa->tgl_lahir}}</td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td>{{$siswa->jenis_kelamin}}</td>
      </tr>
      <tr>
        <th>No Handphone</th>
        <td>{{$siswa->no_handphone}}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{$siswa->email}}</td>
      </tr>
      <tr>

      </tr>
    </table>

</body>
</html>

</body>
</html>