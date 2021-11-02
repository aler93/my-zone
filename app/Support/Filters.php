<?php

namespace App\Support;

class Filters
{
    public static function mask(string $val, string $mask): string
    {
        $maskared = "";
        $k        = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == "#") {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }

        return $maskared;
    }

    public static function onlyNumbers(string $val): string {
        return (string) preg_replace('/\D/', '', $val);
    }

    public static function truncateString(string $fullText, int $offset, bool $hint = true): string
    {
        $text = $fullText;
        $len = strlen($fullText);

        $text = trim(substr($text, 0, $offset), " ");

        $i = 0;
        if( $len > $offset ) {
            while( $fullText[strlen($text)] != " " ) {
                $text = substr($text, 0, strlen($text)-1);

                $i++;
                if( $i > 20 ) {
                    break;
                }
            }
        }

        $text .= ($len > 0 and $hint) ? "..." : "";

        return $text;
    }
}
