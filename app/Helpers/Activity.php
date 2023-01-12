<?php


namespace App\Helpers;

use Request;

use App\Models\Activity as LogActivityModel;


class Activity

{
    public static function add($subject, $result = 'info')
    {
        $log = [];

        $req = Request::collect();
        $req = $req->forget('_token');

        if ($req->get('password')) {
            $req = $req->replace(['password' => '********']);
        }

        if ($req->get('password_confirmation')) {
            $req = $req->replace(['password_confirmation' => '********']);
        }

        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['parametrs'] = $req->toJson(JSON_UNESCAPED_UNICODE);;;
        $log['ip'] = Request::ip();
        $log['result'] = $result;
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 0;
        $log['user_login'] = auth()->check() ? auth()->user()->login : null;
        LogActivityModel::create($log);
    }

    public static function logActivityLists()
    {
        return LogActivityModel::latest()->get();
    }
}
