<?php declare (strict_types = 1);
namespace Driade\Sleepery\Tests;

use Driade\Sleepery\Sleepery;
use PHPUnit\Framework\TestCase;

class SleeperyTest extends TestCase
{
    /** @test */
    public function itDreamsSeconds()
    {
        $time = time();

        Sleepery::fake();

        Sleepery::dream(1);
        Sleepery::dream(2);
        Sleepery::dream(3);

        $this->assertTrue(time() - $time < 1);

        Sleepery::assertDreamt(1);
        Sleepery::assertDreamt(2);
        Sleepery::assertDreamt(3);
        $this->assertSame([1, 2, 3], Sleepery::getDreams());

        Sleepery::wakeup();

        $time = time();

        Sleepery::dream(2);

        $this->assertTrue(time() - $time >= 1);
    }

    /** @test */
    public function itDreamsMicroSeconds()
    {
        $time = time();

        Sleepery::fake();

        Sleepery::nap(1000000);
        Sleepery::nap(2000000);
        Sleepery::nap(3000000);

        $this->assertTrue(time() - $time < 1);

        Sleepery::assertNapped(1000000);
        Sleepery::assertNapped(2000000);
        Sleepery::assertNapped(3000000);
        $this->assertSame([1000000, 2000000, 3000000], Sleepery::getNaps());

        Sleepery::wakeup();

        $time = time();

        Sleepery::nap(1000000);

        $this->assertTrue(time() - $time >= 1);
    }
}
