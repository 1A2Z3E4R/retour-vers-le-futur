<?php
/**
 * Created by PhpStorm.
 * User: wilder6
 * Date: 04/06/18
 * Time: 17:46
 */

class TimeTravel extends DateTime
{
    /**
     * @var
     */
    private $start;

    /**
     * @var
     */
    private $end;

    /**
     * TimeTravel constructor.
     * @param $time
     */
    public function __construct($time)
    {
        parent::__construct($time);
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start): void
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end): void
    {
        $this->end = $end;
    }

    /**
     * @param $start
     * @param $end
     * @return string
     */
    public function getTravelInfo($start, $end)
    {
        $diff = $start->diff($end);
        return "Il y a " .$diff->format('%y années %m mois %d jours %h heures %i minutes %s secondes') . " entre les deux dates";
    }

    public function findDate($interval)
    {
        return $this->sub($interval)->format('Y-m-d H:i:s');
    }

    public function backToFutureStepByStep($step)
    {
        $dateRange = new DatePeriod($this->getStart(), $step, $this->getEnd());
        foreach ($dateRange as $date) {
            return $date->format('Y-m-d H:i:s') . '<br/>';
        }
    }
}