<?php

namespace App\Http\Controllers;

use App\Forum;
use App\ForumComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ForumController extends Controller
{
    function forum($id, $page = 0)
    {
        $forum = Forum::find($id);
        if (empty($forum)) {
            abort(404);
        }
        $data = ["forum" => $forum, "lastForums" => Forum::orderBy("id", "desc")->take(4)->get()];

        $linkPerPage = 7;

        $page = (int)$page; //sayı gelmezse 0 verir.
        if ($page < 0) {
            $page = 0;
        }

        $geriLink = "#";
        if ($page > 0) {
            $geriLink = "/forum/$id/" . ($page - 1);
        }

        $ileriLink = "#";
        $toplam = count($forum->getComments);
        if (($page + 1) < ceil($toplam / $linkPerPage)) {
            $ileriLink = "/forum/$id/" . ($page + 1);
        }

        $data["comments"] = ForumComment::where("forum_id", $id)->skip($linkPerPage * $page)->
        take($linkPerPage)->get();
        $data["geriLink"] = $geriLink;
        $data["ileriLink"] = $ileriLink;
        $data["sayfa"] = $page;
        $data["toplam"] = $toplam;

        return view("forum", $data);
    }

    function forumPost(Request $req)
    {
        $rules = Validator::make($req->all(), [
            "baslik" => "required | min:1 | max:100",
        ]);

        if ($rules->fails()) {
            return redirect()->back()
                ->withErrors($rules)
                ->withInput();
        }

        $forum = new Forum;
        $forum->user_id = Auth::id();
        $forum->title = $req->baslik;
        $forum->save();

        return back();
    }

    function forumCommentPost(Request $req)
    {
        $rules = Validator::make($req->all(), [
            "yorum" => "required | min:1 | max:1000",
            "forum_id" => "required | exists:forums,id",
        ]);

        if ($rules->fails()) {
            return redirect()->back()
                ->withErrors($rules)
                ->withInput();
        }

        $forumComment = new ForumComment;
        $forumComment->user_id = Auth::id();
        $forumComment->forum_id = $req->forum_id;
        $forumComment->comment = $req->yorum;
        $forumComment->save();

        return back();
    }

    function forumSearch($text, $page = 0)
    {
        $data = [];
        $linkPerPage = 5;

        if ($text == null) {
            $data["forums"] = Forum::orderBy("id", "desc")->take($linkPerPage)->get();
            $data["search"] = false;
        } else {
            $data["search"] = true;
            $data["text"] = $text;
            $forums = Forum::where("title", 'LIKE', "%{$text}%")->get();

            $page = (int)$page; //sayı gelmezse 0 verir.
            if ($page < 0) {
                $page = 0;
            }

            $geriLink = "#";
            if ($page > 0) {
                $geriLink = "/forum-ara/$text/" . ($page - 1);
            }

            $ileriLink = "#";
            $toplam = count($forums);
            if (($page + 1) < ceil($toplam / $linkPerPage)) {
                $ileriLink = "/forum-ara/$text/" . ($page + 1);
            }

            $data["forums"] = Forum::where("title", 'LIKE', "%{$text}%")->
            skip($linkPerPage * $page)->take($linkPerPage)->get();
            $data["geriLink"] = $geriLink;
            $data["ileriLink"] = $ileriLink;
            $data["sayfa"] = $page;
            $data["toplam"] = $toplam;
        }

        $data["lastForums"] = Forum::orderBy("id", "desc")->take(3)->get();

        return view("forum_search", $data);
    }
}
