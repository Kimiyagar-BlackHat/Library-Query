<?php
//---------------------------------------------------------------------------------------------------------------------------
    require_once 'Common.php';
//---------------------------------------------------------------------------------------------------------------------------
    class INSERT extends COMMON
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function GetData($Data)
        {
            $Output = array();
            $RequireArray = array('TableName' , 'Columns');
            if($this->IsSetRequiredData($RequireArray , $Data))
            {
//..........................................................................................................................                
                $Output['TableName']   = $this->ManageTableName($Data['TableName']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                $Output['Columns']     = $this->ManageSingleDimensionalArray($Data['TableName'] , $this->SetJsonDecodeArray($Data['Columns']));
//..........................................................................................................................
                if($this->IsNull($Output['TableName']) || !$this->IsFullArray($Output['Columns']))
                { 
                    $Output = $this->SetEmptyArray($Output);    
                }
            }
            return $Output;    
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function Process($Data)
        {
            $Make = array();
            if($this->IsFullArray($Data))
            {
                $Make['ExecuteData']     = $this->MakeExecuteDataArray($Data['Columns']);
                $ColumnNameString        = $this->MakeColumnString($Data['Columns'] , 'Name');
                $ColumnValueString       = $this->MakeColumnString($Data['Columns'] , 'Value');
                $SetDataArray            = $this->SetData->Insert($Data['TableName'] , $ColumnNameString , $ColumnValueString , $Make['ExecuteData']);
                $Make['Query']           = $this->MakeQuery->Insert($SetDataArray);
            }
            return $Make;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function SetData($Make)
        {
            return $this->ExecuteData($Make);
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------