# CodeIgniter-PHPSession
CodeIgniter 的 session 类因为无法做到关闭浏览器session就失效，对于开发后台管理有安全隐患；如果强行配置$config['sess_expiration'] = 0;  则会导致服务器session文件不会被清理的问题，既然PHP原生的session本来就很好用，在不改变项目代码的情况下，所以我按CodeIgniter session类的方法重写了一个使用原生php session的类，可无缝切换。
