<?PHP
class MySQL {
    static $pdo,$last = null;
    public static function request(){
		return self::$pdo == null ? self::connect() : self::$pdo;
    }
    public static function connect(){
        try {
            self::$pdo = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB,MYSQL_USER,MYSQL_PASS);
            self::$pdo->exec('SET NAMES `UTF-8`');
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return self::$pdo;
        } catch(PDOException $e) {
            echo "Error: ".$e->getMessage();
            die();
        }
    }
    public static function query($query){
        self::$last = self::request()->query($query);
        if(self::$last){
            return self::$last;
        } else {
            echo "<pre>Error Query: ".$query."</pre>";
        }
    }
    public static function add($table,$arg){
        $keys = array_keys($arg);
        $label = implode(',', $keys);
        $regular = array_map("self::unison",$arg);
        $value = "'".implode("','",$regular)."'";
        if(self::query("INSERT INTO ".$table." (".$label.") VALUES (".$value.")")){
            return self::$pdo->lastInsertId();
        }
    }
    public static function update($table,$arg,$where=array()){
        $data_array = array();
        foreach($arg as $key=>$data){
            $path = (gettype($data)=="integer")?"":"'";
            $data = self::unison($data);
            array_push($data_array,$key."=$path".$data."$path");
        }
        $query = "UPDATE $table SET ".implode(', ', $data_array).self::where($where);
        if(self::query($query)){
            return true;
        }
    }
    public static function delete($table,$where=array()){
        $must = self::where($where);
        if($must){
            $query = "DELETE FROM $table $must";
        } else {
            $query = "TRUNCATE TABLE $table";
        }
        if(self::query($query)){
            return true;
        }
    }
    public static function count($table,$where=array()){
        return self::query("SELECT * FROM $table".self::where($where))->rowCount();
    }
    public static function fetch($table,$where=array()){
        return self::query("SELECT * FROM $table".self::where($where))->fetch(PDO::FETCH_ASSOC);
    }
    public static function where($array){
        $where_array = array();
        foreach($array as $key=>$data){
            $path = (gettype($data)=="integer")?"":"'";
            $data = self::unison($data);
            array_push($where_array,$key."=$path".$data."$path");
        }
        if(count($where_array)){
            return " WHERE ".implode(' AND ', $where_array);
        }
    }
    public static function unison($data){
		$in = array("'");
		$out = array("\'");
        return str_replace($in, $out, $data);
    }
    public static function __callStatic($key,$arg){
		return call_user_func_array(array(self::request(),$key), $arg);
	}
}
?>