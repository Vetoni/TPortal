<?php

namespace backend\models\filter;

use DateTime;

/**
 * Class DateTimeFilter
 * @package backend\models
 */
trait DateTimeFilter
{
    /**
     * Applies date filter to the query.
     * @param $query \yii\db\Query
     * @param $field string
     * @param $date string
     */
    public function applyDateFilter(&$query, $field, $date)
    {
        $parsed = $this->parseDateTime($date);
        if (!is_object($parsed)) return;
        $start = $parsed->setTime(0, 0, 0)->format('Y-m-d H:i:s');
        $end = $parsed->setTime(23, 59, 59)->format('Y-m-d H:i:s');
        $query->andFilterWhere(['between', $field, $start, $end]);
    }

    /**
     * Parses date time from string and returns null if exception is thrown;
     * @param $format
     * @return DateTime|null
     */
    protected function parseDateTime($format)
    {
        if ($format == null) {
            return null;
        }
        try
        {
            return new DateTime($format);
        }
        catch(\Exception $e)
        {
            return null;
        }
    }
}