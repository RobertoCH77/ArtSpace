<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class SearchController extends Controller
{
    public function tags (Request $request){
        $term = $request->get('term');

        $querys = Tag::where('name', 'LIKE', '%' . $term . '%')->get();

        $data = [];

        foreach ($querys as $query) {
            $data[] = [
                'label' => $query->name
            ];
        }

        return $data;
    }
}
