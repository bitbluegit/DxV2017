<?php

// define ('PDO_FETCH_STYLE',PDO::FETCH_ASSOC);
// define ('PDO_ERROR_MODE',PDO::ERRMODE_EXCEPTION);

class DB
{
    // database con to hold pdo connection object
    protected static $con = null;

    // set pdo Attribute Error mode to Exception
   // protected static $pdoAttrErrorMode = PDO::ATTR_ERRMODE;
    //protected static $pdoErrorMode = PDO::ERRMODE_EXCEPTION;


    // set pdo Fetch Style
    // protected static $pdoFetchStyle = PDO::FETCH_ASSOC;


    // prohibit direct object creation
    protected function __construct() {
        // empty body
    }

    // Lock down object clone methdos : prevents duplication of object
    protected function __clone() {
        trigger_error('Cannot clone instance of Singleton pattern ...', E_USER_ERROR);
    }

    // Lock down object wakeup methods : prevent duplication of object
    protected function __wakeup() {
        trigger_error('Cannot deserialize instance of Singleton pattern ...', E_USER_ERROR);
    }

    // protected helper to catch exception message
    protected static function catchException($query, $e) {
        self::destroyCon();
        $err = "<p>Problem running this query: $query </p>";
        $err .= "<p>Exception: $e</p>";
        trigger_error($err);
    }

    // Ensures only one instance of connection exists
    public static function con() {
        if (self::$con === null) {
        try {
            // create a new PDO instance
            $dsn = 'mysql:host=localhost;dbname=dx2017;charset=utf8';
            $userName = 'admin';
            $pwd = '12345';
            self::$con = new PDO( $dsn,$userName,$pwd);
            // configure PDO to throw exceptions
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
            catch (Exception $e) {
                // close the database con and trigger an error
                //$errorMsg = PDO::message();
                //var_dump($errorMsg);
                self::destroyCon();
                $exceptionMessage = "<p>Connection Failure.</p>
                                    <p>Exception: $e</p>";
             //   trigger_error($exceptionMessage);
                var_dump($exceptionMessage);
            }
        }
    }

    public static function getPdoCon(){
        self::con();
        return self::$con;
    } 

    // Execute :  insert , update, delete stmt -- return affected rows
    public static function execute($sql, $params =array()) {
        $affectedRowCount = null ;
        try {
            $stmt = self::getPdoCon()->prepare($sql);
            $stmt->execute($params);
            $affectedRowCount = $stmt->rowCount();
        }
        catch(PDOException $e) {
            self::catchException($sql, $e);
        }
        return $affectedRowCount;
    }

    // Retrive a single row of record
    public static function oneRow( $sql, $params =array(), $fetchStyle = PDO::FETCH_ASSOC ) {
    // public static function oneRow( $sql, $params =array(), $fetchStyle = PDO::FETCH_ASSOC ) {
        $result = null;
        try {
            $stmt = self::getPdoCon()->prepare($sql);
            $stmt->execute($params); // won't allow to pass null value , all value send as a string
            $result = $stmt->fetch($fetchStyle);


            // result 1.false 2. error occur 
            // if($result === false){ $result = null ;}            
            $errorInfo = self::getPdoCon()->errorInfo(); 
            if($errorInfo[2] !== null ){ var_dump($errorInfo[2]); }

            //useful for database drivers that do not support executing a PDOStatement object
            // when a previously executed PDOStatement object still has unfetched rows
            // $stmt->closeCursor();
        }
        catch(PDOException $e) {
            self::catchException($sql, $e);
        }
        return $result;
    }

    // Retrieve all records
    public static function allRow( $sql, $params =array(), $fetchStyle = PDO::FETCH_ASSOC ) {
        $result = null;
        try {
            $stmt = self::getPdoCon()->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetchAll($fetchStyle);
        }
        catch(PDOException $e) {
            self::catchException($sql, $e);
        }
        return $result;
    }

    // Count number of records in a table
    public static function count($sql){
        $result = null;
        try {
            $stmt = self::getPdoCon()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchColumn();
        }
        catch(PDOException $e){
            self :: catchException ($sql, $e);
        }
        return $result;
    }

    // Fetch column
    public static function fetchColumn($sql,$colNumber = 1){
        $result = null;
        try {
            $stmt = self::getPdoCon()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchColumn($colNumber);
        }
        catch(PDOException $e){
            self :: catchException ($sql, $e);
        }
        return $result;
    }

    // Count number of records in a query result
    public static function rowCount(){
        $dbCon = self::getPdoCon();
        return $dbCon::rowCount;
    }

    // Get last inserted id
    public static function lastInsertId(){
        return self::getPdoCon()->lastInsertId(); // check if $con is not null ,  error shows
    }

    // Clear PDO instance
    public static function destroyCon(){
        self::$con = null;
    }

    // Get Query Error Info
    public static function queryErrorInfo($stmt=null){
        $errorMsg = null;
        $errorInfo =  $stmt === null ?  self::getPdoCon()->errorInfo() : $stmt->errorInfo();
        if(isset($errorInfo[2])){
            $errorMsg = $errorInfo[2];
        }
        return $errorMsg;
    }

    // bind Params - allow null , int , string etc
    public static function bindParams($stmt,$params=array()){
        foreach($params as $placeHolder => $value){
            $stmt->bindParam($placeHolder,$value);
        }
        return $stmt;
    }

    // bind value - allow expression , null , int , string etc
    public static function bindValues($stmt,$params=array()){
        foreach($params as $placeHolder => $value){
            $stmt->bindValue($placeHolder,$value);
        }
        return $stmt;
    }

    // bind column to varaiable
    public static function bindColumns($stmt,$columns=array()){
        foreach($columns as $column => $varName){
            $stmt->bindParam($column,$varName);
        }
        return $stmt;
    }

    // start Transaction
    public static function beginTransaction(){
        self::getPdoCon()->beginTransaction();
    }

    // rollback transction if stmt Failed
    public static function rollBackTransaction($stmt){
        self::getPdoCon()->rollBack();
    }

    // commit transation if all the stmt run success fully
    public static function commitTransaction($stmt){
        self::getPdoCon()->commit();
    }


}   