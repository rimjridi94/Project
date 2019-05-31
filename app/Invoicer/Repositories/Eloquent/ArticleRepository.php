<?php namespace App\Invoicer\Repositories\Eloquent;

use App\Invoicer\Repositories\Contracts\ArticleInterface;

class ArticleRepository extends BaseRepository implements ArticleInterface{

    public function model() {
        return 'App\Models\Article';
    }

    /**
     * @return array
     */

    public function articleSelect(){
        $articles = $this->all();

        $articleList = array();
        $options[] = ['value' => '', 'display' => 'None', 'data-value' => '' ];
        foreach($articles as $article){
            $option = ['value' => $article->uuid, 'display' => $article->name, 'data-value' => $article->price ];
            array_push($articleList, $option);
        }
        return $articleList;
    }
}