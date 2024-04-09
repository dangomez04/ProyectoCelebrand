<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = array(
        'id_user',
        'email',
        'rank',
        'verified',
        'register_process_ended',
        'apps'
    );

    public function load($where)
    {
        $result = curlRequest(ACCOUNTS_URL . 'api/getUser', [
            'where' => $where,
            'id_revi_app' => 5,
        ], "POST");

        if ($result !== NULL) {
            $this->fill((array)$result);
        }
    }

    public function checkAccess(): bool
    {
        $token = Auth::checkAccessCookie();
        if ($token) {
            $this->load(array('token' => $token));
            if ($this->verified && $this->register_process_ended) {
                return true;
            }
        }
        return false;
    }
}
