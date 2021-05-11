<?php

namespace Framework;

class Load
{
    /**
     * 累名映射
     * 
     * @var array
     */
    public static $map = [];

    /**
     * 类命名空间映射
     * 
     * @var array
     */
    public static $namespaceMap = [];

    public static function register()
    {
        # code...
    }

    static public function autoload($class)
    {
        $classOrigin = $class;
        $classInfo = explode('\\', $class);
        $className = array_pop($classInfo);
        foreach ($classInfo as &$v) {
            $v = strtolower($v);
        }
        unset($v);
        array_push($className, $className);
        $class = implode('\\', $classInfo);
        $path = self::$namespaceMap['Framework'];
        $classPath = $path . '/' . str_replace('\\', '/', $class) . '.php';
        self::$map[$classOrigin] = $classPath;
        require $classPath;
    }

}