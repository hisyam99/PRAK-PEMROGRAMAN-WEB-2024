<?php

namespace app\Controller;

include "../app/Traits/ApiResponseFormatter.php";
include "../app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    use ApiResponseFormatter;

    public function index()
    {
        // Definisi objek model Product yang sudah dibuat
        $productModel = new Product();

        // Melakukan formatting response menggunakan trait
        $response = $productModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        // Definisi objek model Product yang sudah dibuat
        $productModel = new Product();

        // Mendapatkan data berdasarkan ID
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        // Tangkap input JSON
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        // Validasi input, pastikan tidak ada kesalahan JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->apiResponse(480, "Error: invalid input", null);
        }

        // Buat objek Product dan masukkan data
        $productModel = new Product();
        $response = $productModel->create([
            "product_name" => $inputData['product_name']
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        // Tangkap input JSON
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        // Validasi input
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->apiResponse(480, "Error: invalid input", null);
        }

        // Update data berdasarkan ID
        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData['product_name']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        // Hapus data berdasarkan ID
        $productModel = new Product();
        $response = $productModel->delete($id);

        return $this->apiResponse(200, "success", $response);
    }
}
