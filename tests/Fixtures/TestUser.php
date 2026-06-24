<?php

namespace JeffersonGoncalves\FilamentWebhooks\Tests\Fixtures;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TestUser extends Authenticatable
{
    protected $guarded = [];

    public $timestamps = false;
}
