     <?php
    include "koneksi.php";
    //apabila klik tombol simpan
    if(isset($_POST['simpan'])) {
    //buat variabel
    $no_faktur=$_POST['no_faktur'];
    $tgl_faktur=$_POST['tgl_faktur'];
    $kd_cust=$_POST['kd_cust'];
    $kd_barang=$_POST['kd_barang'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    
	$a="insert into header_faktur(no_faktur,tgl_faktur,kd_cust)
	values ('$no_faktur','$tgl_faktur','$kd_cust')" or die(mysqli_error());
    $b=mysqli_query($koneksi,$a);
	
	if($b){
	$c="insert into detil_faktur(no_faktur,kd_barang,harga,jumlah)
	values ('$no_faktur','$kd_barang','$harga','$jumlah')" or die(mysqli_error());
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
    <h2 align="center">Tambah Faktur</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <table border="0" width="60%" align="center">
        <tr>
            <td>Nomor Faktur</td>
            <td><input type="text" name="no_faktur" size="15"></td>
        </tr>
        <tr>
            <td>Tanggal Faktur</td>
            <td><input type="text" name="tgl_faktur" size="15"></td>
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
            <td><input type="text" name="harga" size="15"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" size="15"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="simpan" value="SIMPAN">
            <input type="reset" name="batal" value="BATAL"></td>
        </tr>
    </table>
    </form>
    </body>
    </html>