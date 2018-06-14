<?php
//---------------------------------------------------------------------------------------------------------------------------
    class RECOMMENDED
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function ToUpperCase($String)
        {
            return strtoupper($String);
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function RemoveFromString($String , $Removable , $Position)
        {
            if($Position == 'End')
            {
                return rtrim($String , $Removable);
            }
            elseif($Position == 'Begin')
            {
                return ltrim($String , $Removable);    
            }
            else
            {
                return NULL;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------    
        public function IsNull($Variable)
        {
            if($Variable == NULL)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function IsNotNull($Variable)
        {
            if($Variable != NULL)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function IsInteger($Variable)
        {
            if(is_integer($Variable))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function IsInArray($InputArray , $Search)
        {
            if(in_array($InputArray, $Search))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function IsArray($InputArray)
        {
            if(is_array($InputArray))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function IsFullArray($InputArray)
        {
            if(!$this->IsArray($InputArray) || empty($InputArray))
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function IsSetData($Variable)
        {
            if(isset($Variable) && $this->IsNotNull($Variable) && $Variable!='')
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function SetEmptyArray($InputArray)
        {
            if($this->IsFullArray($InputArray))
            {
                $InputArray = unset($InputArray);
            }
            return $InputArray;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function CheckNumberDimensionalArray($InputArray)
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
        public function SetJsonDecodeArray($InputArray)
        {
            $Output = array();
            if($this->IsFullArray($InputArray))
            {
                $Output = json_decode($InputArray , TRUE);
            }
            return $Output;
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function SetJsonEncodeArray($InputArray)
        {
            $Output = array();
            if($this->IsFullArray($InputArray))
            {
                $Output = json_encode($InputArray , TRUE);
            }
            return $Output;            
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------
?>