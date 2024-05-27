<?php


namespace App\Interfaces;


interface  ImageRepositoryInterface
{
    public function getDataTable();

    public function getImageAllData();

    public function getImageById($imageId);

    public function createImage($req);

    public function updateImage($imageId, $req);

    public function deleteImage($imageId);
}
