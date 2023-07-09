<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;


class UserInitDataAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Tạo dữ liệu mẫu';
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right btn-custom-action',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.'.$this->dataType->slug.'.init_data', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'users';
    }
}
