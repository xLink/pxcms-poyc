<?php namespace Cms\Modules\Poyc\Providers;

use Cms\Modules\Core\Providers\BaseModuleProvider;

class PoycModuleServiceProvider extends BaseModuleProvider
{

    /**
     * Register the defined middleware.
     *
     * @var array
     */
    protected $middleware = [
        'Poyc' => [
        ],
    ];

    /**
     * The commands to register.
     *
     * @var array
     */
    protected $commands = [
        'Poyc' => [
        ],
    ];

    /**
     * Register view composers
     *
     * @var array
     */
    protected $composers = [
        'Poyc' => [
        ],
    ];

    /**
     * Register repository bindings to the IoC
     *
     * @var array
     */
    protected $bindings = [

    ];

    /**
     * Register Auth related stuffs
     */
    public function register()
    {
        parent::register();

    }

}
