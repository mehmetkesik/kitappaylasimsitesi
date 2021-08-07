<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    function getUser()
    {
        return $this->belongsTo('App\User', "user_id");
    }

    //kitabı talep eden kişinin bilgileri
    function getRequestor()
    {
        $request = $this->getRequest;
        if ($request == null) {
            return null;
        } else {
            return User::find($request->user_id);
        }
    }

    function getRequest()
    {
        return $this->hasOne('App\BookRequest');
    }

    public static function turkce_tarih($format, $datetime = 'now')
    {
        if ($datetime == null) {
            return "";
        }
        $z = date("$format", strtotime($datetime));
        $gun_dizi = array(
            'Monday' => 'Pazartesi',
            'Tuesday' => 'Salı',
            'Wednesday' => 'Çarşamba',
            'Thursday' => 'Perşembe',
            'Friday' => 'Cuma',
            'Saturday' => 'Cumartesi',
            'Sunday' => 'Pazar',
            'January' => 'Ocak',
            'February' => 'Şubat',
            'March' => 'Mart',
            'April' => 'Nisan',
            'May' => 'Mayıs',
            'June' => 'Haziran',
            'July' => 'Temmuz',
            'August' => 'Ağustos',
            'September' => 'Eylül',
            'October' => 'Ekim',
            'November' => 'Kasım',
            'December' => 'Aralık',
            'Mon' => 'Pts',
            'Tue' => 'Sal',
            'Wed' => 'Çar',
            'Thu' => 'Per',
            'Fri' => 'Cum',
            'Sat' => 'Cts',
            'Sun' => 'Paz',
            'Jan' => 'Oca',
            'Feb' => 'Şub',
            'Mar' => 'Mar',
            'Apr' => 'Nis',
            'Jun' => 'Haz',
            'Jul' => 'Tem',
            'Aug' => 'Ağu',
            'Sep' => 'Eyl',
            'Oct' => 'Eki',
            'Nov' => 'Kas',
            'Dec' => 'Ara',
        );
        foreach ($gun_dizi as $en => $tr) {
            $z = str_replace($en, $tr, $z);
        }
        if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
        return $z;
    }
}
