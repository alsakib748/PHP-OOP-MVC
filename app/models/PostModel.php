<?php

/**
 * Post Model
 */
class PostModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function PostById($tablePost, $id)
    {
        $sql = "SELECT * FROM $tablePost WHERE id = $id";
        return $this->db->select($sql);
    }

    public function getAllPost($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 3";
        return $this->db->select($sql);
    }

    public function getPostList($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        return $this->db->select($sql);
    }

    public function getPostById($tablePost, $tableCat, $id)
    {
        $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost INNER JOIN $tableCat ON $tablePost.cat = $tableCat.id  WHERE $tablePost.id = $id ";

        return $this->db->select($sql);
    }

    public function getPostByCat($tablePost, $tableCat, $id)
    {
        $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost INNER JOIN $tableCat ON $tablePost.cat = $tableCat.id  WHERE $tableCat.id = $id ";

        return $this->db->select($sql);
    }

    public function getlatestPost($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 5";
        return $this->db->select($sql);
    }

    public function getPostBySearch($tablePost, $keyword, $cat)
    {
        if (empty($keyword) && empty($cat)) {
            // $loc = BASE_URL . "/Index/home";
            header("Location:" . BASE_URL . "/Index/home");
        } else {
            if (isset($keyword) && !empty($keyword)) {
                $sql = "SELECT * FROM $tablePost WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%' ";
            } elseif (isset($cat)) {
                $sql = "SELECT * FROM $tablePost WHERE cat = $cat ";
            }
            return $this->db->select($sql);
        }
    }

    public function insertPost($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function updatePost($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
}
