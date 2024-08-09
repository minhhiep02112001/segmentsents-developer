<?php

namespace Segmentsents\Developer\Models;

use Illuminate\Database\Eloquent\Model;
use Microservices\models\BaseModel;
 
class Segment extends BaseModel
{
    protected $casts = [
        'integer' => ['_id', 'created_by', 'number_contact'],
        'unixtime' => ['updated_time', 'created_time'],
        'string' => ['name', 'type'],
        'text' => ['data'],
    ];
    protected $idAutoIncrement = 1; 
    protected $primaryKey = '_id'; 
    protected $table = 'segment';  // Tên mặc định

    public function __construct(array $attributes = [])
    {
        // parent::__construct($attributes);
        $this->table = config('segmentmanager.table_name', $this->table);
    }
}
