<?php

namespace App\Console\Commands;

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
        $stock = $this->argument('stock');
        $type = $this->option('type');
        $top = $this->option('top');

        if ($stock == '') {
            // Import all
            $this->info('Importing price for top ' . $top . ' stocks');
            $stocks = companyRepository->getTopStocks($top);
            foreach ($stocks as $stock) {
                $this->info('Import stock: '. $stock->Symbol);
                ImportService::import($stock->Symbol, $type);
            }
        } else {
            // Validate stock
            
        }
    }
}
