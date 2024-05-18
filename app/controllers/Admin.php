<?php

/**
 *     Admin Controller
 */
class Admin extends DController
{
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
        $data = array();
    }

    public function Index()
    {
        $this->home();
    }

    public function home()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data["user"] = array(
            "username" => Session::get("username")
        );

        $this->load->view("admin/home");
        $this->load->view("admin/footer");
    }

    public function addCategory()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");
        $this->load->view("admin/addcategory");
        $this->load->view("admin/footer");
    }

    public function insertCategory()
    {
        $table = "category";
        $name = $_POST["catName"];
        $title = $_POST["title"];
        $data = array(
            'name' => $name,
            'title' => $title
        );
        $catModel = $this->load->model('CatModel');
        $result = $catModel->insertCat($table, $data);
        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Category Added Successfully.... ";
        } else {
            $mdata['msg'] = "Category Not Added Successfully.... ";
        }
        $url = BASE_URL . "/Admin/categoryList?msg=" . urlencode(serialize($mdata));
        header("Location: $url");
    }

    public function categoryList()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");
        $data = array();
        $table = "category";
        $catModel = $this->load->model("CatModel");
        $data['cat'] = $catModel->catList($table);
        $this->load->view("admin/categorylist", $data);
        $this->load->view("admin/footer");
    }

    public function editCategory($id = NULL)
    {
        $data = array();
        $table = "category";
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");
        $catModel = $this->load->model("CatModel");
        $data['catById'] = $catModel->catById($table, $id);
        $this->load->view("admin/editcat", $data);
        $this->load->view("admin/footer");
    }

    public function updateCat($id = NULL)
    {
        $table = "category";
        $name = $_POST["catName"];
        $title = $_POST["title"];

        $cond = "id=$id";
        $data = array(
            'name' => $name,
            'title' => $title
        );

        $catModel = $this->load->model("CatModel");
        $result = $catModel->catUpdate($table, $data, $cond);

        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Category Updated Successfully.... ";
        } else {
            $mdata['msg'] = "Category Not Updated Successfully.... ";
        }
        $url = BASE_URL . "/Admin/categoryList?msg=" . urlencode(serialize($mdata));
        header("Location: $url");
    }

    public function deleteCategory($id = NULL)
    {
        $table = "category";
        $cond = "id=$id";
        $catModel = $this->load->model("CatModel");
        $result = $catModel->delCatById($table, $cond);

        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Category Deleted Successfully.... ";
        } else {
            $mdata['msg'] = "Category Not Deleted Successfully.... ";
        }
        $url = BASE_URL . "/Admin/categoryList?msg=" . urlencode(serialize($mdata));
        header("Location: $url");
    }

    public function addArticle()
    {
        $tableCat = "category";
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);

        $this->load->view("admin/addpost", $data);
        $this->load->view("admin/footer");
    }

    public function addNewPost()
    {
        if (!($_POST)) {
            header("Location: " . BASE_URL . "/Admin/addArticle");
        }
        $input = $this->load->validation('DForm');

        $input->post('title')->isEmpty()->length(10, 500);

        $input->post('content')->isEmpty();

        $input->post('cat')->isCatEmpty();

        if ($input->submit()) {
            $tablePost = "post";
            $title = $input->values['title'];
            $content = $input->values['content'];
            $cat = $input->values['cat'];

            $data = array(
                'title' => $title,
                'content' => $content,
                'cat' => $cat
            );

            $postModel = $this->load->model('PostModel');
            $result = $postModel->insertPost($tablePost, $data);
            $mdata = array();
            if ($result == 1) {
                $mdata['msg'] = "Article Added Successfully.... ";
            } else {
                $mdata['msg'] = "Article Not Added Successfully.... ";
            }
            $url = BASE_URL . "/Admin/articleList?msg=" . urlencode(serialize($mdata));
            header("Location: $url");
        } else {
            $data["postErrors"] = $input->errors;

            $tableCat = "category";
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $catModel = $this->load->model("CatModel");
            $data['catlist'] = $catModel->catList($tableCat);

            $this->load->view("admin/addpost", $data);
            $this->load->view("admin/footer");
        }
    }

    public function articleList()
    {
        $tableCat = "category";
        $tablePost = "post";

        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $postModel = $this->load->model("PostModel");
        $data['listPost'] = $postModel->getPostList($tablePost);

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);

        $this->load->view("admin/postlist", $data);
        $this->load->view("admin/footer");
    }

    public function editArticle($id = NULL)
    {
        $tableCat = "category";
        $tablePost = "post";

        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $postModel = $this->load->model("PostModel");
        $data['postbyid'] = $postModel->PostById($tablePost, $id);

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);

        $this->load->view("admin/editpost", $data);
        $this->load->view("admin/footer");
    }

    public function updatePost($id = NULL)
    {
        $input = $this->load->validation('DForm');
        $input->post('title')->isEmpty();
        $input->post('content')->isEmpty();
        $input->post('cat')->isCatEmpty();
        $cond = "id = $id";

        $tablePost = "post";
        $title = $input->values['title'];
        $content = $input->values['content'];
        $cat = $input->values['cat'];

        $data = array(
            'title' => $title,
            'content' => $content,
            'cat' => $cat
        );

        $postModel = $this->load->model('PostModel');
        $result = $postModel->updatePost($tablePost, $data, $cond);
        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Article Updated Successfully.... ";
        } else {
            $mdata['msg'] = "Article Not Updated Successfully.... ";
        }
        $url = BASE_URL . "/Admin/articleList?msg=" . urlencode(serialize($mdata));
        header("Location: $url");
    }
}
