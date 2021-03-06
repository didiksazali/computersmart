<?php
    session_start();
    include "connection.php";
    require('fpdf17/fpdf.php');
	     
    $query ="select * from tabel_pemasok";
    $db_query = mysql_query($query) or die("Query gagal");
    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][0] = $data[0];
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
        $cell[$i][3] = $data[3];
         $i++;
    }
    //memulai pengaturan output PDF
    class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
            //Pengaturan Font Header
            $this->SetFont('Times','B',14); //jenis font : Times New Romans, Bold, ukuran 14
            //untuk warna background Header
            $this->SetFillColor(255,255,255);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman
            $this->Cell(0,2,'SMART COMPUTER LAPORAN DATA PEMASOK','',0,'C',1); //TBLR (untuk garis)=> B = Bottom, 
			 // L = Left, R = Right
            //untuk garis, C = center
        }
    }
    //pengaturan ukuran kertas P = Portrait
    $pdf = new PDF('P','cm','A4');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
	
		
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(1,1,'No','LRTB',0,'C');
    $pdf->Cell(3,1,'Kode','LRTB',0,'C');
    $pdf->Cell(4,1,'Pemasok','LRTB',0,'C');
    $pdf->Cell(5,1,'Alamat','LRTB',0,'C');
    $pdf->Cell(6,1,'No HP','LRTB',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
        $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
        $pdf->Cell(3,1,$cell[$j][0],'LBTR',0,'C');
        $pdf->Cell(4,1,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(5,1,$cell[$j][2],'LBTR',0,'C');
        $pdf->Cell(6,1,$cell[$j][3],'LBTR',0,'C');
        $pdf->Ln();
    }
	 
    //menampilkan output berupa halaman PDF
    $pdf->Output();
?>