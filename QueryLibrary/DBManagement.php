<?php 
//---------------------------------------------------------------------------------------------------------------------------
    require 'Recommended.php';
//---------------------------------------------------------------------------------------------------------------------------
    class DB_MANAGEMENT extends RECOMMENDED
    {
        private $Connection = '';
//---------------------------------------------------------------------------------------------------------------------------
        public function __construct()
        {
            if ($this->Connection == '') 
            {
                try
                {
                    @session_start();
                    $Host         = /*DB_HOST*/;
                    $Username     = /*DB_USERNAME*/;
                    $Password     = /*DB_PASSWORD*/;
                    $Name         = /*DB_NAME*/;
                    $DNS          = "mysql:host={" . $Host . "};dbname={$Name}";
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
 ?>