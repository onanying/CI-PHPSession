<?php

/**
 * codeigniter使用php原生session
 * @author 刘健 <59208859@qq.com>
 * 完全兼容codeigniter 3，本session类除了Flashdata/Tempdata外的其他都有按codeigniter的方法重写为原生
 */
class Nsession
{

    public function __construct()
    {
        session_start();
    }

    // 获取 Session 数据
    public function __get($name)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }

    // 获取 Session 数据 (为了和之前的版本兼容)
    public function userdata($name = null)
    {
        return is_null($name) ? $_SESSION : $_SESSION[$name];
    }

    // 添加 Session 数据
    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    // 添加 Session 数据 (为了和之前的版本兼容)
    public function set_userdata($args1, $args2 = null)
    {
        switch (func_num_args()) {
            case 1:
                foreach ($args1 as $key => $value) {
                    $this->__set($key, $value);
                }
                break;
            case 2:
                $this->__set($args1, $args2);
                break;
        }
    }

    // 检查某个 session 值是否存在
    public function has_userdata($name)
    {
        return isset($_SESSION[$name]);
    }

    // 删除 Session 数据
    public function unset_userdata($args1)
    {
        if (is_array($args1)) {
            foreach ($args1 as $name) {
                unset($_SESSION[$name]);
            }
        } else {
            unset($_SESSION[$args1]);
        }
    }

    // 销毁 Session
    public function sess_destroy()
    {
        session_destroy();
    }

}
