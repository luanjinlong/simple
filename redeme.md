### 框架运行流程

````
入口文件->定义常量->引入函数库->自动加载类
->启动框架->返回结果->加载控制器->路由解析
````

`RewriteRule ^(.*)$ index.php/$1  [QSA,PT,L]
`

当请求的 url 是 index.php  时候，去掉 index.php