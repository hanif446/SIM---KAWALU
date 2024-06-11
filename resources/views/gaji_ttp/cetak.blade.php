<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Slip TPP Pegawai</title>
	<style>
		.header{
			line-height: 1;
		}
		.header table{
			width: 100%;
		}

		.header img{
			width: 100px;
		}

		.header .logo{
			width: 50px;
			text-align: left;
		}
		.header .kop{
			text-align: center;
		}

		.header .kab{
			font-size: 21.333px;
			line-height: 140%;
		}

		.header .alamat{
			font-size: 13.333px;
		}
		hr{
			border: 2px solid;
		}
		.footer{
			font-size: 16px;
			text-align: center;			
		}

		.footer table{
			width: 100%;
		}

		.footer .kiri{
			width: 50%;
		}

		.footer .kanan{
			width: 50%;
			text-align: center;
		}
	</style>
	<link rel="icon" type="image/png" href="{{asset('template/img/logo-tasik.png')}}">
</head>
<body>
	<div class="header">
		<table>
			<tr>
				<td class="logo"><img src="{{asset('template/img/logo-tasik.png')}}"></td>
				<td class="kop">
				<span class="kab">PEMERINTAH KOTA TASIKMALAYA<br>KANTOR KECAMATAN KAWALU <span><br>
				<span class="alamat">Jl. Raya Cibeuti No.80A Tlp. (0265) 343100</span>
				</td>
			</tr>
		</table>
		<hr><br>
	</div>
	<div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
            	<h4>
                    <strong>TPP Pegawai</strong>
                </h4>
            	<table>
					<tr>
						<td>NIP</td>
						<td width="42%" align="right">:</td>
						<td>{{ $pegawai->nip }}</td>
					</tr>
					<tr>
						<td>Nama</td>
						<td width="42%" align="right">:</td>
						<td>{{ $pegawai->nama_pegawai }}</td>
					</tr>
					<tr>
						<td>Bulan Gaji</td>
						<td width="42%" align="right">:</td>
						<td>{{ $gaji_ttp->bulan_gaji}} {{ $gaji_ttp->tahun_gaji}}</td>
					</tr>
					<tr>
						<td>Nominal Gaji</td>
						<td width="42%" align="right">:</td>
						<td>Rp. {{number_format($golongan_gaji->nominal_gaji_ttp, 0, ',', '.')}}</td>
					</tr>
				</table>

				<br>
					<h4>
                    <strong>Potongan - potongan</strong>
                </h4>
            	<table>
					<tr>
						<td>1.</td>
						<td>Infak</td>
						<td width="45%" align="right">:</td>
						<td>Rp. {{number_format($potongan_gaji_ttp->infak , 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td>2.</td>
						<td>BJB</td>
						<td width="45%" align="right">:</td>
						<td>Rp. {{number_format($potongan_gaji_ttp->bjb , 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td>3.</td>
						<td>Mukti Resik</td>
						<td width="45%" align="right">:</td>
						<td>Rp. {{number_format($potongan_gaji_ttp->mukti_resik , 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td>4.</td>
						<td>BJBS</td>
						<td width="45%" align="right">:</td>
						<td>Rp. {{number_format($potongan_gaji_ttp->bjbs , 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td>5.</td>
						<td>Al-Madinah</td>
						<td width="45%" align="right">:</td>
						<td>Rp. {{number_format($potongan_gaji_ttp->al_madinah , 0, ',', '.')}}</td>
					</tr>
				</table>
				<br>
				<table>
					<tr>
						<td>Jumlah Potongan</td>
						<td width="33%" align="right">:</td>
						<td>Rp. {{number_format($gaji_ttp->jml_pot , 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td>Jumlah Dibayarkan</td>
						<td width="33%" align="right">:</td>
						<td>Rp. {{number_format($gaji_ttp->gaji_netto , 0, ',', '.')}}</td>
					</tr>
				</table>
                
            </div>
         </div>
      </div>
   </div>

   <div class="footer">
		<br>
		<br>
		<br>
		<table>
			<tr>
				<td  class="kiri"></td>
				<td class="kanan">
					Bendahara Kecamatan Kawalu <br><br><br><br><br>
					<b><u>Dini Suandi</u></b>
				</td>
			</tr>
		</table>
	</div>

   <script type="text/javascript">
   		window.print();
   </script>
</body>
</html>