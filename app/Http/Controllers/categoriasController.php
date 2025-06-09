<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoriasController extends Controller
{
    public function cualquiera(){
        return "Bienvenido a este mundo";
    }

    public function create(){
        return "Bienvenido aca puedes crear";
    }

    public function alte($cat, $sub_cat = null){
        if ($sub_cat) {
            return "La categoria dicha es: ".$cat.", ya la sub-categoria corresponde es: " ."<br>".$sub_cat;
        } else {
            return "La categoria es: ".$cat;
        }
    }
}
