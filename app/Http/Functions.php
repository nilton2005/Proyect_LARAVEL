<?php

function getModulesArray(){
    $a = [
        '0'=>'Productos',
        '1'=>'Blog',
        '2'=>'Contacto',
    ];

    return $a;
}
function getRoleUserArrayKey($id){
    $roles = ['0'=> 'Usuario normal', '1'=>'Administrador'];
    if (array_key_exists($id, $roles)) {
        return $roles[$id];
    } else {
        return 'Clave no válida';
    }
}


function getUserStatusArrayKey($id){
    $status = ['0'=>'Registrado', '1'=>'Verficado', '100'=>'Baneado'];
    return $status[$id];

}