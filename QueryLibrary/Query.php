<?php
//---------------------------------------------------------------------------------------------------------------------------
    require 'Recommended.php';
//---------------------------------------------------------------------------------------------------------------------------
    class QUERY extends RECOMMENDED
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function Insert($Data)
        {
            require 'MainInsert.php';
            $Insert = new INSERT;
            return $this->QueryHandler($Insert , $Data);
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function Delete($Data)
        {
            require 'MainDelete.php';
            $Delete = new DELETE;
            return $this->QueryHandler($Delete , $Data);
        }
//---------------------------------------------------------------------------------------------------------------------------

        public function Update($Data)
        {
            require 'MainUpdate.php';
            $Update = new UPDATE;
            return $this->QueryHandler($Update , $Data);
        }
//---------------------------------------------------------------------------------------------------------------------------

        public function Select($Data)
        {
            require 'MainSelect.php';
            $Select = new SELECT;
            return $this->QueryHandler($Select , $Data);
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function QueryHandler($Object , $Data)
        {
            $Result = FALSE;
            $Data = $Object->GetData($Data);
            if($this->IsFullArray($Data))
            {
                $Make = $Object->Process($Data);
                if($this->IsFullArray($Make))
                {
                    $Result = $Object->SetData($Make);
                }
            }            
            return $Result;
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------
?>