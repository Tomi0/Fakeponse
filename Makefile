UID:=$(shell id -u)
GID:=$(shell id -g)

build:
	docker buildx build \
					--build-arg UID=$(UID) \
					--build-arg GID=$(GID) \
					-t fakeponse:latest .

start:
	docker compose up -d

logs:
	docker compose logs

stop:
	docker compose down

bash:
	docker compose exec -it -u $(UID):$(GID) fakeponse /bin/sh
