<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CColors extends Controller
{
    public function insert_color(Request $req)
    {
        if ($req->hasFile('image')) {
            $req->validate([
                'image' => 'mimes:jpg,png,jpeg|max:5048',
            ]);
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
             $req->image->move(public_path('images/colors'), $filename);

        }

        $result = Color::insert([
            'color' => $req->name,
            'color_image' => (!empty($filename) ? $filename : ''),
        ]);
        if ($result == 1) {
            session(['res' => 'success']);
            session(['result' => "color successfully added"]);
        } else {
            session(['res' => 'danger']);
            session(['result' => "Problem adding color"]);
        }
        return redirect('manage_colors');
    }
    public function delete_color($id)
    {
        $image = DB::table('colors')->where('color_id', $id)->first();
        $result = DB::table('colors')->where('color_id', $id)->delete();
        if ($result == 1) {
            if ($image->color_image) {
                
                unlink(public_path('images/colors/' . $image->color_image));
            }
            session(['res' => 'success']);
            session(['result' => "Successfully deleted"]);
        } else {
            session(['res' => 'danger']);
            session(['result' => "Problem deleting color"]);
        }
        return redirect('manage_colors');
    }
}
