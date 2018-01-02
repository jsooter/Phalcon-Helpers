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
    */
    public static function errorModelCreateFailed($model){
        return 'Failed to create from '.self::getClassName($model);
    }
    /*
    errorModelUpdateFailed($model)
    ====
    */
    public static function errorModelUpdateFailed($model){
        return 'Failed to update from model.';
    }
    /*
    errorModelDeleteFailed($model)
    ====
    */
    public static function errorModelDeleteFailed($model){
        return 'Failed to delete from model.';
    }
    /*
    getClassName($class)
    ====
    */
    public static function getClassName($class){
        $class_name = get_class($class) ? get_class($class) : 'Unknown';
    }
}
