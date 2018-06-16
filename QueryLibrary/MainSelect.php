<?php
//---------------------------------------------------------------------------------------------------------------------------
    require_once 'Common.php';
//---------------------------------------------------------------------------------------------------------------------------
    class SELECT extends COMMON
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function GetData($Data)
        {
            $Output = array();
            $RequireArray = array('TableName' , 'ColumnList' , 'WhereAND' , 'WhereOR');
            if($this->IsSetRequiredData($RequireArray , $Data))
            {
//..........................................................................................................................
                $Output['TableName'] = $this->ManageTableName($Data['TableName']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -                
                $Output['ColumnList'] = $this->ManageStandardArray($Output['TableName'],$this->SetJsonEncodeArray($Data['ColumnList']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -                
                if($this->IsSetData($Data['Sum']))
                    $Output['AggregateFunction']['Sum'] = $this->ManageAggregateFunction($Output['TableName'],$Data['Sum']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['Max']))
                    $Output['AggregateFunction']['Max'] = $this->ManageAggregateFunction($Output['TableName'],$Data['Max']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['Min']))
                    $Output['AggregateFunction']['Min'] = $this->ManageAggregateFunction($Output['TableName'],$Data['Min']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['Count']))
                    $Output['AggregateFunction']['Count'] = $this->ManageAggregateFunction($Output['TableName'],$Data['Count']);
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['GroupBy']))
                    $Output['GroupBy'] = $this->ManageStandardArray($Output['TableName'],$this->SetJsonEncodeArray($Data['GroupBy']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -                
                if($this->IsSetData($Data['WhereAND']))
                    $Output['WhereAND'] = $this->ManageMultiDimensionalArray($Output['TableName'],$this->SetJsonEncodeArray($Data['WhereAND']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -                
                if($this->IsSetData($Data['WhereOR']))
                    $Output['WhereOR'] = $this->ManageMultiDimensionalArray($Output['TableName'],$this->SetJsonEncodeArray($Data['WhereOR']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -                
                if($this->IsSetData($Data['OrderBy']))
                    $Output['OrderBy'] = $this->ManageSingleDimensionalArray($Output['TableName'],$this->SetJsonEncodeArray($Data['OrderBy']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -                
                if($this->IsSetData($Data['LimitNumberRows']))
                    $Output['LimitNumberRows'] = $this->ManageLimitNumberRows($Output['TableName'] , $Data['LimitNumberRows']);
//..........................................................................................................................
                if((!$this->IsFullArray($Output['WhereAND']) && !$this->IsFullArray($Output['WhereOR'])) || $this->IsNull($Output['TableName']) || !$this->IsFullArray($Output['ColumnList']))
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
                $Make['ExecuteData']     = $this->MakeExecuteDataArray(NULL , $Data['WhereAND'] , $Data['WhereOR']);
                $ColumnListString        = $this->MakeColumnListString($Data['ColumnList']);
                $WhereString             = $this->MakeWhereString($Data['WhereAND'] , $Data['WhereOR'] , 'AND');
                $GroupByString           = $this->MakeColumnListString($Data['GroupBy']);
                $OrderByString           = $this->MakeOrderByString($Data['OrderBy']);
                $LimitNumberRows         = $this->MakeLimitNubmerRowsString($Data['LimitNumberRows']);    
                $AggregateFunctionArray  = $this->MakeAggregateFunctionStringArray($Data['AggregateFunction']);
                $SetDataArray            = $this->SetData->Select($Data['TableName'] , $ColumnListString , $WhereString , $GroupByString , $OrderByString , $LimitNumberRows , $AggregateFunctionArray , $Make['ExecuteData']);
                $Make['Query']           = $this->MakeQuery->Select($SetDataArray);
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