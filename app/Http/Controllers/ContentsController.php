<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ContentsController extends Controller
{
  Public function index()
  {
      $data = Category::get();
      return view('contents.index', compact('data'));
  }
}
