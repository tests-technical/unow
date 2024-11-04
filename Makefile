up:
	docker compose up -d --build

down:
	docker compose down

bash:
	docker exec -it wordpress bash

clean:
	rm -rf db_data
	rm -rf wp_data

update:
	cp -R plugins/ wp_data/wp-content/plugins/
	cp -R themes/ wp_data/wp-content/themes/