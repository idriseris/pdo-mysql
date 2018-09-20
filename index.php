<?PHP
include("config.php");


// Ekleme
MySQL::add("tablo",array(
    name => "Ad",
    surname => "Soyad"
));
// Return insert id

// Güncelleme
MySQL::update("tablo",array(
    name => "Update Name"
),array(
    id => 1,
    surname => "Soyad"
));
// Return true or false

// Silme
MySQL::delete("tablo",array(
    id => 2
));
// Return true or false

// Toplam
$toplam = MySQL::count("tablo",array(
    name => "Ad",
    surname => "Soyad"
));
echo "Şartlı Toplam: ".$toplam."<br />";


// Listeleme
$que = "SELECT * FROM tablo ORDER BY id";
$con = MySQL::query($que);
foreach($con as $key=>$item){
    echo $item->id." -> ".$item->name." -> ".$item->surname."<br />";
}

// Tek Satır Listeleme
$result = MySQL::fetch("tablo",array(
    id => 1
));
print_r($result);
echo "<br />";

?>