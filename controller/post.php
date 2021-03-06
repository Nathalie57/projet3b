<?php

require_once "model/chapitremodel.php";
require_once "view/view.php";


class Post
{
    private $chapitremodel;
    public $title;
    public $idPost;

    public function __construct()
    {
        $this->chapitremodel = new ChapitreModel();
    }

    public function showFeaturedPost()
    {
        $otherPost = $this->chapitremodel->otherPost();
        $myview = new View($otherPost, "otherPost");
        $data = $this->chapitremodel->featuredPost();
        $data["{{ otherPost }}"] = $myview->html;
        $myview = new View($data, "featuredPost");

        return $myview->html;
    }
    
    public function showSinglePost($slug)
    {
        $data = $this->chapitremodel->singlePost($slug);
        $myview = new View($data, "singlePost");
        $this->idPost = $data["{{ id }}"];
        $this->title = $data["{{ title }}"];
        return $myview->html;
    }

    public function showListPost()
    {
        $listPost = $this->chapitremodel->listPost();
        $myview = new View($listPost, "listPost");
        $data["{{ listPost }}"] = $myview->html;
        $myview = new View($data, "showListPost");

        return $myview->html;
    }
}
