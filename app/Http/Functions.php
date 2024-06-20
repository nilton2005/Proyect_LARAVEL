<?php

// key value form json

use App\Http\Middleware\Permissions;

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

// Automatizando permisos de usuarios


function user_permissions(){
    $permiso = [
        'dashboard'=>[
            'icon'=>'<i class="fa-solid fa-house-user"></i>',
            'title'=>'Modulo Dashboard',
            // Nombre de permisos para / Desciption
            'permisos' =>[
                'dashboard' =>'dashboard',
                'dashboard_small_stats'=>'Acceso estadísticas',
                'dashboard_today_sales' => 'Acceso ventas del día'
            ]
            ],
        'productos'=>[
            'icon'=>'<i class="fa-solid fa-store"></i>',
            'title' => 'Modulo Productos',
            'permisos' =>[
                'products'=> 'Acesso a productos',
                'product_add' => 'Acceso añadir productos',
                'product_edit' => 'Acceso editar productos',
                'product_search' => 'Acceso buscar accesorios',
                'product_delete' => 'Acceso eliminar productos',
                'product_gallery_add' => 'Acceso añadir imagenes',
                'product_gallery_delete' => 'Acceso eliminar imagenes'
            ]
            ],
        'catogorias' =>[
            'icon'=>'<i class="fa-regular fa-folder"></i> ',
            'title'=>'Modulo Categorias',
            'permisos' => [
                'categories' => 'Acceso a categorias',
                'category_add' => 'Acceso añadir categoria',
                'category_edit' => 'Acceso editar categoria',
                'category_delete' => 'Acceso eliminar categoria'

            ]
            ],
        'usuarios' =>[
                'icon'=>'<i class="fa-solid fa-users-line"></i>',
                'title'=>'Modulo Usuarios',
                'permisos' => [
                    'user_list' => 'Acceso a lista de usuarios',
                    'user_edit' => 'Acceso a editar usuarios',
                    'user_banned' => 'Acceso a banear usuarios',
                    'user_permissions' => ' Acceso a todos los permisos de cada usuario'
    
                ]
                ],  

    ];

    return $permiso;
}

function getUserYears(){
    //year day
    $ya = date('Y');
    // year min
    $ym = $ya-18;
    // year old
    $yo = $ym - 65;
    return [$ym,$yo];
}


function getMonths($modo, $key){
    $m =[
        '1' => 'Enero',
        '2' => 'Febrero',
    ];
}