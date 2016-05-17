<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 16.05.2016
 * Time: 15:03
 */

namespace app\my;

use yii\web\ResponseFormatterInterface;

class CsvResponseFormatter implements ResponseFormatterInterface
{
    public function format($response)
    {
        $response->getHeaders()->set('Content-Type', 'text/html; charset=UTF-8');
        $flag = true;
        $title = "";
        if ($response->data !== null) {
            foreach($response->data as $item)
            {
                foreach($item as $key => $value)
                {
                    if ($flag) $title .= $key.";";
                    $response->content .= $value.";";
                }
                $flag = false;
                $response->content .= "\n";
            }
            $response->content = $title."\n".$response->content;
        }
    }
}
