### MyZoneTickets

* git clone
* compose install
* config .env with DB connection and app URL
* php artisan serve
* To run tests:
  * vendor/bin/phpunit --filter 'Tests\\Feature\\ApartamentTest' For single file
  * or: php artisan test --testsuit=Feature to run all