# query
Veritabanına sorgu gönderir.<br />
Gönderilen sorguya göre sonuç döndürür.
<br /><br />
## Örnek
```
MySQL::query("SELECT * FROM tablo WHERE id = 1");
```

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
// Return true/false
```

# delete
Veritabanından veri siler ve true/false döndürür.<br />
İkinci parametre verilmezse tabloyu boşaltır.
Geriye true/false döndürür
<br /><br />
## Örnek
```
MySQL::delete("tablo",array(
    id => 2
));
// Return true/false
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
// Return value
```

# fetch
Veritabanından tek bir satır çeker.<br />
Geriye satırı obje olarak döndürür.
<br /><br />
## Örnek
```
$result = MySQL::fetch("tablo",array(
    id => 1
));
print_r($result);
// Example $result->name
```

# info
MySQL hakkında bilgiler verir.
<br /><br />
## Örnek
```
// Veritabanı hakkında
$info = MySQL::info();
// Version
echo $info->version;
// Full
print_r($info);
```

# getTables
Veritabanındaki tabloları listeler.
<br /><br />
## Örnek
```
// Tablo Listesi
$table = MySQL::getTables();
echo "<pre>";
print_r($table);
```

# getTableView
Verilen tablonun özelliklerini döndürür.
<br /><br />
## Örnek
```
// Tablo Özellikleri
$table = MySQL::getTableView("tablo1");
echo "<pre>";
print_r($table);
```
