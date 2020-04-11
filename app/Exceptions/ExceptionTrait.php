<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $exception)
    {
        if ($this->isModel($exception)) {
            return $this->modelResponse();
        }
        if ($this->isHttp($exception)) {
            return $this->httpResponse();
        }
        return parent::render($request, $exception);
    }

    protected function isModel($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }

    protected function isHttp($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }


    protected function modelResponse()
    {
        return response()->json([
                                    'message' => 'Record not found'
                                ]);
    }

    protected function httpResponse()
    {
        return response()->json(['message' => 'route not found']);
    }
}
