<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * Set table's name for Language model.
     *
     * @var string
     */
    protected $table = 'app_languages';

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->whereNotIn("lang_id", [3]);
    }
}
