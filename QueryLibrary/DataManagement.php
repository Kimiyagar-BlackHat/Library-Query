<?php
//---------------------------------------------------------------------------------------------------------------------------
    require 'QueryManagement.php';
//---------------------------------------------------------------------------------------------------------------------------
    class DATA_MANAGEMENT extends QUERY_MANAGEMENT
    {
//---------------------------------------------------------------------------------------------------------------------------        
        public function IsSetRequiredData($RequiredArray , $Data)
        {
            foreach ($RequireValue as $Count => $Value) 
            {
                if($Value == 'WhereAND' || $Value == 'WhereOR')
                {

                }

                if(!$this->IsSetData($Data[$Value]))
                {
                    return FALSE;
                }
            }
            return TRUE;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function CheckColumnList($TableName)
        {
            if($this->IsFullArray($this->GetColumnsListOfTable($TableName)))
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function ManageTableName($TableName)
        {
            if(!$this->IsSetData($TableName) || !$this->IsTableExist($TableName))
            {
                $TableName = NULL;
            }
            return $TableName;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function CountNumberOfDimensionalArray($InputArray = array())
        {
            foreach ($InputArray as $Key => $Value) 
            {
                if($this->IsArray($Value))
                {
                    $Count = 2;
                }
                else
                {
                    $Count = 1;
                }
            }
            return $Count;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function ManageStandardArray($TableName , $InputArray)
        {
            $OutputArray = array();
            if($this->IsFullArray($InputArray) && $this->CheckColumnList($TableName))
            {
                foreach ($InputArray as $Count => $ColumnName) 
                {
                    if($this->IsSetData($ColumnName) && $this->IsColumnExist($TableName , $ColumnName))
                    {
                        $OutputArray[$Count] = $ColumnName;
                    }
                }
            }
            return $OutputArray;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function ManageSingleDimensionalArray($TableName , $InputArray)
        {
            $OutputArray = array();
            if($this->IsFullArray($InputArray) && $this->CheckColumnList($TableName))
            {
                foreach ($InputArray as $Name => $Value)
                {
                    if($this->IsSetData($Name) && $this->IsSetData($Value) && $this->IsColumnExist($TableName , $Name))
                    {
                        $OutputArray[$Name] = $Value;
                    }
                }
            }
            return $OutputArray;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function ManageMultiDimensionalArray($TableName , $InputArray)
        {
            $OutputArray = array();
            if($this->IsFullArray($InputArray) && $this->CheckColumnList($TableName))
            {
                foreach ($InputArray as $Data) 
                {
                    if($this->IsFullArray($Data))
                    {
                        if($this->IsSetData($Data['Name']) && $this->IsColumnExist($TableName,$Data['Name']))
                        {
                            if($this->IsSetData($Data['Option']) && $this->IsSetData($Data['Value'])) 
                            {
                                $OutputArray[$Data]['Name']     = $Data['Name'];
                                $OutputArray[$Data]['Option']   = $Data['Option'];
                                $OutputArray[$Data]['Value']    = $Data['Value'];
                            }
                        }
                    }
                }
            }
            return $OutputArray;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function ManageAggregateFunction($TableName , $Function)
        {
            $OutputFunction = NULL;
            if($this->IsSetData($Function) && $this->IsColumnExist($TableName,$Function))
            {
                $OutputFunction = $Function;
            }
                return $OutputFunction;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function ManageLimitNumberRows($TableName , $LimitNumberRows)
        {
            $MaxLimitNumberRows = $this->GetNumberOfRows($TableName);
            if(!$this->IsInteger($LimitNumberRows) || $LimitNumberRows > $MaxLimitNumberRows)
            {
                $LimitNumberRows = NULL;
               }
               return $LimitNumberRows;
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------
?>