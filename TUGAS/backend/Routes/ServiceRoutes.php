<?php

namespace backend\Routes;

include "../backend/Controller/ServiceController.php";

use backend\Controller\ServiceController;

class ServiceRoutes
{
    public function handle($method, $path)
    {
        // Jika request method GET dan path sama dengan /api/services
        if ($method == "GET" && $path == '/api/services') {
            $controller = new ServiceController();
            echo $controller->index();
        }

        // Jika request method GET dan path mengandung /api/services/{id}
        if ($method == "GET" && strpos($path, "/api/services/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];
            $controller = new ServiceController();
            echo $controller->getById($id);
        }

        // Jika request method POST dan path sama dengan /api/services
        if ($method == "POST" && $path == "/api/services") {
            $controller = new ServiceController();
            echo $controller->insert();
        }

        // Jika request method PUT dan path mengandung /api/services/{id}
        if ($method == "PUT" && strpos($path, "/api/services/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];
            $controller = new ServiceController();
            echo $controller->update($id);
        }

        // Jika request method DELETE dan path mengandung /api/services/{id}
        if ($method == "DELETE" && strpos($path, "/api/services/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];
            $controller = new ServiceController();
            echo $controller->delete($id);
        }
    }
}
