<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    //
    public function destroy($id)
    {
        $foto = Foto::find($id);
        $foto->delete();

        return redirect()->back()->with('success', 'Фото удалено.');
    }
}
