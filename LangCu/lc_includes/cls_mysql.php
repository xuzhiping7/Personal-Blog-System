<?php

/**
 * LangCu MySql Class
 * ============================================================================
 * Package mysql control-statement
 * ============================================================================
 * $Author : Zhiping Xu
 * $Contact: http://weibo.com/spades7
*/
class lc_mysql
{
  private $lc_link;//database connect resource (handle)
  private $hostname;
  private $username;
  private $password;
  private $dbname;
  private $result_data;

  //construct function ,use to inilizating default values
  function __construct($hostname,$dbname,$username,$password)
  {
  	$this->hostname = $hostname; //hostname
		$this->dbname   = $dbname; //database name
		$this->username = $username; //username
		$this->password = $password; //your password
		$this->result_data = "";//initialize the result data
  }

	//connect to mysql
  function connect()
  {
  	$this->lc_link = mysql_connect($this->hostname, $this->username, $this->password);
  	if(!$this->lc_link)
  	{
  		trigger_error(mysql_error() , E_USER_ERROR);
  	}
  }

  //select the database
  function selectDB()
  {
  	mysql_select_db($this->dbname, $this->lc_link) or die(mysql_error());
  }

  //execute the sql query
  function query($sql)
  {
  	$this->result_data = mysql_query($sql,$this->lc_link) or die(mysql_error());
  }

  //return the row of result_data
  function row_num()
  {
  	if($this->result_data != "")
  	{
  		return mysql_num_rows($this->result_data);
  	}
  	else
  	{
  		echo "result_data is empty";
  		return false;
  	}
  }

  //return(fetch) a rowdata of result_data by key value increasing
//  function fetch_array()
//  {
//  	if($this->result_data != "")
//  	{
//  		return mysql_fetch_array($this->result_data);
//  	}
//  	else
//  	{
//  		echo "result_data is empty";
//  		return false;
//  	}
//  }
//
  //return the last sqlquery affected rows num
  function affected_rows()
  {
     return mysql_affected_rows($this->lc_link);
  }

  //get one row
  function getRow($sql)
  {
      $res = mysql_query($sql,$this->lc_link) or die(mysql_error());
      if ($res !== false)
      {
          return mysql_fetch_assoc($res);
      }
      else
      {
          return false;
      }
  }
  //get all result
  function getAll($sql)
  {
      $res = mysql_query($sql,$this->lc_link) or die(mysql_error());
      if ($res !== false)
      {
          $arr = array();
          while ($row = mysql_fetch_assoc($res))
          {
              $arr[] = $row;
          }

          return $arr;
      }
      else
      {
          return false;
      }
  }


  //auto insert data,attr the key must match table field
  function autoInsert($arr,$table)
  {
      if(is_array($arr))
      {
          $temp_sql = "INSERT INTO ".$table."(";
          $temp_str1 = "";
          $temp_str2 = " VALUES( ";
          foreach($arr as $key => $item)
          {
              $temp_str1 .= "`".$key."`,";
              $temp_str2 .= "'".$item."',";
          }

          $temp_str1 = substr($temp_str1,0,-1);
          $temp_str2 = substr($temp_str2,0,-1);

          $temp_str1.=") ";
          $temp_str2.=") ";
          $temp_sql = $temp_sql.$temp_str1.$temp_str2;
          $this->query($temp_sql);
          return 1;
      }
      else
      {
          return 0;
      }
      return 0;
  }

  //auto update data,only support one key for 'where' finding,and attr the key must match table field
  function autoUpdate($arr,$key_info,$table)
  {
      if(is_array($arr) && is_array($key_info))
      {
          //UPDATE persondata SET ageage=age*2, ageage=age+1;
          $temp_sql = "UPDATE ".$table." SET ";
          foreach($arr as $key => $value)
          {
              $temp_sql.= "`".$key."`='".$value."',";
          }
          $temp_sql = substr($temp_sql,0,-1);
          $temp_sql .=" WHERE `".$key_info['key_name']."`='".$key_info['key_value']."'";
          $this ->query($temp_sql);
          return 1;
      }
      else
      {
          return 0;
      }
      return 0;
  }

  //close the database link
  function close()
  {
  	mysql_close($this->lc_link);
  }
}
?>