<?php

namespace App\Models\Appearance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppearanceSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value',
        'status',
    ];

    public static function has($key) {
        return static::where('key', $key)->exists();
    }

    public static function get($key, $default = null) {
        return static::where('key', $key)->first()->value ?? $default;
    }

    public static function set($key, $value) {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    public static function setMany($settings) {
        foreach ($settings as $key => $value) {
            self::set($key, $value);
        }
    }

    public static function getAppInfo() {
        return [
            'app_logo' => url(self::get('app_logo') ??''),
            'app_favicon' => url(self::get('app_favicon')??''),
            'app_footer_logo' => url(self::get('app_footer_logo')??''),
            'app_name' => self::get('app_name'),
            'app_email' => self::get('app_email'),
            'app_phone' => self::get('app_phone'),
            'app_location' => self::get('app_location'),
            'app_footer_text' => self::get('app_footer_text'),
        ];
    }

    public static function getSocialInfo() {
        return [
            'app_facebook' => self::get('app_facebook'),
            'app_google' => self::get('app_google'),
            'app_twitter' => self::get('app_twitter'),
            'app_linkedin' => self::get('app_linkedin'),
        ];
    }

}
