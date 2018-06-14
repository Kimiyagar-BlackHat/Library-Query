<?php
//---------------------------------------------------------------------------------------------------------------------------
    require 'Common.php';
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
                $SetDataArray           = parent::SetData->Delete($Data['TableName'] , $WhereString , $OrderByString , $LimitNumberRows , $ExecuteData);
                $Make['Query']          = parent::MakeQuery->Delete($SetDataArray);
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
?>