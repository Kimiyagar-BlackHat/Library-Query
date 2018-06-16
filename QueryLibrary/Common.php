<?php
//---------------------------------------------------------------------------------------------------------------------------
    require_once 'DataManagement.php';
//---------------------------------------------------------------------------------------------------------------------------
    class COMMON extends DATA_MANAGEMENT
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function MakeExecuteDataArray($ColumnsArray=array() , $WhereArrayAND=array() , $WhereArrayOR=array() , $SetArray=array())
        {
            $ExecuteDataArray = array();
            $InputData  = array(
                                    'ColumnsArray'    => $ColumnsArray,
                                    'WhereArrayAND'   => $WhereArrayAND,
                                    'WhereArrayOR'    => $WhereArrayOR,
                                    'SetArray'        => $SetArray
                                );
            foreach ($InputData as $ArrayName => $ArrayData) 
            {
                if($this->IsFullArray($ArrayData))
                {
                    $NumberOfDimensionalArray = $this->CountNumberOfDimensionalArray($ArrayData);
                    if($NumberOfDimensionalArray == 1)
                    {
                        foreach ($ArrayData as $ColumnName => $ColumnValue) 
                        {
                            if(!$this->IsSetData($ExecuteDataArray[$ColumnName]))
                            {
                                $ExecuteDataArray[':' . $ColumnName] = $ColumnValue;
                            }
                        }
                    }
                    elseif($NumberOfDimensionalArray == 2)
                    {
                        foreach ($ArrayData as $Counter => $Data) 
                        {
                            if(!$this->IsSetData($ExecuteDataArray[$Data['Name']]))
                            {
                                $ExecuteDataArray[':' . $Data['Name']] = $Data['Value'];
                            }
                        }
                    }
                }
            }
            return $ExecuteDataArray;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function MakeColumnString($ColumnsArray , $Type)
        {
            $ColumnString = NULL;
            $Bind = '';
            if($Type == 'Value')
            {
                $Bind = ':';
            }
            foreach ($ColumnsArray as $ColumnName => $ColumnValue) 
            {
                $ColumnString .= $Bind . $ColumnName . ' , ';
            }
            if($this->IsNotNull($ColumnString))
            {
                $ColumnString = $this->RemoveFromString($ColumnString , ' , ' , 'End');
            }
            return $ColumnString;
        }
//---------------------------------------------------------------------------------------------------------------------------        
        public function MakeSetString($SetArray)
        {
            $SetString = NULL;
            if($this->IsFullArray($SetArray))
            {
                foreach ($SetArray as $ColumnName => $NewValue) 
                {
                    $SetString .= $ColumnName . '=:' . $ColumnName . ' , ';
                }
                $SetString = $this->RemoveFromString($SetString , ' , ' , 'End');
            }
            return $SetString;            
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function MakeSubWhereString($WhereArray , $Clause)
        {
            $AllowedOperator = array('>','=','<','>=','<=','LIKE');
            $WhereString = NULL;
            $WhereConditionsArray = array();
            foreach ($WhereArray as $Counter => $Parameters) 
            {
                $Name         = $Parameters['Name'];
                $Operator     = $Parameters['Option'];
                foreach ($AllowedOperator as $Counter => $Sign) 
                {
                    if($Operator == $Sign)
                    {
                        $WhereConditionsArray[$Counter] = $Name . $Operator . ':' . $Name . ' ' . $Clause . ' ';
                    }
                }
            }
            foreach ($WhereConditionsArray as $Counter => $String) 
            {
                $WhereString .= $String;
            }
            if($this->IsNotNull($WhereString))
            {
                $WhereString = '( ' .  $this->RemoveFromString($WhereString , ' ' . $Clause . ' ' , 'End') . ' )';
            }
            return $WhereString;
        }
//---------------------------------------------------------------------------------------------------------------------------        
        public function MakeWhereString($WhereStringAND = NULL , $WhereStringOR = NULL , $Clause)
        {
            $Concat = NULL;
            if($this->IsNotNull($WhereStringAND) && $this->IsNotNull($WhereStringOR))
            {
                $Concat = ' ' . $Clause . ' ';
            }
            $WhereString = $WhereStringAND . $Concat . $WhereStringOR;
            return $WhereString;
        }
//---------------------------------------------------------------------------------------------------------------------------        
        public function MakeOrderByString($OrderByArray)
        {
            $ColumnName_DESC = NULL;
            $ColumnName_ASC = NULL;
            $Concat = NULL;
            if($this->IsFullArray($OrderByArray))
            {
                foreach ($OrderByArray as $ColumnName => $Option) 
                {
                    if($Option == 'ASC' && $Option == 'DESC' && $Option == '')
                    {
                        switch ($Option) 
                        {
                            case 'DESC':
                                $ColumnName_DESC .= $ColumnName . ' , ';
                                break;
                            case '':
                            case 'ASC':
                                $ColumnName_ASC .= $ColumnName . ' , ';
                                break;
                        }
                    }
                }
                if($this->IsNotNull($ColumnName_DESC))
                {
                    $ColumnName_DESC = $this->RemoveFromString($ColumnName_DESC , ' , ' , 'End') . ' DESC';
                }
                if($this->IsNotNull($ColumnName_ASC))
                {
                    $ColumnName_ASC = $this->RemoveFromString($ColumnName_ASC , ' , ' , 'End') . ' ASC';
                }
            }
            if($this->IsNotNull($ColumnName_DESC) && $this->IsNotNull($ColumnName_ASC))
            {
                $Concat = ' , ';
            }
            $OrderByString =  $ColumnName_DESC . $Concat . $ColumnName_ASC;
            return $OrderByString;
        }
//---------------------------------------------------------------------------------------------------------------------------        
        public function MakeLimitNubmerRowsString($LimitNubmerRowsString)
        {
            return $LimitNubmerRowsString;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function MakeAggregateFunctionStringArray($AggregateFunction)
        {
            $AggregateFunctionStringArray = array();
            foreach ($AggregateFunction as $FunctionName => $ColumnName) 
            {
                $UpperCaseFunctionName = $this->ToUpperCase($FunctionName);    
                $AggregateFunctionStringArray[$FunctionName] = $UpperCaseFunctionName . '(' . $ColumnName . ')';
            }
            return $AggregateFunctionStringArray;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function MakeColumnListString($ColumnListArray)
        {
            $ColumnString = NULL;
            foreach ($ColumnListArray as $ColumnName) 
            {
                $ColumnString .= $ColumnName . ' , ';
            }
            if($this->IsNotNull($ColumnString))
            {
                $ColumnString = $this->RemoveFromString($ColumnString , ' , ' , 'End');
            }
            return $ColumnString;    
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function ExecuteData($Make)
        {
            $Result = TRUE;
            $Temp = $this->GetConnection()->prepare($Make['Query']);
            $Temp->execute($Make['ExecuteData']);
            if($Make['QueryName'] == 'Select')
            {
                $Result = $Temp->fetchAll(PDO::FETCH_ASSOC);
            }
            return $Result;
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------