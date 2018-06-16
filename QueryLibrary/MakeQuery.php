<?php
//---------------------------------------------------------------------------------------------------------------------------
    class MAKE_QUERY extends RECOMMENDED
    {
//---------------------------------------------------------------------------------------------------------------------------    
        public function Insert($SetDataArray)
        {
            $InsertString         = 'INSERT INTO' .' `' . $SetDataArray['TableName']             . '` ';
            $ColumnNameString     = '( '                . $SetDataArray['ColumnNameString']      . ' ) ';
            $ColumnValueString    = 'VALUES ( '         . $SetDataArray['ColumnValueString']     . ' ) ';
            $Query                = $InsertString . $ColumnNameString . $ColumnValueString ;
            return $Query;
        }
//---------------------------------------------------------------------------------------------------------------------------    
        public function Delete($SetDataArray)
        {
            $DeleteString         = 'DELETE FROM' .' `' . $SetDataArray['TableName']             . '` ';
            $WhereString          = 'WHERE '            . $SetDataArray['WhereString']           . ' ';
            $OrderByString        = NULL;
            $LimitString          = NULL;            
            if($this->IsNotNull($SetDataArray['OrderByString']))
            {
                $OrderByString    = 'ORDER BY '         . $SetDataArray['OrderByString']         . ' ';
            }
            if($this->IsNotNull($SetDataArray['LimitNumberRows']))
            {
                $LimitString      = 'LIMIT '            . $SetDataArray['LimitNumberRows']       . ' ';
            }
            $Query = $DeleteString . $WhereString . $OrderByString . $LimitString ;
            return $Query;
        }    
//---------------------------------------------------------------------------------------------------------------------------    
        public function Update($SetDataArray)
        {
            $UpdateString         = 'UPDATE `'          . $SetDataArray['TableName']             . '` ';
            $SetString            = 'SET '              . $SetDataArray['SetString']             . ' ';            
            $WhereString          = 'WHERE '            . $SetDataArray['WhereString']           . ' ';
            $OrderByString        = NULL;
            $LimitString          = NULL;
            if($this->IsNotNull($SetDataArray['OrderByString']))
            {
                $OrderByString    = 'ORDER BY '         . $SetDataArray['OrderByString']         . ' ';
            }
            if($this->IsNotNull($SetDataArray['LimitNumberRows']))
            {
                $LimitString      = 'LIMIT '            . $SetDataArray['LimitNumberRows']       . ' ';
            }
            $Query = '"' . $UpdateString . $SetString . $WhereString . $OrderByString . $LimitString . '"';
            return $Query;
        }        
//---------------------------------------------------------------------------------------------------------------------------    
        public function Select($SetDataArray)
        {
            $SelectString        = 'SELECT '            . $SetDataArray['ColumnListString']      . ' ';
            $FromString          = 'FROM `'             . $SetDataArray['TableName']             . '` ';            
            $WhereString         = 'WHERE '             . $SetDataArray['WhereString']           . ' ';
            $OrderByString       = NULL;
            $GroupByString       = NULL;
            $LimitString         = NULL;
            $AggregateFunctionString = NULL;            
            if($this->IsNotNull($SetDataArray['OrderByString']))
            {
                $OrderByString    = 'ORDER BY '         . $SetDataArray['OrderByString']         . ' ';
            }
            if($this->IsNotNull($SetDataArray['GroupByString']))
            {
                $GroupByString    = 'GROUP BY '         . $SetDataArray['GroupByString']         . ' ';
            }            
            if($this->IsNotNull($SetDataArray['LimitNumberRows']))
            {
                $LimitString      = 'LIMIT '            . $SetDataArray['LimitNumberRows']       . ' ';
            }
            if($this->IsSetData($SetDataArray['AggregateFunctionArray']))
            {
                foreach ($SetDataArray['AggregateFunctionArray'] as $FunctionString) 
                {
                    if($this->IsSetData($FunctionString))
                    {
                        $AggregateFunctionString .= $FunctionString . ' , ';
                    }
                }
                $AggregateFunctionString = ' , ' . $this->RemoveFromString($AggregateFunctionString , ' , ' , 'End');
            }
            $Query = '"' . $SelectString . $AggregateFunctionString . $FromString . $WhereString . $OrderByString . $GroupByString . $LimitString . '"';
            return $Query;
        }        
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------