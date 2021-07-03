<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\DataTables\CategoryDataTableEditor;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('category');
    }

    public function store(CategoryDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
