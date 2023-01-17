<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string model
 * @property int object_id
 * @property string name
 * @property string dirname
 * @property string filename
 * @property string extension
 * @property int filesize
 * @property string mimetype
 * @property int order
 * @property string status
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class Files extends Model
{
    protected $guarded = [
        'id'
    ];

    public function path()
    {
        return 'storage/' . $this->dirname . $this->filename;
    }
}
