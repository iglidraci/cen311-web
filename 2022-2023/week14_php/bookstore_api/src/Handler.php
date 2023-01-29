<?php

class Handler {
    public static function handleException($ex): void {
        http_response_code(500);
        echo json_encode([
            'code' => $ex->getCode(),
            'message' => $ex->getMessage(),
            'file' => $ex->getFile(),
            'line' => $ex->getLine()
        ]);
    }
}