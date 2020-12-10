#Setup automatically docker compose variables
include .env
-include .env.local

DOCKER=docker-compose
DOCKER_EXEC= ${DOCKER} exec
SF_CONSOLE := ${DOCKER_EXEC} php bin/console

setup: .env.local docker-compose.yaml

.env.local:
	@touch .env.local

docker-compose.yaml: docker-compose.yaml.dist
	@cp docker-compose.yaml.dist docker-compose.yaml
	@sed -i "s/<DOCKER_USER_ID>/$(shell $(shell echo id -u ${USER}))/g" $@
	@sed -i "s/<DOCKER_USER>/$(shell echo ${USER})/g" $@
	@sed -i 's/<REMOTE_HOST>/$(shell hostname -I | grep -Eo "192\.168\.[0-9]{,2}\.[0-9]+" | head -1)/g' $@

reup:
	docker-compose down --remove-orphan
	docker-compose up -d
	docker ps

start_working: vendor
	sleep 10
	make create_db
	make load_fixtures

vendor: up
	@$(DOCKER_EXEC) php composer install

up: down
	@$(DOCKER) up -d

down:
	@$(DOCKER) down --remove-orphan

create_db:
	$(SF_CONSOLE) doctrine:database:drop --force --if-exists --env=$(APP_ENV)
	$(SF_CONSOLE) doctrine:database:create --env=$(APP_ENV)
	$(SF_CONSOLE) doctrine:schema:drop --env=dev
	$(SF_CONSOLE) doctrine:schema:update --env=dev --force

load_fixtures:
	$(SF_CONSOLE) hautelook:fixtures:load --purge-with-truncate --no-interaction --env=dev --no-bundles

mysql.connect.workouts-reference:
	@$(DOCKER_EXEC) mysql-workouts-reference /bin/bash -c 'mysql -u$$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
