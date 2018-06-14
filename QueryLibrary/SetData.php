<?php
//---------------------------------------------------------------------------------------------------------------------------
    class SET_DATA
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function Insert($TableName , $ColumnNameString , $ColumnValueString , $ExecuteData)
        {
            $SetDataArray = array(
                                    'TableName'               => $TableName,
                                    'ColumnNameString'        => $ColumnNameString,
                                    'ColumnValueString'       => $ColumnValueString,
                                    'ExecuteData'             => $ExecuteData
                                );
            return $SetDataArray;
        }    
//---------------------------------------------------------------------------------------------------------------------------
        public function Delete($TableName , $WhereString , $OrderByString , $LimitNumberRows , $ExecuteData)
        {
            $SetDataArray = array(
                                    'TableName'               => $TableName,
                                    'WhereString'             => $WhereString,
                                    'OrderByString'           => $OrderByString,
                                    'LimitNumberRows'         => $LimitNumberRows,
                                    'ExecuteData'             => $ExecuteData
                                );
            return $SetDataArray;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function Update($TableName , $SetString , $WhereString , $OrderByString , $LimitNumberRows , $ExecuteData)
        {
            $SetDataArray = array(
                                    'TableName'               => $TableName,
                                    'SetString'               => $SetString,
                                    'WhereString'             => $WhereString,
                                    'OrderByString'           => $OrderByString,
                                    'LimitNumberRows'         => $LimitNumberRows,
                                    'ExecuteData'             => $ExecuteData
                                );
            return $SetDataArray;
        }    
//---------------------------------------------------------------------------------------------------------------------------
        public function Select($TableName , $ColumnListString , $WhereString , $GroupByString , $OrderByString , $LimitNumberRows , $AggregateFunctionArray , $Params)
        {
            $SetDataArray = array(
                                    'TableName'               => $TableName,
                                    'ColumnListString'        => $ColumnListString,
                                    'WhereString'             => $WhereString,
                                    'GroupByString'           => $GroupByString,
                                    'OrderByString'           => $OrderByString,
                                    'LimitNumberRows'         => $LimitNumberRows,
                                    'AggregateFunctionArray'  => $AggregateFunctionArray,
                                    'ExecuteData'             => $ExecuteData
                                );
            return $SetDataArray;
        }        
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------
?>