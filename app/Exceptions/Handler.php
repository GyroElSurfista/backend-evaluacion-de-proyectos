<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Recurso no encontrado',
                'message' => 'El recurso solicitado no existe en la base de datos.',
            ], 404);
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'error' => 'Datos de validación incorrectos',
                'message' => 'La validación de los datos proporcionados ha fallado.',
                'errors' => $exception->errors(),
            ], 422);
        }

        if ($exception instanceof QueryException) {
            return response()->json([
                'error' => 'Error de consulta en la base de datos',
                'message' => 'Hubo un problema al intentar obtener los datos de la base de datos:' . $exception->getMessage(),
            ], 500);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'Página no encontrada',
                'message' => 'La ruta solicitada no existe.',
            ], 404);
        }

        return parent::render($request, $exception);
    }
}
