<?php
/*
*/
namespace Helpers;
/*
Helpers\Controller
========================
Provide simple static functions for handling common messages
*/
class Language
{
    public static $errorContactSupport = 'Please submit feedback or contact jsooter.dev@gmail.com and report this error.';
    public static $errorPostParameters = 'POST parameters expected but not received.';
    public static $errorUploadFiles = 'Files expected but none received.';
    public static $postStatusSuccess = 'success';
    public static $postStatusFailure = 'danger';
    public static $postStatusWarning = 'warning';
    /*
    errorModelCreateFailed($model)
    ====
    Model create method failed

    Parameters
    ----
    $model : object
    */
    public static function errorModelCreateFailed($model){
        return 'Failed to create from '.self::getClassName($model);
    }
    /*
    errorModelUpdateFailed($model)
    ====
    Model update method failed

    Parameters
    ----
    $model : object
    */
    public static function errorModelUpdateFailed($model){
        return 'Failed to update from '.self::getClassName($model);
    }
    /*
    errorModelDeleteFailed($model)
    ====
    Model delete method failed

    Parameters
    ----
    $model : object
    */
    public static function errorModelDeleteFailed($model){
        return 'Failed to delete from '.self::getClassName($model);
    }
    /*
    getClassName($class)
    ====
    Gets an object's class name

    Parameters
    ----
    $class : object
    */
    public static function getClassName($class){
        return get_class($class) ? get_class($class) : 'Unknown';
    }
}
