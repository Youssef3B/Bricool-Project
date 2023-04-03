<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\commentaireblog;
use Illuminate\Support\Facades\DB;

use App\Models\service;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::paginate(8);

        return view('blog.blog', ["blogs" => $blogs]);
    }


    public function blogdetails($id)
    {
        try {
            $blogs = Blog::findOrFail($id);
            $commentaires = commentaireblog::where('id_blog', $blogs->id)->get();
        } catch (Exception $e) {
            session()->flash("error", "Blog not found");
            return back();
        }


        return view('blogdetails.blogdetails', compact('blogs', 'commentaires'));
    }
    public function profiles($id)
    {
        $user = User::find($id);
        return view('profiles.profiles', ['user' => $user]);
    }

    public function manageblog()
    {


        $blogs = Blog::with('user')->where('id_user', auth()->id())->paginate(6);


        return view('admin.manageblog')->with('blogs', $blogs);
        // $users = User::all();

        // return view('admin.manageblog', ['users' => $users]);
    }
    // public function editBlog(Request $request, $id)
    // {
    //     $blog = Blog::find($id);
    //     if ($request->isMethod('POST')) {
    //         $image = $blog->image;
    //         $image = $blog->image;
    //         if ($request->hasFile("image") && $request->file("image")->isValid()) {
    //             // generate a unique filename to avoid conflicts
    //             $filename = uniqid() . '.' . $request->image->extension();
    //             // store the file in the public/imgs directory
    //             $request->image->storeAs('public/imgs', $filename);
    //             // set the image path to the filename only
    //             $image = $filename;
    //         }
    //         Blog::where("id", $id)->update([
    //             "title" => $request->title,
    //             "description" => $request->description,
    //             "image" => $image
    //         ]);
    //         return redirect(route("manageblog"))->with('success', 'Your post has been updated successfully.
    //         ');
    //     }
    //     return view('admin.editblog', compact('blog'));
    // }
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.editblog', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->category = $request->input('category');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('imgs/' . $filename);
            $image->move(public_path('imgs'), $filename);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->route('manageblog', ['id' => $blog->id])->with('success', 'Blog post deleted successfully');
    }
    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('manageblog')->with('success', 'Blog post deleted successfully');
    }
}
