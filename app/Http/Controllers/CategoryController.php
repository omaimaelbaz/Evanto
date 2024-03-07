<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        $category = new Category();
        $data = $category->all();

        return view('admin.category',compact('data'));
    }

}
