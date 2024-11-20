<?php

namespace backend\Models;

include "../backend/Config/DatabaseConfig.php";

use backend\Config\DatabaseConfig;
use mysqli;

class Service extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        // Connect ke database MySQL
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->databaseName, $this->port);

        // Cek koneksi
        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }
    }

    // Function menampilkan semua layanan
    public function findAll()
    {
        $sql = "SELECT * FROM services";
        $result = $this->conn->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->conn->close();
        return $data;
    }

    // Function menampilkan layanan berdasarkan id
    public function findById($id)
    {
        $sql = "SELECT * FROM services WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->conn->close();
        return $data;
    }

    // Function untuk menambahkan layanan baru
    public function create($data)
    {
        $name = $data['name'];
        $description = $data['description'];
        $category = $data['category'];
        $price_range = $data['price_range'];
        $query = "INSERT INTO services (name, description, category, price_range) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $name, $description, $category, $price_range);
        $stmt->execute();

        $stmt->close();
        $this->conn->close();
    }

    // Function untuk memperbarui layanan
    public function update($data, $id)
    {
        $name = $data["name"];
        $description = $data["description"];
        $category = $data["category"];
        $price_range = $data["price_range"];
        $query = "UPDATE services SET name = ?, description = ?, category = ?, price_range = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $name, $description, $category, $price_range, $id);
        $stmt->execute();

        $stmt->close();
        $this->conn->close();
    }

    // Function untuk menghapus layanan
    public function delete($id)
    {
        $query = "DELETE FROM services WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $this->conn->close();
    }
}
