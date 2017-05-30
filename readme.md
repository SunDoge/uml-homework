# 运行说明书

## 运行环境
最佳运行环境为`lnpm`，windows下可用`wamp`。鉴于运行环境难以保证，提供在线版本

> [http://cinema.gayhub.cn/movie](http://cinema.gayhub.cn/movie)

服务器1m小水管，第一次加载可能较慢。

### 必要
- php >= 5.6
- mysql/postgresql/sqlite/sqlserver

### 可选
- composer
- apache/nginx
- nodejs
- npm

## 运行方法

**注意**：程序所在文件夹需要有执行权限（如linux下为755以上），否则会报错。

### 完整程序打包
修改`.env`文件中

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

数据库类型为`mysql | pgsql | sqlite | sqlsrv`其中一种。

设置好数据库名（需提前手动建好数据库）、用户名和密码。

然后执行
```bash
php artisan migrate
php artisan db:seed
```
完成数据表迁移和随机测试数据填充。成功后配置`apache/nignx`服务器或启动内置服务器

```
php artisan serve
```
后访问`localhost:8000`

### Git

```bash
git clone https://git.coding.net/SunDoge/cinema.git
cd cinema
composer install #安装依赖
cp .env.example .env #修改.env文件方法同上
npm install
npm run dev #编译js文件
```

后续访问方式同上。

