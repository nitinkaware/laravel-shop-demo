<?php

namespace Tests\Browser;

use Illuminate\Support\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase {

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        Browser::$baseUrl = 'http://hdfcamc.t4tracker.com/';

        $this->browse(function (Browser $browser) {
            $browser->visit('/login.php');
            $browser->pause(1000)
                ->type('login', 'shantanu')
                ->type('password', 'test123')
                ->click('#btn_login')
                ->assertPathIs('//time.php');
        });


        for ($i = 01; $i <= 21; $i ++) {

            if ($this->isHoliday($i) || $this->isOnLeave($i)) {
                continue;
            }

            $loginIn = random_int(15, 29);
            $this->browse(function (Browser $browser) use ($loginIn, $i) {
                $browser->visit("/attendance.php?date=07/{$i}/2018");
                $browser->pause(1000)
                    ->type('att_time', "9:{$loginIn} AM")
                    ->type('body', '.')
                    ->press('Submit')
                    ->screenshot('login')
                    ->assertSee("9:{$loginIn} AM")
                    ->assertSee('Sign Out - Information');
            });


            $loginOut = random_int(1, 30);
            $this->browse(function (Browser $browser) use ($loginOut, $i) {
                $browser->visit("/attendance.php?date=07/{$i}/2018");
                $browser->pause(1000)
                    ->type('att_time', "8:{$loginOut} PM")
                    ->type('body', '.')
                    ->press('Submit')
                    ->screenshot('logout');
            });
        }
    }

    private function isHoliday($i)
    {
        /** @var Carbon $date */
        $date = parse("$i July 2018");

        return $date->isSunday() || $date->isSaturday();
    }

    private function isOnLeave($i)
    {
        return false;
    }
}
