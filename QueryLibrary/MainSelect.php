<?php
//---------------------------------------------------------------------------------------------------------------------------
    require 'Common.php';
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
                $Output['ColumnList'] = $this->ManageStandardArray($Data['TableName'],$this->SetJsonDecodeArray($Data['ColumnList']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -                
                if($this->IsSetData($Data['Sum']))
                    $Output['AggregateFunction']['Sum'] = $this->ManageAggregateFunction($Data['TableName'],$Data['Sum']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['Max']))
                    $Output['AggregateFunction']['Max'] = $this->ManageAggregateFunction($Data['TableName'],$Data['Max']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['Min']))
                    $Output['AggregateFunction']['Min'] = $this->ManageAggregateFunction($Data['TableName'],$Data['Min']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['Count']))
                    $Output['AggregateFunction']['Count'] = $this->ManageAggregateFunction($Data['TableName'],$Data['Count']));
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                if($this->IsSetData($Data['GroupBy']))
                    $Output['GroupBy'] = $this->ManageStandardArray($Data['TableName'],$this->SetJsonDecodeArray($Data['GroupBy']));
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
                $SetDataArray            = $this->SetData->Select($Data['TableName'] , $ColumnListString , $WhereString , $GroupByString , $OrderByString , $LimitNumberRows , $AggregateFunctionArray , $ExecuteData);
                $Make['Query']           = $this->MakeQuery->Select($SetDataArray);
            }
            return $Make
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