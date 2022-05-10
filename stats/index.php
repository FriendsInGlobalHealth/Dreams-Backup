
<?php require_once("./src/.conf.php"); ?>
<?php 


echo "LISTA";

$selProv="SELECT * FROM hs_hr_province WHERE status=1";
$provs=mysqli_query($conn,$selProv);

 while($prov = mysqli_fetch_array($provs)) {
 $id=$prov['id'];
        echo '<font style="text-transform: uppercase;color: blue;"><b>'.$i.' - '.utf8_encode($prov['province_name']).'</b></font><br>'; 
        $selDist="SELECT * FROM hs_hr_district WHERE province_code=$id";
$dists=mysqli_query($conn,$selDist); 
         while($dist = mysqli_fetch_array($dists)) {
         
        $distr=$dist['district_code'];

}
}


?>
