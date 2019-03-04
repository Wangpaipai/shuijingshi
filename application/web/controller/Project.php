<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/8
 * Time: 20:57
 */

namespace app\web\controller;


use app\common\Projects;
use think\Request;

class Project extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->assign('reuest_url','project/index');
    }

    /**
     * 在线课堂
     * created by:Mp_Lxj
     * @date:2019/1/8 21:02
     * @return mixed
     */
    public function index()
    {
        $param = Request::instance()->param();
        $this->assign('param',$param);
        $Projects = new Projects();
        $res = $Projects->project();
        $this->assign('project',$res);
        $this->assign('site_title','在线课程');
        return $this->fetch();
    }

    /**
     * 课程详情
     * Created by：Mp_Lxj
     * @date 2019/1/9 15:02
     * @return mixed
     */
    public function detail()
    {
        $param = Request::instance()->param();
        if(!$param['class']){
            $this->redirect('Index/index');
        }
        $Projects = new Projects();
        $res = $Projects->detail();
        $this->assign('detail',$res);
        $this->assign('site_title','课程详情');
        return $this->fetch();
    }

    /**
     * 收藏
     * Created by：Mp_Lxj
     * @date 2019/1/9 15:41
     * @return array|\Illuminate\Http\JsonResponse|void
     */
    public function collect()
    {
        $Projects = new Projects();
        return $Projects->collect();
    }

    /**
     * 取消收藏
     * Created by：Mp_Lxj
     * @date 2019/1/9 15:41
     * @return array|\Illuminate\Http\JsonResponse|void
     */
    public function delCollect()
    {
        $Projects = new Projects();
        return $Projects->delCollect();
    }
}