<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\YRole;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Weiwait\DcatCropper\Form\Field\Cropper;

class YRoleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new YRole(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->avatar->image('', 100);
            $grid->banner->image();
            $grid->column('image')->display(function($image){
                return json_decode($image, true);
            })->image();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new YRole(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('avatar');
            $show->field('banner');
            $show->field('image');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new YRole(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->image('avatar')->autoUpload();
            $form->cropper('banner')->ratio(5/2)->resolution(150, 60);
            $form->multipleImage('image')->autoUpload()->sortable()->saving(function ($paths) {
                foreach ($paths as &$v) {
                    $v = urlencode($v);
                }
                unset($v);
                return json_encode($paths);
            });;

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
