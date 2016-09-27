    <?php
    include "koneksi.php";
    //menampilkan data
    $x="select * from prodi,mahasiswa where 
    prodi.kdprodi=mahasiswa.kdprodi and mahasiswa.nim='$_GET[nim]'";
    $y=mysqli_query($koneksi,$x);
    $z=mysqli_fetch_array($y);
    ?>
    <html>
    <head>
    <title>Ubah data mahasiswa</title>
    <style type="text/css">
    <!--
    .style1 {
        color: #000099;
        font-weight: bold;
    }
    -->
    </style>
    </head>
    <body>
    <h2 align="center">Tampil Biodata Mahasiswa</h2>
    <table border="0" width="50%" align="center">
        <tr>
          <td width="31%" rowspan="8"><img src="images/<?php echo $z['foto']; ?>" alt="" width="150" height="180"></td>
            <td width="30%">Nomor Induk Mahasiswa</td>
            <td width="39%"><span class="style1"><?php echo $z['nim']; ?></span></td>
        </tr>
        <tr>
          <td>Nama Mahasiswa</td>
            <td><span class="style1"><?php echo $z['nama']; ?></span></td>
        </tr>
        <tr>
          <td>Program Studi</td>
            <td><span class="style1"><?php echo $z['nama_prodi']; ?></span></td>
        </tr>
        <tr>
          <td>Semester</td>
            <td>
              <span class="style1"><?php echo $z['semester']; ?></span></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
            <td><span class="style1"><?php echo $z['jk']; ?></span></td>
        </tr>
        <tr>
          <td>Alamat</td>
            <td><span class="style1"><?php echo $z['alamat']; ?></span></td>
        </tr>
    </table>
    </body>
    </html>