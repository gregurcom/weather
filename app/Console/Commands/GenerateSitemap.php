<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

    public function handle(): void
    {
        Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/settings'))
            ->add(Url::create('/login'))
            ->add(Url::create('/register'))
            ->writeToFile(public_path('sitemap.xml'));
    }
}
