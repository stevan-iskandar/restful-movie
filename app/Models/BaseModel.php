<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    const ATTR_INT_ID               = 'id';

    const ATTR_DATETIME_CREATED     = 'created_at';
    const ATTR_DATETIME_UPDATED     = 'updated_at';
    const ATTR_DATETIME_DELETED     = 'deleted_at';

    public function getTableColumns()
    {
        $tableColumns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());

        foreach ($tableColumns as $i => $tableColumn)
            if (in_array($tableColumn, $this->getHidden()))
                unset($tableColumns[$i]);

        return $tableColumns;
    }
}
