<?php

namespace Resohead\LaravelCliSchema\Tests;

use Orchestra\Testbench\TestCase;
use Resohead\LaravelCliSchema\LaravelCliSchemaServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelCliSchemaServiceProvider::class];
    }
}
