<?php
namespace aquaweb\database\models;
include_once $_SERVER['DOCUMENT_ROOT'].'/git2log/database/database.php';

class LogMeta extends \Illuminate\Database\Eloquent\Model
{
    public function account()
    {
        return $this->belongsTo('aquaweb\database\models\Account');
    }

    public function log()
    {
        return $this->belongsTo('aquaweb\database\models\Log');
    }
}
