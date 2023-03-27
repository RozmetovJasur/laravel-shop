docker-up: memory
	docker-compose up -d

docker-down:
	docker-compose down

docker-build: memory
	docker-compose up --build -d

test:
	docker-compose exec php-cli vendor/bin/phpunit

memory:
	sudo sysctl -w vm.max_map_count=262144

perm:
	sudo chgrp -R www-data storage bootstrap/cache
	sudo chmod -R ug+rwx storage bootstrap/cache

# sudo docker exec -it laravel-db psql -U admin -p 5432 -W laravel
# sudo docker-compose exec laravel-app php artisan db:seed
