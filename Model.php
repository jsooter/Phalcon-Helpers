<?php
/*
*/
namespace Helpers;
/*
Helpers\Model
====
Provides simple static functions for handling Phalcon Models and Resultsets
*/
class Model {
    /*
    toArray()
    ====
    Converts table row to an array. Necessary to include post-fetch properties.

    Parameters
    ----------
    row : Object _[Phalcon Model Resultset]_

    Returns
    -------
    array
    */
    public static function toArray($row){
        $arr = array();
        foreach($row as $key=>$value){
            $arr[$key] = $value;
        }
        return $arr;
    }
    /*
    setUpdateProperty(&$model,$property,$value)
    ====
    Sets model properties for update

    Parameters
    ----------
    &$model : Object reference
    $property : string
    $value : string
    */
    public static function setUpdateProperty(&$model,$property,$value){
        if($property != 'id' && property_exists($model,$property)){
            if(empty($value)){
                $model->{$property} = new \Phalcon\Db\RawValue('NULL');
            } else {
                $model->{$property} = $value;
            }
        }
    }
    /*
    setCreateProperty(&$model,$property,$value)
    ====
    Sets model properties for create

    Parameters
    ----------
    &$model : Object reference
    $property : string
    $value : string
    */
    public static function setCreateProperty(&$model,$property,$value){
        if($property != 'id' && property_exists($model,$property)){
            if(!empty($value)){
                if(is_array($value)){
                    $model->{$property} = json_encode($value);
                } else {
                    $model->{$property} = $value;
                }
            }
        }
    }
    /*
    sumColumn($resultSet, $column)
    ====
    Sum a column of a result set

    Parameters
    ----------
    $resultSet : Object
    $column : string
    */
    public static function sumColumn($resultSet, $column){
        $count = 0;
        foreach($resultSet as $result){
            $count += $result->{$column};
        }
        return $count;
    }
}
