<?php
namespace DenisKisel\Summernote\Controllers;

use Illuminate\Http\Request;

class Uploader
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/summernote/media');
            $fileName = pathinfo($path, PATHINFO_FILENAME) . '.' . pathinfo($path, PATHINFO_EXTENSION);
            return response(url('/storage/summernote/media/' . $fileName), 200);
        } else {
            return response()->json($request->allFiles());
        }
    }
}
