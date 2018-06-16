<?php
//---------------------------------------------------------------------------------------------------------------------------
    require_once 'QueryManagement.php';
//---------------------------------------------------------------------------------------------------------------------------
    class DATA_MANAGEMENT extends QUERY_MANAGEMENT
    {
//---------------------------------------------------------------------------------------------------------------------------        
        public function IsSetRequiredData($RequiredArray , $Data)
        {
            global $Where;
            $Where = 0;
            foreach ($RequiredArray as $Count => $Value) 
            {
                if($this->IsArray($Data[$Value]))
                {
                    if($Value != 'WhereOR' && $Value != 'WhereAND' && !$this->IsFullArray($Data[$Value]))
                    {
                        return FALSE;
                    }
                }
                else
                {
                    if($Value != 'WhereOR' && $Value != 'WhereAND' && !$this->IsNotNull($Data[$Value]))
                    {
                        return FALSE;
                    }
                }
            }            
            foreach ($RequiredArray as $Count => $Value)
            {
                if($Value=='WhereAND' || $Value=='WhereOR')
                {
                    if($this->IsFullArray($Data[$Value]))
                    {
                        $Where = 1;
                    }
                }
            }
            foreach ($RequiredArray as $Count => $Value) 
            {
                if($this->IsArray($Data[$Value]) && ($Value == 'WhereAND' || $Value == 'WhereOR'))
                {
                    if($Where == 0)
                    {
                        return FALSE;
                    }
                }
            }
            return TRUE;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function CheckColumnList($TableName)
        {
            if($this->IsFullArray($this->GetColumnsListOfTable($TableName)))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
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
            $Count = NULL;
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
                foreach ($InputArray as $Data => $Parameters) 
                {
                    if($this->IsFullArray($Parameters))
                    {
                        if($this->IsSetData($Parameters['Name']) && $this->IsColumnExist($TableName,$Parameters['Name']))
                        {
                            if($this->IsSetData($Parameters['Option']) && $this->IsSetData($Parameters['Value'])) 
                            {
                                    $OutputArray[$Data] = $Parameters;
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