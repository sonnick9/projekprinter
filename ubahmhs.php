    <?php
    include "koneksi.php";
    //menampilkan data
    $x="SELECT a.no_faktur, a.tgl_faktur,  b.nm_cust, c.nm_barang, d.harga, d.jumlah from header_faktur a, customer b,barang c, detil_faktur d where a.kd_cust = b.kd_cust and d.kd_barang=c.kd_barang and a.no_faktur=d.no_faktur and no_faktur='$_GET[no_faktur]'";
    $y=mysqli_query($koneksi,$x);
    $z=mysqli_fetch_array($y);
    //apabila klik tombol simpan
    if(isset($_POST['ubah'])) {
    //buat variabel
    $no_faktur=$_POST['no_faktur'];
    $tgl_faktur=$_POST['tgl_faktur'];
    $kd_cust=$_POST['kd_cust'];
    $kd_barang=$_POST['kd_barang'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    
    //buat query ubah
    $a="update header_faktur set no_faktur='$no_faktur',tgl_faktur='$tgl_faktur'
    where no_faktur='$_GET[no_faktur]'";
    $b=mysqli_query($koneksi,$a);
        if($b){
        header("location:tampil-faktur.php");
        }else{
        echo "Data gagal diubah";
        }
    }
    ?>
    <html>
    <head>
    <title>Ubah data Faktur</title>
    </head>
    <body>
    <h2 align="center">Ubah Data Faktur</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <table border="0" width="50%" align="center">
        <tr>
            <td>Id Faktur</td>
            <td><input type="text" name="no_faktur" size="30" value="">              </td>
        </tr>
        <tr>
            <td>Tanggal </td>
            <td><input type="date" name="tgl_faktur" size="30" value=""></td>
        </tr>
        <tr>
            <td>Customer</td>
            <td><input type="text" name="nm_customer" size="30" value=""></td>
        </tr>
        <tr>
            <td>Barang</td>
            <td><input type="text" name="nm_barang" size="30" value=""></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" size="30" value=""></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" size="30" value=""></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="ubah" value="UBAH">
            </td>
        </tr>
    </table>
    </form>
    </body>
    </html>