<?php

namespace App\Traits;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

trait ApiResponseHelper {

    public function setStatus($status) {
        $this->data['status'] = $status;
    }

    public function setMessage($message) {
        $this->data['message'] = $message;
    }

    public function setData($data) {
        $this->data['data'] = $data;
    }

}
