<?php


namespace App\Interfaces;


interface  BlogRepositoryInterface
{
    public function getDataTable();

    public function getBlogAllData();

    public function getBlogById($blogId);

    public function createBlog($req);

    public function updateBlog($blogId, $req);

    public function deleteBlog($blogId);
}
