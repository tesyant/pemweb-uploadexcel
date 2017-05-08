<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
require "konek.php";
 
//jika tombol import ditekan
$count = 0;
$extensi = array('xls','xlsx');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($_FILES['files']['name'] as $i => $name) {
        $folder = './upload/'.$name;
        $file_ext = strtolower(end(explode('.', $name)));
        $alert='extensi file '.$name.' tidak diperbolehkan!';
        if(in_array($file_ext, $extensi) == true){
            if (strlen($_FILES['files']['name'][$i]) > 1) {
                if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $folder)) {

                    $query = "insert into files values('', '$name', '$file_ext','$folder')";

                    $hasil = $conn->query($query);

                    echo "file ".$name." uploaded";
                    $count++;
                }
            }    
        }
        else{
            echo "<script type='text/javascript'>alert('$alert')</script>";
        }
    }
}
?>
 
<form method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory="">
    <input class="button" type="submit" value="Upload" />
</form>

<a href="lihat.php">file yang telah diupload</a>

</body>
</html>