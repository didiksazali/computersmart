<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Karyawan</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<?php include("connection.php");
include("header.php"); ?>

<div id="container">

<div class="karyawan">
<li><a href="add-karyawan.jsp"><input type="image" src="icon/add.png" /></a></li>
<li><a href="print-karyawan.jsp" target="_blank"><input type="image" src="icon/print.png" /></a></li>
</div>

<div id="content">
<?php
$no=1;
$hasil = mysql_query("SELECT * FROM tabel_karyawan",$koneksi);?>
<table border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr class="judul">
<td><b>No</b></td>
<td><b>Kode karyawan</b></td>
<td><b>Nama</b></td>
<td><b>Foto</b></td>
<td><b>Alamat</b></td>
<td><b>No HP</b></td>
<td colspan=2><b>Action</b></td>
</tr>
<?php while ($baris = mysql_fetch_row($hasil))
{?>
<tr class="data">
<td><?php echo $no; ?></td>
<td><?php echo $baris[0]; ?></td>
<td><?php echo $baris[1]; ?></td>
<td><img src="file-foto/<?php echo $baris[2]; ?>" width="120px" /></td>
<td><?php echo $baris[3]; ?></td>
<td><?php echo $baris[4]; ?></td>
<td><a href='edit-karyawan.php?kode_karyawan=<?php echo $baris[0];?>'><input type='image' src='icon/edit.png'/></a></td>
<td><a onclick="return confirm('Anda yakin ingin menghapus data tersebut?')" href='delete-karyawan.php?kode_karyawan=<?php echo $baris[0];?>'><input type='image' src='icon/delete.png'/></a></td>
</tr>
<?php $no++;
}?>
</table>
</div>
</div>
<?php include ('footer.php');?>
</body>
</html>