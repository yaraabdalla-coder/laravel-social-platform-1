<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Console\View\Components\Success;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostsResource;
use App\Http\Resources\Postscollection;
use App\Http\Controllers\Gate;
use App\Traits\JsonResponse;
class   PostController extends Controller
{
    use JsonResponse;
    private function cacheposts(){
         return cache::rememberForever(posts::posts_key,  fn  () =>Posts::with(['reactions','user', 'poststatuses','comments'])->get()->toArray());
    
    }
   // private function hydrate(){
      //    return  posts::hydrate($posts);
    //}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // return User ::all()->random()->id;
       // return User ::inRandomOrder()->first()->id;
       // return User ::inRandomOrder()->get();
      // $Posts=posts::with('comments','user','poststatuses','reactions')->get();
      // return $Posts;
      //way
      //$Posts = posts::with( 'user', 'poststatuses')->withCount([ 'comments','reactions'])->get();
       //return $Posts;

       //or another way
       $posts=$this->cacheposts();
       
       $models=posts::hydrate($posts);
       $postscollection=Postscollection::make($models);
return $this->jsonResponse( 'Success', 201, count($posts).'postfound ', $postscollection);
    }
      
///$posts = Posts::withCount(['reactions'])->get();

//$posts->load(['user', 'poststatuses','comments']);

//$postResources = PostsResource::collection($posts);
//$postResources =   new Postscollection($posts);


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(StorePostsRequest$request)
    {
        
    $post_date=$request->validated();
    $post_date['user_id']=$request->user()->id;
    $new_post=Posts::create($post_date);
    if( $new_post){
        cache::forget('all_posts');
        $this->cacheposts();

    }
    $data= PostsResource::make($new_post);
    return $this ->jsonResponse('SUCCSES',201,'post created succfully',$data);
    }

    /**
     * Display the specified resource.
     */
    public function show( Posts $post)
    {
        $post->load(['user','poststatuses', 'comments']);
        //way

    // $postResources=PostResources::make($post);

    //or another way
     $postsResource= new PostsResource($post);
     return  $postsResource;
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, Posts $posts)
    {
         return $request->validated();

    $updated_post = $post->update(attributes: $data);

    if ($updated_post) {
        Cache::forget('all_posts');

        $this->cachePosts();

        $data = PostResource::make( $posts);

        return $this->jsonResponse('sucses',200,'post updated successfully',$data);
          
    }

    return $this->jsonResponse(
        code: 400,
        message: 'Post not updated',
        data: null
    );
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
$deleted_post = $posts->delete();

if ($deleted_post) {
    Cache::forget('all_posts');

    $this->cachePosts();

}

return $this->jsonResponse( 'succses',200,'post deleted successfully');
  
    }
        
    
}
