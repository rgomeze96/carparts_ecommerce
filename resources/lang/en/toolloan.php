<?php

return [
    //Controller
    'controller' => [
        'created' => 'Tool Loan created successfully!',
        'updated' => 'Tool Loan updated successfully!',
        'deleted' => 'Tool Loan deleted successfully!',
    ],

    //Create form
    'create' => [
        'title' => 'Create New Tool Loan',
        'userId' => 'User ID',
        'productId' => 'Product ID',
        'depositAmount' => 'Deposit Amount Required',
        'loanDate' => 'Start date of loan',
        'returnDate' => 'Date to return tool',
        'desc' => 'Description of Loan',
        'button' => 'Create New Tool Loan',
    ],
    //Edit form
    'edit' => [
        'title' => 'Modify Existing Tool Loan',
        'userId' => 'Modify User ID',
        'productId' => 'Modify Product ID',
        'depositAmount' => 'Modify Deposit Amount',
        'loanDate' => 'Modify Start date',
        'returnDate' => 'Modify Return Date',
        'desc' => 'Modify Description',
        'button' => 'Modify Tool Loan',
    ],
    
    //List
    'list' => [
        'price' => 'Price:',
        'addToCart' => 'Add to cart',
    ],

    //Show
    'show' => [
        'name' => 'Product name:',
        'desc' => 'Product description:',
        'salePrice' => 'Product sale price:',
        'category' => 'Product category:',
        'brand' => 'Product brand:',
        'warranty' => 'Product warranty:',
    ],

    //Show cart
    'showCart' => [
        'price' => 'Price:',
        'deleteAllCart' => 'Delete all cart',
    ],
];