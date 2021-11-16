<?php

return [
    //Controller
    'controller' => [
        'created' => 'Préstamo de herramienta creado satisfactoriamente!',
        'updated' => 'Préstamo de herramienta actualizado satisfactoriamente!',
        'deleted' => 'Préstamo de herramienta eliminado satisfactoriamente!',
    ],

    //Create form
    'create' => [
        'createButton' => 'Guardar Préstamo Herramienta',
        'title' => 'Crear un Nuevo Préstamo de Herramienta',
        'user' => 'Usuario',
        'productId' => 'Selccione la Herramienta a Prestar',
        'depositAmount' => 'Cantidad de Depósito Requerida',
        'loanDate' => 'Fecha de inicio del préstamo',
        'returnDate' => 'Fecha de devolución del préstamo',
        'desc' => 'Descripción del préstamo',
        'loanButton' => 'Prestar esta Herramienta',
    ],

    //Edit form
    'edit' => [
        'title' => 'Lista de Herramientas en Préstamo',
        'modifyTitle' => 'Modificar un Préstamo de Herramienta Existente',
        'userName' => 'Usuario',
        'productId' => 'ID de Producto',
        'depositAmount' => 'Depósito',
        'loanDate' => 'Modificar Fecha de Inicio',
        'returnDate' => 'Modificar Fecha de Devolución',
        'button' => 'Modificar Préstamo de Herramienta',
        'loanId' => 'ID',
        'toolName' => 'Nombre Herramienta',
        'loanStart' => 'Fecha Inicio',
        'loanEnd' => 'Fecha Final',
        'description' => 'Descripción',
        'actions' => 'Acciones',
        'editButton' => 'Editar',
        'deleteButton' => 'Eliminar',
        'modifyProductId' => 'Modificar Herramienta',
        'modifyDepositAmount' => 'Modificar Cantidad de Deposito',
        'confirmEdit' => 'Actualizar Préstamo de Herramienta',
        'closeButton' => 'Cerrar',
        'modifyUserId' => 'Modificar Usuario',
        'userHelp' => 'El usuario actual está destacado',
        'deleteMessage' => 'Está seguro que quiere eliminar el préstamo de herramienta con ID: ',
        'confirmDelete' => 'Eliminar Préstamo de Herramienta',
        'selectNew' => 'Seleccionar nueva herramienta',
        'buttonAdd' => 'Prestar una Herramienta',
        'dueToday' => 'Herramienta que vence hoy',
        'modifyDesc' => 'Modificar Descripción',
        'pastDue' => 'Herramienta pasada la fecha de devolución',

    ],

    //List
    'list' => [
        'price' => 'Precio:',
        'addToCart' => 'Añadir al carrito',
    ],

    //Show
    'show' => [
        'name' => 'Nombre:',
        'desc' => 'Descripción:',
        'salePrice' => 'Precio:',
        'category' => 'Categoría:',
        'brand' => 'Marca:',
        'warranty' => 'Garantía:',
    ],

    //Show cart
    'showCart' => [
        'price' => 'Precio:',
        'deleteAllCart' => 'Eliminar todo el carrito',
    ],
];
