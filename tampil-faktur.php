    <?php
    include "koneksi.php";
    ?>
    <html>
    <head>
    <title>Data Faktur</title>
    </head>
    <body>
    <h2 align="center">Data Faktur</h2>
    <table border="0" align="center" cellpadding="1" cellspacing="0" 
    width="70%">
    <tr><td colspan="7">
    <a href="tambah-faktur.php" style="text-decoration:none">
    <input type="button" value="TAMBAH"></a>
    </td></tr>
    </table>
    <table border="1" align="center" cellpadding="1" cellspacing="0" 
    width="75%">
        <tr align="center" bgcolor="yellow">
            <td>No. </td>
            <td>Id Faktur</td>
            <td>Tanggal</td>
            <td>Nama Customer</td>
            <td>Nama Barang </td>
            <td>Harga</td>
            <td>Jumlah</td>
            <td>Aksi</td>
        </tr>
    <?php
    //$a="select * from barang, customer, header_faktur, detil_faktur
    //where a.kd_barang = a.id_header and a.kd_cust = c.id_detil and a.id_detil = d.kd_barang ORDER BY a.no_faktur ASC";
	
	//$a = "SELECT a.no_faktur, a.tgl_faktur,  b.nm_cust, c.nm_barang, d.harga, d.jumlah FROM header_faktur a, customer b, barang c, 	     detil_faktur d WHERE a.kd_barang = a.id_header and a.kd_cust = c.kd_barang and a.id_detil = d.id_detil ORDER BY a.no_faktur ASC";
    //$b=mysqli_query($koneksi,$a);
	
	
	
$a = "SELECT a.no_faktur, a.tgl_faktur,  b.nm_cust, c.nm_barang, d.harga, d.jumlah from header_faktur a, customer b,barang c, detil_faktur d where a.kd_cust = b.kd_cust and d.kd_barang=c.kd_barang and a.no_faktur=d.no_faktur order by no_faktur";
$b=mysqli_query($koneksi,$a);

    $no=1;
    while($c=mysqli_fetch_array($b)){
    ?>
        <tr> 
            <td><?php echo $no; ?>.</td>
            <td><?php echo $c['no_faktur']; ?></td>
             <td><?php echo $c['tgl_faktur']; ?></td>
            <td><?php echo $c['nm_cust']; ?></td>
            <td><?php echo $c['nm_barang']; ?></td>
             <td><?php echo $c['harga']; ?></td>
            <td><?php echo $c['jumlah']; ?></td>
            <td>
            
            <a href="ubah-faktur.php?no_faktur=<?php echo $c['no_faktur']; ?>">Ubah</a> | 
            <a href="javascript:if(confirm('Anda yakin menghapus?'))
    {document.location='hapusfaktur.php?no_faktur=<?php echo $c['no_faktur']; ?>';}">Hapus</a></td>
        </tr>
    <?php $no++; } ?>
    </table>
    </body>
    </html>