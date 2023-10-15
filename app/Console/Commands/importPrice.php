<?php

namespace App\Console\Commands;

use App\Stock\Repositories\CompanyRepository;
use App\Stock\Services\ImportService;
use Illuminate\Console\Command;

class importPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:import:price 
                                {stock? : name of stock, leave blank to import all}
                                {--type=catchup : catchup or all}
                                {--top=100 : import number of stocks base on the top list }
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import daily price for a stock or all stocks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $symbol = $this->argument('symbol');
        $type = $this->option('type');
        $top = $this->option('top');

        $service = new ImportService(
            $this->app
        );
        if ($symbol == '') {
            // Import all
            $this->info('Importing price for top ' . $top . ' stocks');
            $service->importPrices($top, $type);
        } else {
            // Validate stock
            $this->info('Importing price for top ' . $top . ' stocks');
            $service->importPrice($symbol, $type);
        }
    }
}
