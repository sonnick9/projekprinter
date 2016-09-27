    <?php
    include "koneksi.php";
    //buat query input
    $a="delete from detil_faktur where no_faktur='$_GET[no_faktur]'";
    $b=mysqli_query($koneksi,$a);
        if($b){
			
			$c="delete from header_faktur where no_faktur='$_GET[no_faktur]'";
            $d=mysqli_query($koneksi,$c); }
            if($d){
			
        header("location:tampil-faktur.php");
        }else{
        echo "Data gagal dihapus";
        }
    ?>