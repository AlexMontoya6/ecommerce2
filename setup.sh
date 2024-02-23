git clone https://github.com/AlexMontoya6/ecommerce.git
docker-compose up -d nginx mysql workspace phpmyadmin
docker-compose exec --user=laradock workspace bash
cp .env.example .env
composer update
art storage:link
art migrate --seed
