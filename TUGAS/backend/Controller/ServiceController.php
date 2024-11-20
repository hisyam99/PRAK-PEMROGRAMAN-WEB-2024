<?php

namespace backend\Controller;

include "../backend/Traits/ApiResponseFormatter.php";
include "../backend/Models/Service.php";

use backend\Models\Service;
use backend\Traits\ApiResponseFormatter;

class ServiceController
{
    use ApiResponseFormatter;

    public function index()
    {
        $serviceModel = new Service();
        $response = $serviceModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $serviceModel = new Service();
        $response = $serviceModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->apiResponse(480, "Error: invalid input", null);
        }

        $serviceModel = new Service();
        $serviceModel->create($inputData);

        return $this->apiResponse(200, "Service created successfully", null);
    }

    public function update($id)
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->apiResponse(480, "Error: invalid input", null);
        }

        $serviceModel = new Service();
        $serviceModel->update($inputData, $id);

        return $this->apiResponse(200, "Service updated successfully", null);
    }

    public function delete($id)
    {
        $serviceModel = new Service();
        $serviceModel->delete($id);

        return $this->apiResponse(200, "Service deleted successfully", null);
    }
}
