<?php


namespace App\Services;


class DateCheck
{
    public function isValid($strDate, $strFormat="d/m/Y", $str_timezone = FALSE): bool
    {
        $date = \DateTime::createFromFormat($strFormat, $strDate);

        if($date && (int)$date->format('Y') < 1900)
        {
            return false;
        }
        //return true
        return $date && \DateTime::getLastErrors()["warning_count"] == 0 && \DateTime::getLastErrors()["error_count"] == 0;
    }
}
