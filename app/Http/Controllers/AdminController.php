<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
    public function AdminCreateCategoryProcess(Request $request)  {

      //Create Category Validate//

      $validatedData = $request->validate([
        'category_name' => 'required|max:255',
        'category_suggest' => 'max:255',
        'category_img' => 'required|image|max:2048',
      ]);

      // END Create Category Validate//

      $image = $request->file('category_img');

      $img_name= time().'.'.$image->getClientOriginalExtension();

      $destinationPath = public_path('/assets/img/category');

      $image->move($destinationPath, $img_name);

      $category = new Category;
      $category->category_name = $request->category_name;
      $category->category_suggest = $request->category_suggest;
      $category->category_img = $img_name;
      $category->save();

      return redirect()->route('admin-category');
    }

    public function AdminDeleteCategoryProcess(Request $request)  {
      $category = Category::where('category_id',$request->category_id)->first();
      $category->delete();

      return redirect()->back();
    }

    public function AdminEditCategoryProcess(Request $request)  {

      //Edit Category Validate//

      $validatedData = $request->validate([
        'category_name' => 'max:255',
        'category_suggest' => 'max:255',
        'category_img' => 'image|max:2048',
      ]);

      // END Edit Category Validate//

      if ($request->category_img) {
        $image = $request->file('category_img');

        $img_name= time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/assets/img/category');

        $image->move($destinationPath, $img_name);

        $category = Category::where('category_id',$request->category_id)->first();
        $category->category_name = $request->category_name;
        $category->category_suggest = $request->category_suggest;
        $category->category_img = $img_name;
        $category->save();

        return redirect()->route('admin-category');
      }

      else {
        $category = Category::where('category_id',$request->category_id)->first();
        $category->category_name = $request->category_name;
        $category->category_suggest = $request->category_suggest;
        $category->save();

        return redirect()->route('admin-category');
      }


    }
}
