<?php 
//---------------------------------------------------------------------------------------------------------------------------
    require_once 'Recommended.php';
    require_once 'SetData.php';
    require_once 'MakeQuery.php';    
//---------------------------------------------------------------------------------------------------------------------------
    class DB_MANAGEMENT extends RECOMMENDED
    {
        public $SetData;
        public $MakeQuery;
        public $Connection = NULL;
        const DB_HOST     = 'localhost';
        const DB_USERNAME = 'phpmyadmin';
        const DB_PASSWORD = '0016157982';
        const DB_NAME     = 'ebanzha';
//---------------------------------------------------------------------------------------------------------------------------
        public function __construct()
        {
            $this->SetData     = new SET_DATA;
            $this->MakeQuery   = new MAKE_QUERY;
            if ($this->Connection == NULL) 
            {
                try
                {
                    @session_start();
                    $Host         = self::DB_HOST;
                    $Username     = self::DB_USERNAME;
                    $Password     = self::DB_PASSWORD;
                    $Name         = self::DB_NAME;
                    $DNS          = "mysql:host={$Host};dbname={$Name}";
                    $this->Connection = new PDO($DNS , $Username , $Password);
                    $this->Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->Connection->exec("SET NAMES utf8");    
                } 
                catch (PDOException $Exception) 
                {
                     $Exception->getMessage();    
                }
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function GetConnection()
        {
            return $this->Connection;
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------