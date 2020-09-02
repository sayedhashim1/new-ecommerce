<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use translatable;

    protected $with=['translations'];
    protected $translatedAttributes=['value'];
    protected $fillable=['key','is_translatable','plain_value'];

    protected $casts=[

            'is_translatable'=>"boolean"
        ];


     /**
      * @param  array $settings;
      * @return void;
    */
     public static function setMany($settings){
         foreach ($settings as $key=>$value){

             self::set($key,$value);
         }
     }


    /**
     * @param  string $value;
     * @param mixed $key;
     * @return void;
     */

          public static function set($key,$value){

              if($key === "translatable")
              {
                  return static::setTranSetting($value);
              }

              if(is_array($value))
              {
                  $value=json_encode($value);
              }
              static::updateOrCreate(['key'=>$key],['plain_value'=>$value]);
          }
    /**
     * @param  string $settings;
     * @return void;
     */
           public static function setTranSetting($settings=[])
           {
               foreach ($settings as $key=>$value)
               {
                   static::updateOrCreate(['key'=>$key],
                   [
                       'is_translatable'=>true,
                       'value'=>$value,
                   ]);
               }
           }
}

