<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
    	if($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
			if($e instanceof NotFoundHttpException || $e instanceof HttpResponseException || $e instanceof ModelNotFoundException || $e instanceof MethodNotAllowedHttpException) {
				return response()->json([
					'message' => 'Not Found'
				], 404, config('cors.headers'));
			} else if($e instanceof AccessDeniedException || $e instanceof AuthorizationException) {
				return response()->json([
					'message' => 'Unauthorized'
				], 401, config('cors.headers'));
			} else if($e instanceof ValidationException && $e->getResponse()) {
				return response()->json([
					'message' => 'Validation error',
					'fields' => $e->validator->errors()
				], 422, config('cors.headers'));
			}

			$fe = FlattenException::create($e);

			if(env('APP_DEBUG') == true) {
				$error = [
					'error' => $e->getMessage(),
					'file' => $e->getFile(),
					'line' => $e->getLine(),
				];
			} else {
				$error = [
					'error' => 'Something went wrong.'
				];
			}

			return response()->json($error, $fe->getStatusCode(), $fe->getHeaders());
		}

        return parent::render($request, $e);
    }
}
