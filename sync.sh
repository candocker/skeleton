#!/bin/sh
# MySQL backup

files=(
.env.example
.gitignore
.gitlab-ci.yml
.php_cs
Dockerfile
Jenkinsfile
README.md
app/Controllers/AbstractController.php
app/Controllers/IndexController.php
app/Helpers/Function.php
app/Middleware/CorsMiddleware.php
app/Middleware/MerchantMiddleware.php
app/Middleware/PermissionMiddleware.php
app/Models/AbstractModel.php
app/Repositories/AbstractRepository.php
app/Requests/AbstractRequest.php
app/Resources/AbstractResource.php
app/Resources/AbstractCollection.php
app/RpcServer/AbstractRpcServer.php
app/Services/AbstractService.php
bin/hyperf.php
build.properties
build.xml
composer.json
config/.gitignore
config/autoload/aliyun_acm.php
config/autoload/amqp.php
config/autoload/annotations.php
config/autoload/aspects.php
config/autoload/async_queue.php
config/autoload/cache.php
config/autoload/commands.php
config/autoload/databases.php
config/autoload/dependencies.php
config/autoload/devtool.php
config/autoload/exceptions.php
config/autoload/jwt.php
config/autoload/listeners.php
config/autoload/logger.php
config/autoload/middlewares.php
config/autoload/opentracing.php
config/autoload/processes.php
config/autoload/redis.php
config/autoload/server.php
config/autoload/services.php
config/autoload/translation.php
config/config.php
config/container.php
config/routes.php
deploy.test.yml
migrations/.gitignore
phpstan.neon
phpunit.xml
seeders/.gitignore
storage/languages/en/validation.php
storage/languages/zh_CN/validation.php
test/Cases/ExampleTest.php
test/HttpTestCase.php
test/bootstrap.php
watch
)

sourcepath=$1
sourcepath=/data/htmlwww/docker/container/$1
echo ${sourcepath}

for file in ${files[*]}
do
  tfile=${file}
  `\cp -f ${sourcepath}/${file} ${tfile}`
done
