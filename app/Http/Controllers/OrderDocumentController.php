<?php

namespace App\Http\Controllers;

use App\OrderDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderDocumentController extends Controller
{
    public function upload_document(Request $request)
    {
        $file_name = "";
      if($f = $request->file('file'))
      {
          $file_name = (time() . '_' .$f->getClientOriginalName());
          $f->move('uploads',$file_name);
          Session::put('document',$file_name);
      }

      return redirect()->route('register');
    }
}
