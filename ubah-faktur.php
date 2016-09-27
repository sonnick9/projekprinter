     <?php
    include "koneksi.php";
	$xx="select * from detil_faktur where no_faktur = '$_GET[no_faktur]'";
		$yy=mysqli_query($koneksi,$xx);
    	$zz=mysqli_fetch_array($yy);
	
	$x="select * from header_faktur where no_faktur='$_GET[no_faktur]'";
    $y=mysqli_query($koneksi,$x);
    $z=mysqli_fetch_array($y);
	
		
		
    //apabila klik tombol simpan
    if(isset($_POST['ubah'])) {
    //buat variabel
    
    $tgl_faktur=$_POST['tgl_faktur'];
    $kd_cust=$_POST['kd_cust'];
    $kd_barang=$_POST['kd_barang'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    
    //buat query input
    //$a="insert into fakturs(no_faktur,tgl_faktur,kd_cust,kd_barang,harga,jumlah) 
    //values('$no_faktur','$tgl_faktur','$kd_cust','$kd_barang','$harga','$jumlah')";
	
	$a="update header_faktur set tgl_faktur ='$tgl_faktur',kd_cust='$kd_cust' where no_faktur ='$_GET[no_faktur]'";
    $b=mysqli_query($koneksi,$a);
	
	if($b){
	$c="update detil_faktur set kd_barang = '$kd_barang',harga = '$harga' ,jumlah = '$jumlah'	where no_faktur ='$_GET[no_faktur]'";
    $d=mysqli_query($koneksi,$c);  }
	
	if ($d){     
        header("location:tampil-faktur.php");
        }else{
        echo "Data gagal disimpan";
        }
    }
    ?>
    <html>
    <head>
    <title>Tambah faktur</title>
    </head>
    <body>
    <h2 align="center">Ubah Data Faktur</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <table border="0" width="60%" align="center">
        <tr>
            <td>Nomor Faktur</td>            
            <td><?php echo $z['no_faktur']; ?></td>
        </tr>
        <tr>
            <td>Tanggal Faktur</td>
            <td><input type="date" name="tgl_faktur" size="30" value="<?php echo $z['tgl_faktur']; ?>"></td>
        </tr>
        <tr>
            <td>Kode Customer</td>
            <td><select name="kd_cust">
            <?php
            $j=mysqli_query($koneksi,"select * from customer");
            while($k=mysqli_fetch_array($j)){
            echo "<option value='$k[kd_cust]'>$k[kd_cust]  ($k[nm_cust])</option>";
			
            }
            ?>
            </select></td>
        </tr>
        <tr>
            <td>Kode Barang</td>
            <td><select name="kd_barang">
              <?php
            $j=mysqli_query($koneksi,"select * from barang");
            while($k=mysqli_fetch_array($j)){
            echo "<option value='$k[kd_barang]'>$k[kd_barang]  ($k[nm_barang])</option>";
            }
            ?>
            </select></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" size="30" value="<?php echo $zz['harga']; ?>"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" size="30" value="<?php echo $zz['jumlah']; ?>"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="ubah" value="UBAH"></td>
        </tr>
    </table>
    </form>
    </body>
    </html>