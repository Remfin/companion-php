<?php

namespace Companion\Utils;

use Ramsey\Uuid\Uuid;

/**
 * There are some cases where a request-id must match
 * between several different endpoints, if you need a
 * static request id, use this class as: StaticRequestId()
 */
class ID
{
    /** @var string */
    private static $id = null;
    
    /**
     * Generate a request UUID
     */
    public static function uuid(): string
    {
        return strtoupper(Uuid::uuid4()->toString());
    }
    
    /**
     * Refresh the static UUID
     */
    public static function refresh()
    {
        self::$id = self::uuid();
    }
    
    /**
     * Get the current static request UUID
     */
    public static function get(): string
    {
        if (self::$id === null) {
            self::refresh();
        }
        
        return self::$id;
    }
}
