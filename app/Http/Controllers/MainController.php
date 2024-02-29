<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\News;
use App\Models\Like;
use App\Models\Categorie;
use Carbon\Carbon;
class MainController extends Controller
{
    public function index(Request $request) {
        $sortOrder = $request->get('sort_order');
        if ($sortOrder == 0) {
        $news=News::where('is_blocked', false)->paginate(6);
        } else {
            $news=News::where('is_blocked', false)->where('category_id',$sortOrder)->paginate(6);    
        }
        $categoria=Categorie::all();
        $newsLike= News::where('is_blocked', false)
        ->withCount('likePost')
        ->orderByDesc('like_post_count')
        ->take(3)->get();
        return view('index',compact('news'),['newsLike' => $newsLike, 'categoria' => $categoria]);
    }
    public function news($id) {
        $news=News::find($id);
        $comment=Comment::where('news_id',$id)->get();
        return view('news',['new' => $news,'comment'=> $comment]);
    }
    public function like_add($id)
    {

        $author = Auth::user()->id;
        $existingLike = Like::where('user_id', $author)
        ->where('news_id', $id)
        ->first();
        if ($existingLike) {
        $existingLike->delete();
        return redirect()->back()->with('error', 'Вы не можете поставить лайк!');
    } else {
        Like::create([
            'user_id' => $author,
            'news_id' => $id,
        ]);
        return redirect()->back()->with('likes', 'Вы проставили лайк!');
    }
      }

      public function commentAdd(Request $request, $id)
      {
          $comment = $request->all();
          $author = Auth::user()->id;
          $date_Carbon=Carbon::now()->setTimezone('Asia/Yekaterinburg');
          $addComment = Comment::create([
              "comment_text" => $comment["comment_text"],
              "comment_date" => $date_Carbon,
              "news_id" => $id,
              "user_id" => $author,
          ]);
  
          if ($addComment) {
              return redirect()->back()->with("addComment", "Вы добавили комментарии к видео");
          } else {
              return redirect()->back()->with("ErrorComment", "Ошибка добавление");
          }
      }
      public function personalcub () {
        return view('personalcub');
      }
      public function addUsers(Request $request) {
        $request->validate(
            [
                "name" => "required" ,
                "email" => "required" ,
                "password_old" => "unique:users,password|required" . Auth::user()->id,
                "password" => "required"
            ],
            [
                "name.required" => "Это поле не должно быть пустым!",
                "email.required" => "Это поле не должно быть пустым !",
                "password_old.unique" => "Неверно указали старый пароль!",
                "password_old.required" => "Неверно указали старый пароль!",
                "password.required" => "Неверно указали старый пароль!",
           
     
            ]
        );
        $infoUser=$request->all();
        
      }
    }

