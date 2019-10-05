<?php
		include "config.php";
		include "fpdf/fpdf.php";
		require 'config.php'; // load koneksi database
		
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbnm = "mahasiswa";
 
$conn = mysql_connect($host, $user, $pass);
if ($conn) {
	$open = mysql_select_db($dbnm);
	if (!$open) {
		die ("Database tidak dapat dibuka karena ".mysql_error());
	}
} else {
	die ("Server MySQL tidak terhubung karena ".mysql_error());
}
//akhir koneksi



		$pdf = new FPDF('P','mm','A4');//P atau L = orientasi kertas, mm = ukuran, A4 = jenis kertas
		$pdf->AddPage();
		$pdf->AliasNbPages();
		$pdf->SetFont('Arial','B',10);//Arial = jenis huruf, B = format huruf, 10 = ukuran
		//$pdf->Cell(40,10,'',1);//40 = panjang, 10 = tinggi, 1 = tingkat ketebalan garis
		$pdf->Cell(180,10,'Data Mahasiswa',0,0,'C'); 
		$pdf->Ln(10);//Ln = pindah baris
		$pdf->Cell(30,10,'NIM','1');
		$pdf->Cell(30,10,'Nama','1');
		$pdf->Cell(30,10,'Jenis_Kelamin','1');
		$pdf->Cell(60,10,'Jurusan','1');
		$pdf->Cell(60,10,'Fakultas','1');
		
		//pindah baris
		$pdf->Ln(10);

		$no = 1;

		$sql = "SELECT * FROM data ORDER BY nim DESC";
		$query = mysql_query($sql) or die (mysql_error());

		while($data = mysql_fetch_array($query)){

			$pdf->Cell(30,10, $data["nim"],1);
			$pdf->Cell(30,10, $data["nama"],1);
			$pdf->Cell(30,10, $data["jenis_kelamin"],1);
			$pdf->Cell(60,10, $data["jurusan"],1);
			$pdf->Cell(60,10, $data["fakultas"],1);

			$pdf->Ln(10);
			$no++;

		}



		//cetak
		$pdf->Output();
		?>