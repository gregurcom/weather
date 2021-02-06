# Weather App

## Description
**This application shows the weather in any city that interests you**

## Install application
1. Clone app ``git clone https://github.com/gregurcom/weather-app.git``
2. Install all dependence
``composer install``
   
## Testing application
Unit and Feature test

``php artisan test``

Browser Test
1. Set your APP_URL in env. file to:
   ``APP_URL=http://127.0.0.1:8000``
2. ``php artisan serve``
3. ``php artisan dusk``

