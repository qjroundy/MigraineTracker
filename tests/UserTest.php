<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserTest extends TestCase
{
	use DatabaseTransactions;

    /**
    * Test register link from homepage
    */
    public function testLinkFromHome()
    {
    	$this->visit('/')
			 ->click('New User')
			 ->seePageIs('/register');
    }

    /**
    * Create a test user with correct information
    */
    public function testNewUserRegistrationSuccess()
    {
    	$this->visit('/register')
			 ->type('Test', 'name')
			 ->type('email@test.com', 'email')
			 ->type('password', 'password')
			 ->type('password', 'password_confirmation')
			 ->press('Create Account')
			 ->seePageIs('/'); // redirected to homepage
    }

    /**
    * Create a test user with incorrect information
    */
    public function testNewUserRegistrationFailure()
    {
    	$this->visit('/register')
			 ->type('Test', 'name')
			 ->type('email@test.com', 'email')
			 ->type('password', 'password')
			 ->type('password2', 'password_confirmation')
			 ->press('Create Account')
			 ->seePageIs('/register'); //redirected to register page
    }
}