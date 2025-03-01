<?php

namespace App\Database\Models;

use App\Database\Models\Model;
use PDOException;

class Read extends Model
{
    public function all($table, $fields = '*'){
        try {
            $query = $this->connect->query("SELECT $fields FROM $table");
            $query->execute();

            return $query->fetchAll();
            
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }


}
