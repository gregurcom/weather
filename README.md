# Weather App

![Home page](resources/images/homePage.png?raw=true)

**This application shows the weather in any city that interests you**

## Install application
1. Clone app ``git clone https://github.com/gregurcom/weather-app.git``
2. Install all dependence

``composer install``
   
``npm install``

``npm run dev``
   
## Testing application
Unit and Feature test

``php artisan test``

Browser Test
1. Set your APP_URL in env. file to:
   ``APP_URL=http://127.0.0.1:8000``
2. ``php artisan serve``
3. ``php artisan dusk``

## Deploy application

1. Install deployer:
```bash
curl -LO https://deployer.org/deployer.phar
mv deployer.phar /usr/local/bin/dep
chmod +x /usr/local/bin/dep
```

2. Run deploy: `dep deploy production`
