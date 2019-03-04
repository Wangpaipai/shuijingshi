<?php
/**
 * Created by PhpStorm.
 * Class: 54714
 * Date: 2018/12/20
 * Time: 16:02
 */

namespace app\model;


use think\Db;
use think\Model;

class ClassType extends Model
{
	const IS_SHOW_TRUE = 1;//显示
	const IS_SHOW_FALSE = 2;//不显示
	public $tableName = 'class_type';

	public function __construct()
	{
		parent::__construct();
		$this->commonModel = Db::name($this->tableName);
	}

	/**
	 * 分类列表
	 * Created by：Mp_Lxj
	 * @date 2018/12/21 16:21
	 * @param $map
	 * @return mixed
	 */
	public function classList($param)
	{
		$map = [];
		if($param['parent_id']){
			$map['parent_id'] = $param['parent_id'];
			$map['level'] = 2;
		}else{
			$map['level'] = 1;
		}
		$result = $this->commonModel->where($map)->order('sort,id')->select();
		return $result;
	}

	/**
	 * 新增分类
	 * Created by：Mp_Lxj
	 * @date 2018/12/21 17:04
	 * @param $data
	 * @return string
	 */
	public function classInsert($data)
	{
		$this->commonModel->insert($data);
		return $this->commonModel->getLastInsID();
	}

	/**
	 * 删除分类
	 * created by:Mp_Lxj
	 * @date:2018/12/21 18:47
	 * @param $map
	 * @return int
	 */
	public function delClass($map)
	{
		return $this->commonModel->where($map)->delete();
	}

	/**
	 * 修改分类
	 * created by:Mp_Lxj
	 * @date:2018/12/21 18:51
	 * @param $map
	 * @param $data
	 * @return int|string
	 */
	public function editClass($map,$data)
	{
		return $this->commonModel->where($map)->update($data);
	}

	/**
	 * 获取分类
	 * Created by：Mp_Lxj
	 * @date 2018/12/20 16:04
	 * @return array|false|mixed|\PDOStatement|string|Model
	 */
	public function getClassDetail($map)
	{
		return $this->commonModel->where($map)->find();
	}

	/**
	 * 分类列表
	 * Created by：Mp_Lxj
	 * @date 2018/12/21 16:21
	 * @param $map
	 * @return mixed
	 */
	public function getClassList($map)
	{
		$result = $this->commonModel->where($map)->order('sort,id')->select();
		return $result;
	}
}