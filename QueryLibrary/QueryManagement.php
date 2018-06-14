<?php
//---------------------------------------------------------------------------------------------------------------------------
    require 'DBManagement.php';
//---------------------------------------------------------------------------------------------------------------------------
    class QUERY_MANAGEMENT extends DB_MANAGEMENT
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function IsTableExist($TableName)
        {
            $Temp = $this->GetConnection()->prepare("SHOW TABLES LIKE '" . $TableName . "'");
            $Temp->execute();
            if($Result = $Temp->fetchAll(PDO::FETCH_ASSOC))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function IsColumnExist($TableName , $ColumnName)
        {
            $ColumnsList = $this->GetColumnsListOfTable($TableName);
            if($this->IsFullArray($ColumnsList))
            {
                if($this->IsInArray($ColumnName , $ColumnsList))
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }
        }        
//---------------------------------------------------------------------------------------------------------------------------
        public function GetNumberOfRows($TableName)
        {
            $Temp = $this->GetConnection()->prepare("SHOW TABLE STATUS LIKE '" . $TableName . "'");
            $Temp->execute();
            $TableStatus = $Temp->fetchAll(PDO::FETCH_ASSOC);
            $NumberOfRows = $TableStatus['Rows'];
            return $NumberOfRows;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function GetColumnsListOfTable($TableName)
        {
            $Temp = $this->GetConnection()->prepare('DESCRIBE ' . $TableName);
            $Temp->execute();
            $Columns = $Temp->fetchAll(PDO::FETCH_COLUMN);
            return $Columns;
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------