<?php

namespace Affect\MiniWebBundle\View;

class AjaxResult implements \JsonSerializable
{
    public $result = false;
    public $error;
    public $content;
    public $redirect;
    public $contentName;   //дополнительная метка какие данные вернулись с сервера
    public $message;       //дополнительное сообщение которое будет показано пользователю

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'result'   => $this->result,
            'error'    => $this->error,
            'content'  => $this->content,
            'redirect' => $this->redirect,
            'contentName' => $this->contentName,
            'message' => $this->message,
        ];
    }
}
