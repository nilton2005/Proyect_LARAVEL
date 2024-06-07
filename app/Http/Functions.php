<?php

// key value form json
function kvfj($json, $key){
    if($json == null):
        return null;
    else:
        // Devuelve el value de dicho key
        $json = json_decode($json,true);
        if(array_key_exists($key,$json)):
            return $json[$key];
        else:
            return null;

        endif;
    endif;

    

}

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