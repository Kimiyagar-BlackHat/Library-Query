# Library-Query
A library for dynamic query By {- kimiyagar - BlackHat -}
***********************************************************************************************************************************
#FIRST TO DO
***********************************************************************************************************************************
    In QueryLibrary/DBManagement.php file add your database detail :
***********************************************************************************************************************************
        const DB_HOST     = 'Your_DB_HOST';
        const DB_USERNAME = 'Your_DB_USERNAME';
        const DB_PASSWORD = 'Your_DB_PASSWORD';
        const DB_NAME     = 'Your_DB_NAME'; 
***********************************************************************************************************************************
#EXAMPLE FOR POST FROM AJAX

***********************************************************************************************************************************
||                                                         DELETE                                                                ||
***********************************************************************************************************************************
    Posted Values From Ajax :
        TableName             => A Value 
        WhereAND              => Array 
        WhereOR               => Array
        OrderBy               => Array
        Limit                 => An Int
----------------------------------------------------------------------------------------------------------------------------------
    Example JS Code :
        var Data = {
                        QueryName  : 'Delete',
                        TableName  : 'ExampleTableName',
                        WhereAND   :{
                                        Count1 :{
                                                    Name         : 'ANDExampleColumnName1',
                                                    Operator     : 'ANDExampleOperator1',
                                                    Value        : 'ANDExampleColumnValue1',
                                                }, 
                                        Count2 :{
                                                    Name         : 'ANDExampleColumnName2',
                                                    Operator     : 'ANDExampleOperator2',
                                                    Value        : 'ANDExampleColumnValue2',
                                                },
                                        Count3 :{
                                                    Name         : 'ANDExampleColumnName3',
                                                    Operator     : 'ANDExampleOperator3',
                                                    Value        : 'ANDExampleColumnValue3',
                                                },      
                                    },
                        WhereOR    :{
                                        Count1 :{
                                                    Name         : 'ANDExampleColumnName1',
                                                    Operator     : 'ANDExampleOperator1',
                                                    Value        : 'ANDExampleColumnValue1',
                                                }, 
                                        Count2 :{
                                                    Name         : 'ANDExampleColumnName2',
                                                    Operator     : 'ANDExampleOperator2',
                                                    Value        : 'ANDExampleColumnValue2',
                                                },
                                        Count3 :{
                                                    Name         : 'ANDExampleColumnName3',
                                                    Operator     : 'ANDExampleOperator3',
                                                    Value        : 'ANDExampleColumnValue3',
                                                },     
                                    },
                        OrderBy    :{
                                        ExampleColumnName1 : 'DESC',
                                        ExampleColumnName2 : 'ASC',
                                    },
                        LimitNumberRows : 5 ,   
                    };
***********************************************************************************************************************************
||                                                         INSERT                                                                ||
***********************************************************************************************************************************
    Posted Values From Ajax :
        TableName             => A Value 
        ColumnsArray          => Array 
----------------------------------------------------------------------------------------------------------------------------------
    Example JS Code :
        var Data = {
                        QueryName  : 'Insert',
                        TableName  : 'ExampleTableName',
                        Columns    :{
                                        ExampleColumnName1 : 'ExampleColumnValue1', 
                                        ExampleColumnName2 : 'ExampleColumnValue2', 
                                        ExampleColumnName3 : 'ExampleColumnValue3', 
                                    }
                    };
***********************************************************************************************************************************
||                                                         UPDATE                                                                ||
***********************************************************************************************************************************
    Posted Values From Ajax :
        TableName             => A Value
        Set                   => Array  
        WhereAND              => Array 
        WhereOR               => Array
        OrderBy               => Array
        LimitNumberRows       => An Int
----------------------------------------------------------------------------------------------------------------------------------
    Example JS Code :
        var Data = {
                        QueryName  : 'Update',
                        TableName  : 'ExampleTableName',
                        Set        :{
                                        ExampleColumnName1 : 'ExampleColumnValue1', 
                                        ExampleColumnName2 : 'ExampleColumnValue2', 
                                        ExampleColumnName3 : 'ExampleColumnValue3',                                         
                                    }
                        WhereAND   :{
                                        Count1 :{
                                                    Name         : 'ANDExampleColumnName1',
                                                    Operator     : 'ANDExampleOperator1',
                                                    Value        : 'ANDExampleColumnValue1',
                                                }, 
                                        Count2 :{
                                                    Name         : 'ANDExampleColumnName2',
                                                    Operator     : 'ANDExampleOperator2',
                                                    Value        : 'ANDExampleColumnValue2',
                                                },
                                        Count3 :{
                                                    Name         : 'ANDExampleColumnName3',
                                                    Operator     : 'ANDExampleOperator3',
                                                    Value        : 'ANDExampleColumnValue3',
                                                },      
                                    },
                        WhereOR    :{
                                        Count1 :{
                                                    Name         : 'ANDExampleColumnName1',
                                                    Operator     : 'ANDExampleOperator1',
                                                    Value        : 'ANDExampleColumnValue1',
                                                }, 
                                        Count2 :{
                                                    Name         : 'ANDExampleColumnName2',
                                                    Operator     : 'ANDExampleOperator2',
                                                    Value        : 'ANDExampleColumnValue2',
                                                },
                                        Count3 :{
                                                    Name         : 'ANDExampleColumnName3',
                                                    Operator     : 'ANDExampleOperator3',
                                                    Value        : 'ANDExampleColumnValue3',
                                                },     
                                    },
                        OrderBy    :{
                                        ExampleColumnName1 : 'DESC',
                                        ExampleColumnName2 : 'ASC',
                                    },
                        LimitNumberRows : 5 ,   
                    };
***********************************************************************************************************************************
||                                                         SELECT                                                                ||
***********************************************************************************************************************************
    Posted Values From Ajax :
        TableName           => A Value
        Sum                 => A Value
        Max                 => A Value
        Min                 => A Value
        Count               => A Value
        ColumnList          => Array
        GroupBy             => Array
        WhereAND            => Array 
        WhereOR             => Array
        OrderBy             => Array
        LimitNumberRows     => An Int
----------------------------------------------------------------------------------------------------------------------------------
    Example JS Code :
        var Data = {
                        QueryName  : 'Select',
                        TableName  : 'ExampleTableName',
                        Sum        : 'ExampleColumnName',
                        Max        : 'ExampleColumnName',
                        Min        : 'ExampleColumnName',
                        Count      : 'ExampleColumnName',
                        ColumnList :{
                                        'ExampleColumnName1' ,
                                        'ExampleColumnName2' ,
                                        'ExampleColumnName3' ,
                                        'ExampleColumnName4' ,
                                        'ExampleColumnName5' ,
                                    }
                        GroupBy    :{
                                        'ExampleColumnName1',
                                        'ExampleColumnName2',
                                        'ExampleColumnName3',
                                        'ExampleColumnName4',
                                        'ExampleColumnName5',
                                    }
                        WhereAND   :{
                                        Count1 :{
                                                    Name         : 'ANDExampleColumnName1',
                                                    Operator     : 'ANDExampleOperator1',
                                                    Value        : 'ANDExampleColumnValue1',
                                                }, 
                                        Count2 :{
                                                    Name         : 'ANDExampleColumnName2',
                                                    Operator     : 'ANDExampleOperator2',
                                                    Value        : 'ANDExampleColumnValue2',
                                                },
                                        Count3 :{
                                                    Name         : 'ANDExampleColumnName3',
                                                    Operator     : 'ANDExampleOperator3',
                                                    Value        : 'ANDExampleColumnValue3',
                                                },      
                                    },
                        WhereOR    :{
                                        Count1 :{
                                                    Name         : 'ANDExampleColumnName1',
                                                    Operator     : 'ANDExampleOperator1',
                                                    Value        : 'ANDExampleColumnValue1',
                                                }, 
                                        Count2 :{
                                                    Name         : 'ANDExampleColumnName2',
                                                    Operator     : 'ANDExampleOperator2',
                                                    Value        : 'ANDExampleColumnValue2',
                                                },
                                        Count3 :{
                                                    Name         : 'ANDExampleColumnName3',
                                                    Operator     : 'ANDExampleOperator3',
                                                    Value        : 'ANDExampleColumnValue3',
                                                },     
                                    },
                        OrderBy    :{
                                        ExampleColumnName1 : 'DESC',
                                        ExampleColumnName2 : 'ASC',
                                    },
                        LimitNumberRows : 5 ,
                    };    
***********************************************************************************************************************************
||                                                         COMMON                                                                ||
***********************************************************************************************************************************
        var jsonData = JSON.stringify(Data);    
        $.ajax(
        {
            type  : "POST",
            url   : "QueryController.php",
            data  : {Data : jsonData}, 
            cache : false,
            success: function(Result)
            {
                /* Result is 'SUCCESS' or 'ERROR' */ 
                /* Handle Result */
            }
        });  
