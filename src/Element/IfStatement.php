<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

use DateTime;
use Exception;

/**
 * Class IfStatement
 *
 * Used to determine whether innerHTML is omitted from rendered output
 *
 * <if toggle="signed_in">
 * <p>Welcome Member</p>
 * </if>
 */
class IfStatement extends AbstractElement
{
    /**
     * Allow NOW to be define by constant for unit testing and debugging purposes
     *
     * @return string
     */
    public function now(): string
    {
        return defined('LHTML_DATETIME') ? LHTML_DATETIME : 'NOW';
    }

    /**
     * Renders output if condition toggle is true
     *
     * @return string
     * @throws Exception
     */
    public function onRender(): string
    {

        /*
         * To allow for modular conditions this section contains conditional checks based on optional arguments.
         * If optional arguments are passed, the check is ran and if any check fails an empty string is returned.
         */

        $pass = true;

        $time_start = $this->getArgByName('time_start');
        $time_end = $this->getArgByName('time_end');
        $date_start = $this->getArgByName('date_start');
        $date_end = $this->getArgByName('date_end');
        $day_of_week = $this->getArgByName('day_of_week');
        $datetime_start = $this->getArgByName('datetime_start');
        $datetime_end = $this->getArgByName('datetime_end');
        $else = $this->getArgByName('else');

        // allow a condition based on time_start and time_end
        if (($time_start !== null) && ($time_end !== null)) {
            if (!$this->isTimeNowBetween($time_start, $time_end)) {
                $pass = false;
            }
        }

        // allow a condition based on date_start and date_end
        if (($date_start !== null) && ($date_end !== null)) {
            if (!$this->isDateNowBetween($date_start, $date_end)) {
                $pass = false;
            }
        }

        // allow a condition based on day_of_week
        if ($day_of_week !== null) {
            if (!$this->isNowSameDayOfWeek($day_of_week)) {
                $pass = false;
            }
        }

        // allow a condition based on datetime
        if (($datetime_start !== null) && ($datetime_end !== null)) {
            if (!$this->isDatetimeNowBetween($datetime_start, $datetime_end)) {
                $pass = false;
            }
        }

        // TODO: FIGURE OUT
        // if condition based on variable
        // <arg name="parent.limit" operator="equals">5</arg>
        // <arg name="this.limit" operator="GREATER_THAN">5</arg>
        // <arg name="child.limit" operator="LESS_THAN">5</arg>
        // <arg name="child.limit" operator="NOT_EQUAL">5</arg>
        // <arg name="child.limit" operator="CONTAINS">5</arg>

        // all conditions pass return xml children
        if ($pass) {
            return $this->xml;
        }

        // return else xml child
        if ($else !== null) {
            return $else;
        }

        // return empty string
        return '';
    }

    /**
     * Check if now is between start and end time
     *
     * @param string $time_start
     * @param string $time_end
     * @return bool
     * @throws Exception
     */
    public function isTimeNowBetween(string $time_start, string $time_end)
    {

        // start
        $start = date_parse($time_start);
        $start_datetime = new DateTime($this->now());
        $start_datetime->setTime($start['hour'], $start['minute'], $start['second']);

        // now
        $now_datetime = new DateTime($this->now());

        // end
        $end = date_parse($time_end);
        $end_datetime = new DateTime($this->now());
        $end_datetime->setTime($end['hour'], $end['minute'], $end['second']);

        if ($start_datetime > $end_datetime) {
            $end_datetime->modify('+1 day');
        }

        return ($start_datetime <= $now_datetime && $now_datetime <= $end_datetime) ||
            ($start_datetime <= $now_datetime->modify('+1 day') && $now_datetime <= $end_datetime);
    }

    /**
     * Checks if date is between start and end date
     *
     * @param string $date_start
     * @param string $date_end
     * @return bool
     * @throws Exception
     */
    public function isDateNowBetween(string $date_start, string $date_end)
    {

        // start
        $start = date_parse($date_start);
        $start_datetime = new DateTime();
        $start_datetime->setDate($start['year'], $start['month'], $start['day']);
        $start_datetime->setTime(0, 0, 0);

        // now
        $now_datetime = new DateTime($this->now());

        // end
        $end = date_parse($date_end);
        $end_datetime = new DateTime();
        $end_datetime->setDate($end['year'], $end['month'], $end['day']);
        $end_datetime->setTime(23, 59, 59);

        // use next day if end time before start time
        if ($start_datetime->getTimestamp() > $end_datetime->getTimestamp()) {
            $end_datetime->modify('+ 1 day');
        }

        // if now between start and end return true
        if (($now_datetime->getTimestamp() > $start_datetime->getTimestamp()) &&
            ($now_datetime->getTimestamp() < $end_datetime->getTimestamp())) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks if NOW is between to start and end datetime
     *
     * @param string $date_start
     * @param string $date_end
     * @return bool
     * @throws Exception
     */
    public function isDatetimeNowBetween(string $date_start, string $date_end)
    {
        // start
        $start = date_parse($date_start);
        foreach ($start as $key => $value) {
            if (!empty($start[$key])) {
                continue;
            }

            switch ($key) {
                case 'hour':
                case 'minute':
                case 'second':
                case 'month':
                    $start[$key] = '0';
                    break;
                case 'day':
                    $start[$key] = 1;
                    break;
                // this year
                case 'year':
                    $start[$key] = date('Y');
                    break;
            }
        }
        $start_datetime = new DateTime();
        $start_datetime->setDate($start['year'], $start['month'], $start['day']);
        $start_datetime->setTime($start['hour'], $start['minute'], $start['second']);

        // now
        $now_datetime = new DateTime($this->now());

        // end
        $end = date_parse($date_end);
        foreach ($end as $key => $value) {
            if (is_numeric($end[$key])) {
                continue;
            }
            switch ($key) {
                // last hour possible
                case 'hour':
                    $end[$key] = '23';
                    break;
                case 'minute':
                case 'second':
                    $end[$key] = '59';
                    break;
                case 'month':
                    $end[$key] = '12';
                    break;
                case 'day':
                    $end[$key] = date('t');
                    break;
                case 'year':
                    $end[$key] = date('Y');
                    break;
            }
        }
        $end_datetime = new DateTime();
        $end_datetime->setDate($end['year'], $end['month'], $end['day']);
        $end_datetime->setTime($end['hour'], $end['minute'], $end['second']);

        if (($now_datetime->getTimestamp() > $start_datetime->getTimestamp()) &&
            ($now_datetime->getTimestamp() < $end_datetime->getTimestamp())) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks if NOW is the same day of week
     *
     * @param $day_of_week
     * @return bool
     */
    public function isNowSameDayOfWeek($day_of_week)
    {
        $now_day_of_week = date('l', strtotime($this->now()));

        // check for multiple days of week if provided
        if (is_array($day_of_week)) {
            foreach ($day_of_week as $value) {
                if ($now_day_of_week == date('l', strtotime($value))) {
                    return true;
                }
            }
            // check for one day of week if provided
        } elseif (is_string($day_of_week) && ($now_day_of_week == date('l', strtotime($day_of_week)))) {
            return true;
        }

        return false;
    }
}
