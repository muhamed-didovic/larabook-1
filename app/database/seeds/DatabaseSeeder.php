<?php

class DatabaseSeeder extends Seeder {

    /**
    * Tables to be truncated and seeded
    *
    * @var array $tables
    */
    private $tables = [
        'users',
        'statuses'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->truncateTables();
        $this->seedTables();
    }

    /**
    * Truncates all tables
    *
    * @param array $tables
    * @return void
    */
    private function truncateTables()
    {
        $env = app()->environment();
        $dbDriver = Config::get('database.default');


        $this->disableForeignKeyChecks($env, $dbDriver);

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        $this->enableForeignKeyChecks($env, $dbDriver);
    }

    /**
    * Seeds the tables
    *
    * @param string $table The lowercase table name
    * @return void
    */
    private function seedTables()
    {
        foreach ($this->tables as $table)
        {
            $this->call($this->snakeToCamel($table));
        }
    }

     /**
    * Converts snake_case to CamelCase
    *
    * @param string $table The lowercase table name
    * @return string
    */
    private function snakeToCamel($table)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $table))) . 'TableSeeder';
    }

    /**
    * Disable FK checks
    *
    * @param $env
    * @param $dbDriver
    * @return void
    */
    private function disableForeignKeyChecks($env, $dbDriver)
    {
        if($dbDriver == 'sqlite') return; //no FK checks for sqlite

        if($env == 'development') DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }


    /**
    * Enable FK checks
    *
    * @param $env
    * @param $dbDriver
    * @return void
    */
    private function enableForeignKeyChecks($env, $dbDriver)
    {
        if($dbDriver == 'sqlite') return; //no FK checks for sqlite

        if($env == 'development') DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
