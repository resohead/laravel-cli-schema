<?php

namespace Resohead\LaravelCliSchema\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class SchemaTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schema:table {--name=} {--model=} {--list}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a list of tables and columns';

    protected $tables;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->tables = $this->getTables();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tableName = $this->getTableParameter();

        if($this->option('list') && empty($tableName)){
            $this->table(['table'],
                $this->tables->map(function($table){
                    return [$table];
                })
            );
            return 0;
        }
        $this->tables
            ->filter(function($table) use ($tableName){
                return $tableName ? $table === $tableName : true;
            })
            ->each(function($table){
                $columns = $this->getColumns($table)->map(function($column){
                        return [$column];
                    });
                $this->table([$table], $columns);
            });
        return 0;
    }

    protected function getTables()
    {
        return collect(Schema::getAllTables())
            ->map(function($table){
                return $table->tablename;
            })
            ->sort();
    }

    protected function getColumns(string $table)
    {
        return collect(Schema::getColumnListing($table));
    }

    protected function getTableParameter()
    {
        $name = $this->option('name');

        if($name === ''){
            return $this->anticipate('Select a table', $this->tables->toArray());
        }
        return $name ?? $this->getModelParameter();
    }

    protected function getModelParameter()
    {
        $model = $this->option('model');
       return empty($model) ? null : $this->getModelTable($model);
    }

    protected function getModelTable($model)
    {
        if(class_exists($model)){
            return with(new $model)->getTable();
        }
        $this->error("Unable to find a table for ${model}");
        return $model;
    }
}
