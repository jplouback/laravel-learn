<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SiteController extends Controller
{
    
    // Root do site
    public function index() {
        $teste = '<strong>1232</strong>';
        $var1 = '123';
        $arrayData = [1,2,3,4,5,6,7,8];

    	return view('site.home.index', compact('teste', 'var1', 'arrayData') );
    }

    
    public function contato() {
    	return view('site.contato.index');
    }

    
    public function categoria($id) {
    	return 'Categoria: ' . $id;
    }

    
    public function categoriaOp($id = 1) {
    	return 'Categoria: ' . $id;
    }


}
