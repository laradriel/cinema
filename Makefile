help:
	@echo "Available commands:"
	@grep -E '^[a-zA-Z_-]+:.*?## ' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2}'

init:	 ## Initialize the project
	@echo "Initializing the project..."
	@composer install
	@npm install
	@if [ ! -f .env ]; then cp .env.example .env; fi
	@php artisan key:generate
	@echo "Project initialized successfully."
	@echo "Running migrations..."
	@php artisan migrate --fresh
	@echo "Migrations completed."

up:        ## Start Sail containers
	./vendor/bin/sail up -d

down:      ## Stop Sail containers
	./vendor/bin/sail down

restart:   ## Restart Sail containers
	./vendor/bin/sail down && ./vendor/bin/sail up -d --build

shell:     ## Open a shell in the app container
	./vendor/bin/sail bash

composer:  ## Run Composer via Sail
	./vendor/bin/sail composer install

npm:       ## Run npm via Sail
	./vendor/bin/sail npm install

dev:       ## Run npm dev via Sail
	./vendor/bin/sail npm run dev

test:      ## Run PHPUnit tests via Sail
	./vendor/bin/sail test

pint:      ## Run Pint via Sail
	./vendor/bin/sail pint

pint-check: ## Run Pint check via Sail
	./vendor/bin/sail pint --test

phpstan:   ## Run PHPStan via Sail
	./vendor/bin/sail phpstan analyse

migrate:  ## Run migrations via Sail
	./vendor/bin/sail artisan migrate

migrate-fresh:  ## Run fresh migrations via Sail
	./vendor/bin/sail artisan migrate:fresh
