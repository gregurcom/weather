<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'weather-app');

// Project repository
set('repository', 'git@github.com:gregurcom/weather-app.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('167.71.56.72')
    ->stage('production')
    ->user('root')
    ->identityFile('~/.ssh/id_rsa')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->set('deploy_path', '/var/www/{{application}}');

// Tasks

task('npm:vendors', function () {
    run('cd {{release_path}} && npm install');
    run('cd {{release_path}} && npm run prod');
});

after('deploy:vendors', 'npm:vendors');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
