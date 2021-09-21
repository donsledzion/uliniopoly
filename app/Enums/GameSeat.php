<?php

namespace App\Enums;

use http\Exception\InvalidArgumentException;
use function PHPUnit\Framework\throwException;

class GameSeat
{
    const SEAT_1 = 1;
    const SEAT_2 = 2;
    const SEAT_3 = 3;
    const SEAT_4 = 4;

    const SEATS = [
        self::SEAT_1,
        self::SEAT_2,
        self::SEAT_3,
        self::SEAT_4,
    ];

    public static function seat($seat){
        if($seat===1){
            return self::SEAT_1;
        }
        if($seat===2){
            return self::SEAT_2;
        }
        if($seat===3){
            return self::SEAT_3;
        }
        if($seat===4){
            return self::SEAT_4;
        } else {
            error_log("Huj dupa kamieni kupa");
        }
    }
}
