# add
Veritabanına data ekler. Geriye eklenen satırın id değerini döndürür.
<br /><br />
## Örnek
```
MySQL::add("tablo",array(
    name => "Ad",
    surname => "Soyad"
));
// Return insert id
```


# update
Veritabanından veri günceller ve true/false döndürür.
<br /><br />
## Örnek
```
MySQL::update("tablo",array(
    name => "Update Name"
),array(
    id => 1,
    surname => "Soyad"
));
```

# delete
Veritabanından veri siler ve true/false döndürür.<br />
İkinci parametre verilmezse tabloyu boşaltır.
<br /><br />
## Örnek
```
MySQL::delete("tablo",array(
    id => 2
));
```

# count
Seçili satırların sayısını verir.<br />
İkinci parametre verilmezse tablo satır sayısını verir.
<br /><br />
## Örnek
```
$toplam = MySQL::count("tablo",array(
    name => "Ad",
    surname => "Soyad"
));
echo "Toplam: ".$toplam."<br />";
```

# fetch
Veritabanından tek bir satır çeker
<br /><br />
## Örnek
```
$result = MySQL::fetch("tablo",array(
    id => 1
));
print_r($result);
```
