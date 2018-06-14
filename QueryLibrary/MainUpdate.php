<?php
//---------------------------------------------------------------------------------------------------------------------------
    require 'Common.php';
//---------------------------------------------------------------------------------------------------------------------------
    class UPDATE extends COMMON
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function GetData($Data)
        {
            $Output = array();
            $RequireArray = array('TableName' , 'Set' , 'WhereAND' , 'WhereOR');
            if($this->IsSetRequiredData($RequireArray , $Data))
            {
//..........................................................................................................................
                $Output['TableName'] = $this->ManageTableName($Data['TableName']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -            
                $Output['Set'] = $this->ManageSingleDimensionalArray($Data['TableName'] , $this->SetJsonDecodeArray($Data['Set']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -                    
                if($this->IsSetData($Data['WhereAND']))
                    $Output['WhereAND'] = $this->ManageMultiDimensionalArray($Data['TableName'],$this->SetJsonDecodeArray($Data['WhereAND']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -    
                if($this->IsSetData($Data['WhereOR']))
                    $Output['WhereOR'] = $this->ManageMultiDimensionalArray($Data['TableName'],$this->SetJsonDecodeArray($Data['WhereOR']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -    
                if($this->IsSetData($Data['OrderBy']))
                    $Output['OrderBy'] = $this->ManageSingleDimensionalArray($Data['TableName'],$this->SetJsonDecodeArray($Data['OrderBy']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -          
                if($this->IsSetData($Data['LimitNumberRows']))
                    $Output['LimitNumberRows'] = $this->ManageLimitNumberRows($Data['TableName'] , $Data['LimitNumberRows']);
//..........................................................................................................................    
                if((!$this->IsFullArray($Output['WhereAND']) && !$this->IsFullArray($Output['WhereOR'])) || $this->IsNull($Output['TableName']) || !$this->IsFullArray($Output['Set']))
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
                $Make['ExecuteData'] = $this->MakeExecuteDataArray(NULL , $Data['WhereAND'] , $Data['WhereOR'] , $Data['Set']);
                $SetString           = $this->MakeSetString($Data['Set']);
                $WhereStringAND      = $this->MakeSubWhereString($Data['WhereAND'] , 'AND');
                $WhereStringOR       = $this->MakeSubWhereString($Data['WhereOR'] , 'OR');
                $WhereString         = $this->MakeWhereString($WhereStringAND , $WhereStringOR , 'AND');
                $OrderByString       = $this->MakeOrderByString($Data['OrderBy']);
                $LimitNumberRows     = $this->MakeLimitNubmerRowsString($Data['LimitNumberRows']);                
                $SetDataArray        = $this->SetData->Update($Data['TableName'] , $SetString , $WhereString , $OrderByString , $LimitNumberRows , $Make['ExecuteData']);
                $Make['Query']       = $this->MakeQuery->Update($SetDataArray);
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
