<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Cleanup extends Command {

        /**
         * The console command name.
         *
         * @var string
         */
        protected $name = 'pwshare:cleanup';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Command description.';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
        {
                parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function fire()
        {
		Onetime::where('valid_untill','<',date('Y-m-d H:i:s'))->delete();
        }

        /**
         * Get the console command arguments.
         *
         * @return array
         */
        protected function getArguments()
        {
                return array(
                );
        }

        /**
         * Get the console command options.
         *
         * @return array
         */
        protected function getOptions()
        {
                return array(
                );
        }

}
