<?php

namespace App\Models;

use App\Events\ModelCreating;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model {

    protected $events = [
        'creating' => ModelCreating::class,
    ];

    public function newId() {
        $prefix = (string)$this->hospital->id;
        $prefix_len = strlen($prefix);
        $maxId = substr((string)$this->where('hospitalId', $prefix)->max('id'), $prefix_len);
        $maxId += 1;
        $id = intval($prefix . $maxId);
        logger("max id of {$this->table} is {$maxId}, perfix is {$prefix}, record id is {$id}");
        return $id;
    }
    
    public function hospital() {
        return $this->belongsTo(\App\Models\Hospital::class, 'hospitalId', 'userId');
    }
}
