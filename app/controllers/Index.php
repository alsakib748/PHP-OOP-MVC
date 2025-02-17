<?php

class Index extends DController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Index()
    {
        $this->home();
    }
    public function home()
    {
        $data = array();
        $tablePost = "post";
        $tableCat = "category";

        $this->load->view("header");

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);
        $this->load->view("search", $data);

        $postModel = $this->load->model("PostModel");
        $data['allPost'] = $postModel->getAllPost($tablePost);
        $this->load->view("content", $data);

        // $data['catlist'] = $catModel->catList($tableCat);
        $data['latestPost'] = $postModel->getlatestPost($tablePost);
        $this->load->view("sidebar", $data);
        $this->load->view("footer");
    }

    public function postDetails($id)
    {
        $data = array();
        $tablePost = "post";
        $tableCat = "category";

        $this->load->view("header");

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);
        $this->load->view("search", $data);

        $postModel = $this->load->model("PostModel");
        $data['postbyid'] = $postModel->getPostById($tablePost, $tableCat, $id);

        $this->load->view("details", $data);
        // $catModel = $this->load->model("CatModel");
        // $data['catlist'] = $catModel->catList($tableCat);
        $data['latestPost'] = $postModel->getlatestPost($tablePost);
        $this->load->view("sidebar", $data);
        $this->load->view("footer");
    }

    public function postByCat($id)
    {
        $data = array();
        $tablePost = "post";
        $tableCat = "category";

        $this->load->view("header");

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);
        $this->load->view("search", $data);

        $postModel = $this->load->model("PostModel");
        $data['getcat'] = $postModel->getPostByCat($tablePost, $tableCat, $id);

        $this->load->view("postbycat", $data);

        // $catModel = $this->load->model("CatModel");
        // $data['catlist'] = $catModel->catList($tableCat);
        $data['latestPost'] = $postModel->getlatestPost($tablePost);
        $this->load->view("sidebar", $data);

        $this->load->view("footer");
    }

    public function search()
    {
        $data = array();
        $keyword = $_REQUEST["keyword"];
        $cat = $_REQUEST["cat"];

        $tablePost = "post";
        $tableCat = "category";

        $this->load->view("header");

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);
        $this->load->view("search", $data);

        $postModel = $this->load->model("PostModel");
        $data['postbysearch'] = $postModel->getPostBySearch($tablePost, $keyword, $cat);

        $this->load->view("sresult", $data);

        // $catModel = $this->load->model("CatModel");
        // $data['catlist'] = $catModel->catList($tableCat);
        $data['latestPost'] = $postModel->getlatestPost($tablePost);
        $this->load->view("sidebar", $data);

        $this->load->view("footer");
    }
}