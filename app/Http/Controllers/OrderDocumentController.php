<?php

namespace App\Http\Controllers;

use App\OrderDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderDocumentController extends Controller
{
    public function upload_document(Request $request)
    {
      $file_array = [];
      foreach ($request->file('file') as $file) {
          $file_name = (time() . '_' .$file->getClientOriginalName());
          $file->move('uploads',$file_name);
          array_push($file_array,$file_name);
      }
      Session::put('document',$file_array);

      if(Auth::check())
      {
          return redirect()->route('shops.index');
      }
      return redirect()->route('register');
    }
}
