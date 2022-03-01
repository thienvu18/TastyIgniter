<?php

namespace Admin\Controllers;

use Admin\Classes\AdminController;
use Admin\Facades\AdminMenu;

class Ingredients extends AdminController
{
    public $implement = [
        'Admin\Actions\ListController',
        'Admin\Actions\FormController',
        'Admin\Actions\LocationAwareController',
    ];

    public $listConfig = [
        'list' => [
            'model' => 'Admin\Models\Ingredient',
            'title' => 'lang:admin::lang.ingredients.text_title',
            'emptyMessage' => 'lang:admin::lang.ingredients.text_empty',
            'defaultSort' => ['ingredient_id', 'DESC'],
            'configFile' => 'ingredient',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:admin::lang.ingredients.text_form_name',
        'model' => 'Admin\Models\Ingredient',
        'request' => 'Admin\Requests\Ingredient',
        'create' => [
            'title' => 'lang:admin::lang.form.create_title',
            'redirect' => 'ingredients/edit/{ingredient_id}',
            'redirectClose' => 'ingredients',
            'redirectNew' => 'ingredients/create',
        ],
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'ingredients/edit/{ingredient_id}',
            'redirectClose' => 'ingredients',
            'redirectNew' => 'ingredients/create',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'ingredients',
        ],
        'delete' => [
            'redirect' => 'ingredients',
        ],
        'configFile' => 'ingredient',
    ];

    protected $requiredPermissions = 'Admin.Ingredients';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('menus', 'restaurant');
    }
}