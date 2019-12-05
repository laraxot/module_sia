<?php

namespace Modules\Sia\Providers;

//---- bases ----
use Modules\Xot\Providers\XotBaseServiceProvider;

class SiaServiceProvider extends XotBaseServiceProvider {
    protected $module_dir = __DIR__;
    protected $module_ns = __NAMESPACE__;
    public $module_name = 'sia';
}
