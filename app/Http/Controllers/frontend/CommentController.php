<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Posts;
use App\Models\Comment;

class CommentController extends Controller
{
//     public function store(Request $request){
//   if(Auth::check())
//   {
//     $validator = Validator::make($request->all(),[
//         'comment_body' => 'required|string'
//     ]);
//     if($validator->fails()){
//         return redirect()->back()->with('success', 'Comment area mandetory.');
//     }
//     $post = Posts::where('slug',$request->post_slug)->where('status', '0')->first();
//     if($post){
//         Comment::create([
//             'post_id' =>$post->id,
//             'user_id' =>Auth::user()->id,
//             'comment_body' =>$request->comment_body
//         ]);
//     }
//     else{
//         return redirect()->back()->with('success', 'No Such Post Found');
//     }
//   }
//   else{
//     return redirect()->back()->with('success', 'Login first to comment');
// }


// }
public function store(Request $request, string $slug)
{

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'comment_body' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Flash an error message and redirect back to the previous page with old input
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Posts::where('slug', $slug)->where('status', '0')->first();

        if ($post) {
            $inputs = $request->all();
            $inputs['post_id'] = $post->id;
            Comment::create($inputs);

            // Flash a success message and redirect back to the previous page
            return redirect()->back()->with('success', 'Comment added successfully.');
        } else {
            // Flash an error message and redirect back to the previous page
            return redirect()->back()->with('error', 'No such post found.');
        }
}


}
