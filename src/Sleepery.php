<?php declare (strict_types = 1);
namespace Driade\Sleepery;

final class Sleepery
{
    /** @var int[] */
    private static $dreams = [];
    /** @var int[] */
    private static $naps = [];
    /** @var bool */
    private static $dreaming = false;

    /** @return void */
    public static function fake()
    {
        self::$dreams   = [];
        self::$naps     = [];
        self::$dreaming = true;
    }

    /** @return void */
    public static function wakeup()
    {
        self::$dreaming = false;
    }

    /** @return void */
    public static function dream(int $seconds)
    {
        if ( ! self::$dreaming) {
            sleep($seconds);
            return;
        }
        self::$dreams[] = $seconds;
    }

    /** @return void */
    public static function nap(int $micro_seconds)
    {
        if ( ! self::$dreaming) {
            usleep($micro_seconds);
            return;
        }
        self::$naps[] = $micro_seconds;
    }

    /** @return void */
    public static function assertDreamt(int $seconds)
    {
        if ( ! in_array($seconds, self::$dreams, true)) {
            throw new \Exception("Invalid dream " . $seconds);
        }
    }

    /** @return void */
    public static function assertNapped(int $micro_seconds)
    {
        if ( ! in_array($micro_seconds, self::$naps, true)) {
            throw new \Exception("Invalid nap " . $micro_seconds);
        }
    }

    /** @return void */
    public static function assertNeverDreamt()
    {
        if (self::$dreams !== []) {
            throw new \Exception("I had a dream");
        }
    }

    /** @return void */
    public static function assertNeverNapped()
    {
        if (self::$naps !== []) {
            throw new \Exception("I had a nap");
        }
    }

    public static function isDreaming(): bool
    {
        return self::$dreaming;
    }

    /** @return int[] */
    public static function getDreams(): array
    {
        return self::$dreams;
    }

    /** @return int[] */
    public static function getNaps(): array
    {
        return self::$naps;
    }
}
