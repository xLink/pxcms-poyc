<?php namespace Cms\Modules\Poyc\Models;

use Cms\Modules\Core\Models\BaseModel as CoreBaseModel;

class BaseModel extends CoreBaseModel
{

    public function __construct()
    {
        parent::__construct();

        $prefix = config('cms.poyc.config.table-prefix', 'poyc_');
        $this->table = $prefix.$this->table;
    }

}
