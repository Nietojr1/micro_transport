<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataresponse extends Model
{
    use HasFactory;
    protected $table = 'data_response';
    protected $primaryKey = 'id';
    protected $hidden = ['updated_at','created_at'];

    public static function response($messageId, $data) {
        $response = new DataResponse;
        $response->ip_applicant = $_SERVER['REMOTE_ADDR'];

        switch ($messageId) {
            case 1:
                $response->status = 200;
                break;
            case 2:
                $response->status = 204;
                $data = null;
                break;
            default:
                $response->status = 400;
                break;
        }

        $response->message_id = $messageId;
        $response->data = $data;

        return DataResponse::serveToUser($response);
    }

    public static function serveToUser($response)
    {
        $dataMessages = [
            ['code' => 1, 'name' => 'the query was successful.'],
            ['code' => 2, 'name' => 'The query was successful, but the given data didnt relationated with a record in the database.'],
            ['code' => 3, 'name' => 'the query wasnt successful, the given parameters arent corrects.'],
            ['code' => 4, 'name' => 'The query wasnt successful because the given data violate Bussiness rules.'],
        ];

        $message = null;

        foreach ($dataMessages as $dataMessage) {
            if ($dataMessage['code'] == $response->message_id) {
                $message = $dataMessage['name'];
                break;
            }
        }

        $response->message = $message;

    }

}
