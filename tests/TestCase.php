<?php

namespace mergimuka\AHVValidator\Tests;

use mergimuka\AHVValidator\AHVValidatorServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
  }

  protected function getPackageProviders($app)
  {
    return [
      AHVValidatorServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
     // Setup default database to use sqlite :memory:
     $app['config']->set('database.default', 'testbench');
     $app['config']->set('database.connections.testbench', [
         'driver'   => 'sqlite',
         'database' => ':memory:',
         'prefix'   => '',
     ]);
  }
}