<?php

namespace App\Models;

use App\Libraries\MySql;
use PDO;
use App\Models\Model;

class JobModel extends Model
{
    protected $model = "jobs";

    protected $limit;

    protected $protectedFields = [
        'id',
        'updated',
        'deleted',
        'updated_by',
        'deleted_by',
    ];

    public static function load()
    {
        return new static;
    }

    public function __construct()
    {
        parent::__construct(
            $this->model, 
            $this->limit, 
            $this->protectedFields
        );   
    }

    public function userJobs($userId)
    {
        $sql = 'SELECT * FROM jobs WHERE user_id=' . $userId;
        $result = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);

        return $result;
    }
}
