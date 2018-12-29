<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件

class Tree
{
	private static $pk = 'id';
    private static $pid = 'pid';
    private static $child = 'child';
	
	public static function makeTree(&$data, $index = 0)
    {
        $childs = self::findChild($data, $index);
        if (empty($childs)) {
            return $childs;
        }
        foreach ($childs as $k => &$v) {
            if (empty($data)) break;
            $child = self::makeTree($data, $v[self::$pk]);
            if (!empty($child)) {
                $v[self::$child] = $child;
            }
        }
        unset($v);
        return $childs;
    }
	public static function findChild(&$data, $index)
    {
        $childs = [];
        foreach ($data as $k => $v) {
            if ($v[self::$pid] == $index) {
                $childs[] = $v;
                unset($v);
            }
        }
        return $childs;
    }
	public static function getTreeNoFindChild($data)
    {
        $map = [];
        $tree = [];
        foreach ($data as &$it) {
            $map[$it[self::$pk]] = &$it;
        }
        foreach ($data as $key => &$it) {
            $parent = &$map[$it[self::$pid]];
            if ($parent) {
                $parent['child'][] = &$it;
            } else {
                $tree[] = &$it;
                //$tree[]['child'] = null;
            }
        }
        return $tree;
    }
	// 向上查找
	public static function getParents($data, $catId)
    {
        $tree = array();
        foreach ($data as $item) {
            if ($item[self::$pk] == $catId) {
                if ($item[self::$pid] > 0)
				$tree = array_merge($tree, self::getParents($data, $item[self::$pid]));
				$tree[] = $item;
				break;
            }
        }
        return $tree;
    }
}
/**
 * 驼峰命名转下划线命名
 * @param $str
 * @return string
 */
function toUnderScore($str)
{
    $dstr = preg_replace_callback('/([A-Z]+)/', function ($matchs) {
        return '_' . strtolower($matchs[0]);
    }, $str);
    return trim(preg_replace('/_{2,}/', '_', $dstr), '_');
}

function p($str){
    echo '<pre>';
    print_r($str);
    die;
}
