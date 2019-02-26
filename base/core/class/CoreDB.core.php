<?php
class Core_DB extends overrider
{
    public static $_instance;
    public static  $_mysqli;
	
   /* public function __construct () 
	{
		/*self::$_mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		if (self::$_mysqli->connect_errno) {
			printf("Échec de la connexion : %s\n", self::$_mysqli->connect_error);
			exit();
		}
	}
	*/
 
	public function base_initiate()
	{
		WF::DB()->_mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		if (WF::DB()->_mysqli->connect_errno) {
			printf("Échec de la connexion : %s\n", WF::DB()->_mysqli->connect_error);
			exit();
		}
	}

   // public function __clone () {}

    /*public static function base_getinstance () {
        if (!(WF::DB()->_instance instanceof WF::DB)
            WF::DB()->_instance = new WF::DB();
 
        return WF::DB()->_instance;
    }*/

	public static function base_clear($req)
	{
		return  mysqli_real_escape_string(WF::DB()->_mysqli, $req);
	}
	
	public static function base_fetch_assoc($req)
	{
		return mysqli_fetch_assoc($req);
	}
	
	public static function base_insert($table, $arrayFields, $arrayValues)
	{
		$fields = "(";
		for ( $i = 0; $i < count($arrayFields); $i++)
		{
			$fields .= WF::DB()->clear($arrayFields[$i]) . ",";
		}
		if( $i !=  0 ) $fields = substr($fields, 0, strlen($fields) - 1);
		$fields .= ")";
		$values = "(";
		for ( $i = 0; $i < count($arrayValues); $i++)
		{
			$values .= "'" . WF::DB()->clear($arrayValues[$i]) . "',";
		}
		if( $i != 0 )$values = substr($values, 0, strlen($values) - 1);
		$values .= ")";
		$query = "INSERT into $table $fields VALUES $values";

		if (WF::DB()->_mysqli->query($query) !== TRUE) 
		{
			echo WF::DB()->_mysqli->error;
		}
	}

	public static function base_update($table, $arrayFields, $arrayValues, $searchField = NULL, $searchValue = NULL)
	{
		
		$fields = "";
		for ( $i = 0; $i < count($arrayFields); $i++)
		{
			$fields .= $arrayFields[$i] . "=" . "'" . $arrayValues[$i] . "'" . ",";
		}
		if( $i !=  0 ) $fields = substr($fields, 0, strlen($fields) - 1);

		$search = "";
		if($searchField != NULL || $searchValue != NULL)
		{
			$search .= " WHERE " . WF::DB()->clear($searchField) . " = '" . WF::DB()->clear($searchValue) . "'";
		}

		$query = "UPDATE $table SET $fields $search";

		if (WF::DB()->_mysqli->query($query) !== TRUE) 
		{
			echo WF::DB()->_mysqli->error;
		}

	}
	
	public static function base_select ($table, $arrayFields, $searchField = NULL, $searchValue = NULL)
	{
		$query = "SELECT ";
		if($arrayFields == "*") $query .= $arrayFields . " ";
		else
		{
			for( $i = 0; $i < count($arrayFields); $i++ )
			{
				$query .= $arrayFields[$i] . ",";
			}
			$query = substr($query, 0, strlen($query) - 1);
		}
		$query .= " from $table ";
		if($searchField != NULL || $searchValue != NULL)
		{
			$query .= " WHERE " . WF::DB()->clear($searchField) . " = '" . WF::DB()->clear($searchValue) . "'";
		}
		$req = WF::DB()->_mysqli->query($query);
		if(!$req)
		{
			return false;
		}
		$ret = array();
		while ($row = $req->fetch_array(MYSQLI_NUM)) 
		{
		    $ret[] = $row;
		}
		$req->close();
		return $ret;
		
	}
	
	public static function base_delete($table, $field, $value)
	{
		$table = WF::DB()->clear($table);
		$field = WF::DB()->clear($field);
		$value = WF::DB()->clear($value);
		$query = "DELETE FROM $table WHERE $field = '$value'";

		$req = WF::DB()->_mysqli->query($query);
		if($req !== TRUE)
		{
			echo WF::DB()->_mysqli->error;
			return false;
		}
		return $req;
	}	
}
