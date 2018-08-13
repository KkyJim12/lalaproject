<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Slide;

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

      return redirect()->route('admin-category');
    }

    public function AdminEditCategoryProcess(Request $request)  {

      //Edit Category Validate//

      $validatedData = $request->validate([
        'category_name' => 'required|max:255',
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

    public function AdminCreateSlideProcess(Request $request) {

      //Edit Category Validate//

      $validatedData = $request->validate([
        'slide_name' => 'required|max:255',
        'slide_link' => 'required|max:255',
        'slide_number' => 'numeric',
        'slide_img' => 'required|image|max:2048',
      ]);

      // END Edit Category Validate//

      $image = $request->file('slide_img');

      $img_name= time().'.'.$image->getClientOriginalExtension();

      $destinationPath = public_path('/assets/img/slide');

      $image->move($destinationPath, $img_name);

      $slide = new Slide;
      $slide->slide_name = $request->slide_name;
      $slide->slide_link = $request->slide_link;
      $slide->slide_number = $request->slide_number;
      $slide->slide_img = $img_name;
      $slide->save();

      return redirect()->route('admin-slide');


    }

    public function AdminDeleteSlideProcess(Request $request) {

      $slide = Slide::where('slide_id',$request->slide_id)->first();
      $slide->delete();

      return redirect()->route('admin-slide');
    }

    public function AdminEditSlideProcess(Request $request) {
      //Edit Slide Validate//

      $validatedData = $request->validate([
        'slide_name' => 'required|max:255',
        'slide_number' => 'required|max:255',
        'slide_link' => 'required|max:255',
        'slide_img' => 'image|max:2048',
      ]);

      // END Edit Slide Validate//

      if ($request->slide_img) {
        $image = $request->file('slide_img');

        $img_name= time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/assets/img/slide');

        $image->move($destinationPath, $img_name);

        $slide = Slide::where('slide_id',$request->slide_id)->first();
        $slide->slide_name = $request->slide_name;
        $slide->slide_number = $request->slide_number;
        $slide->slide_link = $request->slide_link;
        $slide->slide_img = $img_name;
        $slide->save();

        return redirect()->route('admin-slide');
      }

      else {
        $slide = Slide::where('slide_id',$request->slide_id)->first();
        $slide->slide_name = $request->slide_name;
        $slide->slide_number = $request->slide_number;
        $slide->slide_link = $request->slide_link;
        $slide->save();

        return redirect()->route('admin-slide');
      }
    }
}
