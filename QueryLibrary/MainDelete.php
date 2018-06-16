<?php
//---------------------------------------------------------------------------------------------------------------------------
    require_once 'Common.php';
//---------------------------------------------------------------------------------------------------------------------------
    class DELETE extends COMMON
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function GetData($Data)
        {
            $Output = array();
            $RequireArray = array('TableName' , 'WhereAND' , 'WhereOR');
            if($this->IsSetRequiredData($RequireArray , $Data))
            {
//..........................................................................................................................
                $Output['TableName'] = $this->ManageTableName($Data['TableName']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsFullArray($Data['WhereAND']))
                    $Output['WhereAND'] = $this->ManageMultiDimensionalArray($Output['TableName'],$Data['WhereAND']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsFullArray($Data['WhereOR']))
                    $Output['WhereOR'] = $this->ManageMultiDimensionalArray($Output['TableName'],$Data['WhereOR']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsFullArray($Data['OrderBy']))
                    $Output['OrderBy'] = $this->ManageSingleDimensionalArray($Output['TableName'],$Data['OrderBy']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['LimitNumberRows']))
                    $Output['LimitNumberRows'] = $this->ManageLimitNumberRows($Output['TableName'] , $Data['LimitNumberRows']);
//..........................................................................................................................
                if((!$this->IsFullArray($Output['WhereAND']) && !$this->IsFullArray($Output['WhereOR'])) || $this->IsNull($Output['TableName']))
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
                $Make['ExecuteData']    = $this->MakeExecuteDataArray(NULL , $Data['WhereAND'] , $Data['WhereOR']);
                $WhereStringAND         = $this->MakeSubWhereString($Data['WhereAND'] , 'AND');
                $WhereStringOR          = $this->MakeSubWhereString($Data['WhereOR'] , 'OR');
                $WhereString            = $this->MakeWhereString($WhereStringAND , $WhereStringOR , 'AND');
                $OrderByString          = $this->MakeOrderByString($Data['OrderBy']);
                $LimitNumberRows        = $this->MakeLimitNubmerRowsString($Data['LimitNumberRows']);
                $SetDataArray           = $this->SetData->Delete($Data['TableName'] , $WhereString , $OrderByString , $LimitNumberRows , $Make['ExecuteData']);
                $Make['Query']          = $this->MakeQuery->Delete($SetDataArray);
            }
            return $Make;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function SetData($Make , $QueryName)
        {
            $Make['QueryName'] = $QueryName;
            return $this->ExecuteData($Make);
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------