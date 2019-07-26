<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DocumentController extends Controller
{
    public function docs(){
        $uploadsData = DB::table('users')
                ->join('uploads', 'uploads.user_id', 'users.id')
                ->select('users.name','uploads.*')
                ->get();
       
        return view('temp1.immigrant.documents.docsList', ['userUploadsData' => $uploadsData]);
    }
}
