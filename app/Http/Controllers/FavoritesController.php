<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    
    public function store($micropostId)
    {
        // 認証済みユーザ（閲覧者）
        \Auth::user()->favorite($micropostId);
        // 前のURLへリダイレクトさせる
        return back();
    }


    /**
     * ユーザをアンフォローするアクション。
     */
    
    public function destroy($micropostId)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをアンフォローする
        \Auth::user()->unfavorite($micropostId);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['microposts', 'followings', 'followers' , 'favorites']);
    }
    
}
