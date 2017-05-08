<?php
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
//memanggil file excel_reader
require "excel_reader.php";
require "konek.php";
 
//jika tombol import ditekan

$data = new Spreadsheet_Excel_Reader('New Microsoft Excel Worksheet.xls');

//    menghitung jumlah baris file xls
$baris = $data->rowcount($sheet_index=0);
$kolom = $data->colcount($sheet_index=0);

echo "<table>";

//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
for ($i=0; $i<=$baris; $i++)
{
  echo "<tr>";
  for($j=1; $j<=$kolom; $j++){
    //       membaca data (kolom ke-1 sd terakhir)
    $var1      = $data->val($i, $j, 0);
    echo "<td>$var1</td>";

  }
  echo "</tr>";

}
echo "</table>";
 
?>