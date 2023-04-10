<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPostData()
    {
        $role= session('name')['role'];
        //return $role;
        $result= post::where('author_id',$role)->get();
        $result1= category::all();
        return view('/admin/post',['result'=> $result,'result1'=> $result1]);
    }
    function showCategoryData(){
        $result= category::all();
        $row=['result'=> $result];
        return view('/admin/add-post',$row); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePostData(Request $request)
    {
        $post= new post;
        $post->title=$request->post_title;
        $post->description=$request->postdesc;
        $post->category_id=$request->category;
        $post->author_id=session('name')['user_id'];
        $post->post_img=$request->file('image')->getClientOriginalName();
       
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('public/images', $fileName);
        $post->save();

        //$data = Category::where('category_id', $req->category)->increment('post');
        $data = Category::where('category_id', $request->category)->first();
        if ($data) {
            Category::where('category_id', $request->category)->update(['post' => $data->post + 1]);
        }

        return redirect('/admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function dltPostData($id){
        $getData= post::where('id',$id)->get();
        $category_id= $getData[0]['category_id'];
        $data1 = category::where('category_id', $category_id)->get();
        
        $post= $data1[0]['post'];
        if ($data1) {
            Category::where('category_id', $category_id)->update(['post' => $post - 1]);
        }
        $data= post::where('id',$id);
        $data->delete();
        return redirect('/admin/post');
    }

    function fillToUpdateData($id)
    {
        // $row= post::where('id',$id)->first();
        $row= post::find($id);
        $result= category::all();
        return view("/admin/update-post",['row'=> $row,'result'=> $result]);
    }

    function updatePostData(Request $req){
        $newImage = $req->file('new_image');
        if ($newImage == null) {
            $filename = $req->old_image;
        } else {
            $filename = $newImage->getClientOriginalName();
            $newImage->storeAs('public/images', $filename);
        }

        $data = post::where('id', $req->post_id)->update([
            'title' => $req->post_title,
            'description' => $req->postdesc,
            'category_id' => $req->category,
            'author_id' => session('name')['user_id'],
            'post_img' => $filename
        ]);

        return redirect('/admin/post');
    }
//front panel
    public function showFrontPanelPosts()
    {
        $result = post::join('categories', 'posts.category_id', '=', 'categories.category_id')
                    ->join('users', 'posts.author_id', '=', 'users.user_id')
                    ->select('posts.*', 'users.*', 'categories.*')
                    ->paginate(2);
        return view('index', ['result' => $result]);
    }

    function showPostOfCategory($id){
        $result = post::join('categories', 'posts.category_id', '=', 'categories.category_id')
        ->join('users', 'posts.author_id', '=', 'users.user_id')
        ->select('posts.*', 'users.*', 'categories.*')
        ->where('posts.id', $id)
        ->get();
        //return view('category', ['result' => $result]);
        //return dd($row);
        return view('single', ['result' => $result]);
        // try {
        //     $row = post::join('categories', 'posts.category_id', '=', 'categories.category_id')
        //             ->join('users', 'posts.author_id', '=', 'users.user_id')
        //             ->select('posts.*', 'users.*', 'categories.*')
        //             ->where('categories.category_id', $id)
        //             ->first();
        //     return view('single', ['row' => $row]);
        // } catch (\Exception $e) {
        //     // Log the exception or return an error response
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }

    function showCategoryPosts($id){
        $result = post::join('categories', 'posts.category_id', '=', 'categories.category_id')
                ->join('users', 'posts.author_id', '=', 'users.user_id')
                ->select('posts.*', 'users.*', 'categories.*')
                ->where('categories.category_id', $id)
                ->get();
        return view('category', ['result' => $result]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $result = Post::join('categories', 'posts.category_id', '=', 'categories.category_id')
                      ->join('users', 'posts.author_id', '=', 'users.user_id')
                      ->select('posts.*', 'users.*', 'categories.*')
                      ->where('posts.title', 'like', '%' . $searchTerm . '%')
                      ->orWhere('posts.description', 'like', '%' . $searchTerm . '%')
                      ->orWhere('users.username', 'like', '%' . $searchTerm . '%')
                      ->orWhere('categories.category_name', 'like', '%' . $searchTerm . '%')
                      ->get();

        return view('search', ['result' => $result, 'searchTerm' => $searchTerm]);
    }

    function showAuthorPosts($id){
        $result = post::join('categories', 'posts.category_id', '=', 'categories.category_id')
                ->join('users', 'posts.author_id', '=', 'users.user_id')
                ->select('posts.*', 'users.*', 'categories.*')
                ->where('users.user_id', $id)
                ->get();
        return view('author', ['result' => $result]);
    }

    
}
