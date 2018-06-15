<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
    <script type="text/javascript">
//------------------------------------------------------------------------------------------------------------------        
	   var DataDelete = {
                QueryName  : 'Delete',
                TableName  : 'ExampleTableName',
                WhereAND   : {
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
//------------------------------------------------------------------------------------------------------------------
        var DataInsert = {
                        QueryName  : 'Insert',
                        TableName  : 'ExampleTableName',
                        Columns    :{
                                        ExampleColumnName1 : 'ExampleColumnValue1', 
                                        ExampleColumnName2 : 'ExampleColumnValue2', 
                                        ExampleColumnName3 : 'ExampleColumnValue3', 
                                    },
                    }; 
//------------------------------------------------------------------------------------------------------------------
        var DataUpdate = {
                        QueryName  : 'Update',
                        TableName  : 'ExampleTableName',
                        Set        :{
                                        ExampleColumnName1 : 'ExampleColumnValue1', 
                                        ExampleColumnName2 : 'ExampleColumnValue2', 
                                        ExampleColumnName3 : 'ExampleColumnValue3',                                         
                                    },
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
//------------------------------------------------------------------------------------------------------------------
        var DataSelect = {
                        QueryName  : 'Select',
                        TableName  : 'ExampleTableName',
                        Sum        : 'ExampleColumnName',
                        Max        : 'ExampleColumnName',
                        Min        : 'ExampleColumnName',
                        Count      : 'ExampleColumnName',
                        ColumnList :[
                                        'ExampleColumnName1' ,
                                        'ExampleColumnName2' ,
                                        'ExampleColumnName3' ,
                                        'ExampleColumnName4' ,
                                        'ExampleColumnName5' ,
                                    ],
                        GroupBy    :[
                                        'ExampleColumnName1',
                                        'ExampleColumnName2',
                                        'ExampleColumnName3',
                                        'ExampleColumnName4',
                                        'ExampleColumnName5',
                                    ],
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
//------------------------------------------------------------------------------------------------------------------           
        var jsonDataDelete = JSON.stringify(DataDelete);
        var jsonDataInsert = JSON.stringify(DataInsert);
        var jsonDataUpdate = JSON.stringify(DataUpdate);
        var jsonDataSelect = JSON.stringify(DataSelect);
//------------------------------------------------------------------------------------------------------------------                   
        $.ajax(
        {
            type  : "POST",
            url   : "QueryController.php",
            data  : {Data : jsonDataDelete}, 
            cache : false,
            success: function(DeleteResult)
            {
                console.log('DeleteResult : ' + DeleteResult + '\n');
            }
        });    
//------------------------------------------------------------------------------------------------------------------                   
        $.ajax(
        {
            type  : "POST",
            url   : "QueryController.php",
            data  : {Data : jsonDataInsert}, 
            cache : false,
            success: function(InsertResult)
            {
                console.log('InsertResult : ' + InsertResult + '\n');
            }
        });   
//------------------------------------------------------------------------------------------------------------------                   
        $.ajax(
        {
            type  : "POST",
            url   : "QueryController.php",
            data  : {Data : jsonDataUpdate}, 
            cache : false,
            success: function(UpdateResult)
            {
                console.log('UpdateResult : ' + UpdateResult + '\n');
            }
        });   
//------------------------------------------------------------------------------------------------------------------                   
        $.ajax(
        {
            type  : "POST",
            url   : "QueryController.php",
            data  : {Data : jsonDataSelect}, 
            cache : false,
            success: function(SelectResult)
            {
                console.log('SelectResult : ' + SelectResult + '\n');
            }
        });   
//------------------------------------------------------------------------------------------------------------------
    </script>
</body>
</html>
