timestamp=$(date +%s)

run:
	docker-compose up -d
stop:
	docker-compose down
build:
	docker-compose build
rebuild:
	docker-compose build --no-cache
clean:
	docker-compose down --rmi all
bash:
	docker-compose up -d
	docker-compose exec main /bin/sh
bash-db:
	docker-compose up -d
	docker-compose exec db bash
