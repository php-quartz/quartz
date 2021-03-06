<?php
namespace Quartz;

use Quartz\Calendar\CronCalendar;
use Quartz\Calendar\DailyCalendar;
use Quartz\Calendar\HolidayCalendar;
use Quartz\Calendar\MonthlyCalendar;
use Quartz\Calendar\WeeklyCalendar;
use Quartz\Core\Key;
use Quartz\Core\SchedulerException;
use Quartz\JobDetail\JobDetail;
use Quartz\Triggers\CalendarIntervalTrigger;
use Quartz\Triggers\CronTrigger;
use Quartz\Triggers\DailyTimeIntervalTrigger;
use Quartz\Triggers\SimpleTrigger;

class ModelClassFactory
{
    /**
     * @throws SchedulerException
     */
    public static function getClass(array $values): string
    {
        if (false == isset($values['instance'])) {
            throw new SchedulerException('Values has no "instance" field');
        }

        switch ($values['instance']) {
            // triggers
            case SimpleTrigger::INSTANCE:
                return SimpleTrigger::class;
            case CronTrigger::INSTANCE:
                return CronTrigger::class;
            case CalendarIntervalTrigger::INSTANCE:
                return CalendarIntervalTrigger::class;
            case DailyTimeIntervalTrigger::INSTANCE:
                return DailyTimeIntervalTrigger::class;
            // job
            case JobDetail::INSTANCE:
                return JobDetail::class;
            // calendars
            case HolidayCalendar::INSTANCE:
                return HolidayCalendar::class;
            case WeeklyCalendar::INSTANCE:
                return WeeklyCalendar::class;
            case MonthlyCalendar::INSTANCE:
                return MonthlyCalendar::class;
            case CronCalendar::INSTANCE:
                return CronCalendar::class;
            case DailyCalendar::INSTANCE:
                return DailyCalendar::class;
            // key
            case Key::INSTANCE:
                return Key::class;
            default:
                throw new SchedulerException(sprintf('Unknown values instance: "%s"', $values['instance']));
        }
    }
}
