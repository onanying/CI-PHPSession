## 简介

CodeIgniter 的 session 类因为无法做到关闭浏览器session就失效，对于开发后台管理有安全隐患；如果强行配置$config['sess_expiration'] = 0;  则会导致服务器session文件不会被清理的问题，既然PHP原生的session本来就很好用，在不改变项目代码的情况下，所以我按CodeIgniter session类的方法重写了一个使用原生php session的类，可无缝切换。

### 使用 Session 类

和CodeIgniter的session类的方法一模一样，只是载入的类由session变为nsession，[官方文档](http://codeigniter.org.cn/user_guide/libraries/sessions.html)。

#### 初始化 Session 类

```
$this->load->library('nsession');
```

#### 获取 Session 数据

```php
// 获取单个键值
$_SESSION['item']
// or
$this->nsession->item
// or
$this->nsession->userdata('item');
```

```php
// 获取所有键值
$_SESSION
// or
$this->nsession->userdata();
```

#### 添加 Session 数据

```php
// 添加多个值
$newdata = array(
    'username'  => 'johndoe',
    'email'     => 'johndoe@some-site.com',
    'logged_in' => TRUE
);
$this->nsession->set_userdata($newdata);
// 添加一个值
$this->nsession->set_userdata('some_name', 'some_value');
```

#### 检查某个 session 值是否存在

```php
isset($_SESSION['some_name'])
// or
$this->nsession->has_userdata('some_name');
```

#### 删除 Session 数据


```php
unset($_SESSION['some_name']);
// or
$this->nsession->unset_userdata('some_name');
// or
$array_items = array('username', 'email');
$this->nsession->unset_userdata($array_items);
```

#### 销毁 Session

```php
session_destroy();
// or
$this->nsession->sess_destroy();
```