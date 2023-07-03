<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

class ClientController extends Controller
{
    public function thongsokythuat(){
        $id = 2;
        return view('view-page', [
            'pageObj' => Page::findOrFail($id)
        ]);
    }

    public function sodokhoi(){
        $id = 3;
        return view('view-page', [
            'pageObj' => Page::findOrFail($id)
        ]);
    }

    public function cautruc(){
        $id = 4;
        return view('view-page', [
            'pageObj' => Page::findOrFail($id)
        ]);
    }

    public function khaibaoPO(){
        return view('khaibaoPO', [

        ]);
    }

    public function khaibaoPM(){
        return view('khaibaoPM', [

        ]);
    }
}
