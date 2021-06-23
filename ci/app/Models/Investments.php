<?php
namespace App\Models;

use CodeIgniter\Model;

class Investments extends Model
{
    protected $table      = 'investments';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id','packages_id', 'tranx_id', 'payment_status', 'unit_bought', 'date', 'payout'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}