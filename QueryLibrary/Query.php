<?php
//---------------------------------------------------------------------------------------------------------------------------
    require_once 'DataManagement.php';
//---------------------------------------------------------------------------------------------------------------------------
    class QUERY extends DATA_MANAGEMENT
    {
//---------------------------------------------------------------------------------------------------------------------------
        public function Insert($Data)
        {
            return $this->QueryHandler('Insert' , $Data);
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function Delete($Data)
        {
            return $this->QueryHandler('Delete' , $Data);
        }
//---------------------------------------------------------------------------------------------------------------------------

        public function Update($Data)
        {
            return $this->QueryHandler('Update' , $Data);
        }
//---------------------------------------------------------------------------------------------------------------------------

        public function Select($Data)
        {
            return $this->QueryHandler('Select' , $Data);
        }
//---------------------------------------------------------------------------------------------------------------------------
        public function QueryHandler($QueryName , $Data)
        {
            $Object = NULL;
            switch ($QueryName) 
            {
                case 'Insert':
                    require_once 'MainInsert.php';
                    $Object = new INSERT;
                    break;
                case 'Delete':
                    require_once 'MainDelete.php';
                    $Object = new DELETE;
                    break;
                case 'Update':
                    require_once 'MainUpdate.php';
                    $Object = new UPDATE;
                    break;
                case 'Select':
                    require_once 'MainSelect.php';
                    $Object = new SELECT;
                    break;
            }
            $Result = FALSE;
            if($this->IsNotNull($Object))
            {
                $Data = $Object->GetData($Data);
                if($this->IsFullArray($Data))
                {
                    $Make = $Object->Process($Data);
                    if($this->IsFullArray($Make))
                    {
                        $Result = $Object->SetData($Make , $QueryName);
                    }
                }   
            }         
            return $Result;
        }
//---------------------------------------------------------------------------------------------------------------------------
    }
//---------------------------------------------------------------------------------------------------------------------------