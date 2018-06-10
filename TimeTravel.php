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
     * @param DateTime $start
     * @param DateTime $end
     */
    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
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
        return $this->start->sub($interval)->format('Y-m-d H:i:s');
    }

    public function backToFutureStepByStep($step)
    {
        $result = [];
        $dateRange = new DatePeriod($this->start, $step, $this->end);
        foreach ($dateRange as $date) {
            $result[] = $date;
        }

        return $result;
    }
}