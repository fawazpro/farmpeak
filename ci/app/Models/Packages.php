<?php
namespace App\Models;

use CodeIgniter\Model;

class Packages extends Model
{
    protected $table      = 'packages';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name','unit_stock', 'unit_price', 'duration', 'description', 'ROI', 'status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}