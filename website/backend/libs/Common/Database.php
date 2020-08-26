<?php

namespace Common;

//Database connection class
class Database
{
    private $host;
    private $port;
    private $user;
    private $password;
    private $name;

    //Database handler
    private $dbh;
    private $stmt;
    private $err;

    public static $exception = "";


    public function __construct()
    {
        $this->host = DB_HOST;
        $this->port = DB_PORT;
        $this->user = DB_USER;
        $this->password = DB_PASSWORD;
        $this->name = DB_NAME;

        //Data source name
        $dsn = "pgsql:host={$this->host};dbname={$this->name}";
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new \PDO($dsn, $this->user, $this->password, $options);
        } catch (\Exception $e) {
            $this->err = $e->getMessage();
            echo $this->err;
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($parameter, $value)
    {
        $type;
        switch (true) {
            case is_int($value):
                $type =  \PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type =  \PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = \PDO::PARAM_NULL;
                break;
            default:
                $type = \PDO::PARAM_STR;
                break;
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }

    public function execute()
    {
        try {
            return $this->stmt->execute();
        } catch (\Exception $e) {
            self::setException($e->getCode(), $e->getMessage());
        }
    }

    public function getResult()
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }

    private static function setException($code, $message)
    {
        switch ($code) {
            case '7':
                self::$exception = 'There is a problem connecting to the server';
                break;
            case '42703':
                self::$exception = 'Unknown fieldname';
                break;
            case '23505':
                self::$exception = 'Duplicated field cannot be saved';
                break;
            case '42P01':
                self::$exception = 'Unknown table\'s name';
                break;
            case '1':
                self::$exception = 'Occupied registry cannot be deleted';
                break;
            default:
                self::$exception = $message;
        }
    }
}
