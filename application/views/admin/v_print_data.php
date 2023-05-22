<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title?>
    </title>
    <style>
        table {
            border-collapse: collapse;
        }
        
        table,
        th,
        td {
            border: 1px solid black;
        }
        
        th,
        td {
            padding: 10px;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>


    <!-- <img style=" width: 80px;height: 80px;" src="uploads/original_image/lambang.png" align="left"> -->


    <img src="<?=base_url();?>images/admin.png" style="float:left; width: 90px; height: 90px;">
    <h3 style="text-align: center;">TOKO TANI INDONESIA CENTER (TTIC)<br> PADANG<br>Komp.Perum. Asam Kapeh Malana Padang Telp. (0752) 711
        <hr>
    </h3>


    <!-- <p style="text-align: center;">DATA PEMILIH TETAP (DPT) KECAMATAN BATIPUH SELATAN</p>
  <p style="text-align: center;"><u>KABUPATEN TANAH DATAR</u></p> -->



    <!-- <br> -->
    <h5>Tanggal Print :
        <!-- <?= date('d-m-Y');?> -->
    </h5>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th style="width: 350px;">Kode Barang</th>
                <th style="width: 350px;">Tanggal Input Barang</th>
                <th style="width: 400px;">Nama Barang</th>
                <th style="width: 100px;">Satuan</th>
                <th style="width: 400px;">Harga Barang</th>

            </tr>
        </thead>
        <?php
               $no = 1;
               foreach ($dataHarga as $key => $value):?>
            <tbody>
                <tr>
                    <td>
                        <?=$no++?>
                    </td>
                    <td style="text-align: center;">
                        <?=$value['kode_barang'];?>
                    </td>
                    <td style="text-align: center;">
                        <?=$value['tgl_input'];?>
                    </td>
                    <td style="text-align: center;">
                        <?=$value['nama_barang'];?>
                    </td>
                    <td style="text-align: center;">
                        <?=$value['satuan'];?>
                    </td>
                    <td style="text-align: center;">
						<?="Rp. ".number_format($value['harga']);?>
                    </td>
                </tr>
            </tbody>
            <?php endforeach;?>
    </table>
    <br>
    <br>
    <h5 style="text-align: right;">Padang,
        <?= date('d-m-Y')?>
    </h5>
    <br>
    <h5 style="text-align: right;">pimpinan</h5>

</body>

</html>
