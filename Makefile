down:
	docker-compose down --remove-orphans

up: copy-config docker-compose-up composer-install migration-app

down-force:
	docker-compose down --remove-orphans -v

composer-install:
	docker-compose exec app composer install

docker-compose-up:
	docker-compose up -d --build

docker-exec-app:
	docker-compose exec app bash

docker-exec-nginx:
	docker-compose exec nginx bash

migration-app:
	docker-compose exec app php bin/console doctrine:migrations:migrate -n

migration-diff:
	docker-compose exec app bin/console doctrine:migrations:diff

migration-prev:
	docker-compose exec app bin/console doctrine:migrations:migrate prev


copy-config:
	./build/init-copy-config.sh

