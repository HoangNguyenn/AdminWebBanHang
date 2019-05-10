<?php


namespace App\Http\Controllers;

use Illumine\Http\Request;
use DB;
use Grids;
use App\User;
use Nayjest\Grids\DbaDataProvider;
use Nayjest\Grids\DbalDataProvider;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\GridConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\FilterConfig;


class ParamController extends Controller
{
    public function showparam()
    {
        $query = DB::getDoctrineConnection()->createQueryBuilder();
        $query
            ->select([
                'id',
                'name',
                'email',
                'password',
                'role'
            ])
            ->from('users');
        $cfg =(new GridConfig())
            ->setDataProvider(
                new DbalDataProvider($query)
            )
            ->setPageSize(5)
            ->setColumns([
                (new FieldConfig('id'))->setSortable(true)->addFilter((new FieldConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
            ( new FieldConfig('name'))->setSortable(true)->addFilter((new FieldConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
                (new FieldConfig('email'))->setSortable(true)->addFilter((new FieldConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
                (new FieldConfig('password'))->setSortable(true)->addFilter((new FieldConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
                (new FieldConfig('role'))->setSortable(true)->addFilter((new FieldConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
                ]);
        $grid = new Grid($cfg);
        return view('param',compact('grid'));
    }

}