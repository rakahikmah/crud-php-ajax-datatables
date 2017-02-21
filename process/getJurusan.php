<?php
    require_once 'koneksi.php';
    $sql="SELECT * FROM jurusan WHERE kd_fakultas='".$_POST["kd_fakultas"]."'";
    $query=$connect->query($sql);
    while($row = $query->fetch_assoc()){ ?>
        <option value="<?php echo $row["nm_jurusan"] ?>"><?php echo $row["nm_jurusan"]; ?></option><br>
<?php } ?>