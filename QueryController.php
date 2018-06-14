<?php
    include 'QueryLibrary/Query.php';
    $Query = new QUERY;
    if(isset($_POST['Data']))
    {
        $Data = json_decode($_POST['Data'] , TRUE);
        if(isset($Data['QueryName']))
        {
            $QueryName = $Data['QueryName'];
            switch ($QueryName) 
            {
                case 'insert':
                case 'Insert':
                    if($Query->Insert($Data))    echo 'SUCCESS';
                    else                         echo 'ERROR';
                    return;
                case 'delete':
                case 'Delete':
                    if($Query->Delete($Data))    echo 'SUCCESS';
                    else                         echo 'ERROR';
                    return;
                case 'update':
                case 'Update':
                    if($Query->Update($Data))    echo 'SUCCESS';
                    else                         echo 'ERROR';
                    return;
                case 'select':
                case 'Select':
                    if($Query->Select($Data))    echo 'SUCCESS';
                    else                         echo 'ERROR';
                    return;                        
                default:
                    echo 'ERROR';
                    return;
            }
        }
        else
        {
            echo 'ERROR';
            return;
        }
    }
    else
    {
        echo 'ERROR';
        return;
    }
?>
