<?php

function getModulesArray(){
    $a = [
        '0'=>'Productos',
        '1'=>'Blog',
        '2'=>'Contacto',
    ];

    return $a;
}
function getRoleUserArray($mode, $id){
    $roles = ['0'=> 'Usuario normal', '1'=>'Administrador'];
    if(!is_null($mode)):
        return $roles;
    else:
        return $roles[$id];
    endif;

}


function getUserStatusArray($mode,$id){
    $status = ['0'=>'Registrado', '1'=>'Verficado', '100'=>'Baneado'];
    if(!is_null($mode)):
        return $status;
    else:
        return $status[$id];
    endif;

}