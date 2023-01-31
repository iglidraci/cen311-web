<?php

class BookController {
    public function __construct(private BookManager $manager) {

    }

    public function handleRequest($method, $id): void
    {
        if ($id) {
            // process a single resource
            // /books/1 [GET, PATCH, DELETE]
            $this->handleSingleResource($method, $id);
        } else {
            // process a collection
            // /books [GET => return all the books]
            // /books [POST => create a new book in the db]
            $this->handleCollection($method);
        }
    }

    private function handleSingleResource($method, $id): void
    {
        $book = $this->manager->get($id);
        if(!$book) {
            http_response_code(404);
            echo json_encode(['msg' => 'Book not found']);
            return;
        }
        switch ($method) {
            case 'GET':
                echo json_encode($book);
                break;
            case 'PATCH':
                $json = file_get_contents("php://input");
                $data = json_decode($json, true) ?? [];
                $errors = $this->cleanData($data, false);
                if(count($errors) > 0){
                    http_response_code(422); // 422 Unprocessable Entity
                    echo json_encode(['errors' => $errors]);
                    break;
                }
                $rows_effected = $this->manager->update($book, $data);
                echo json_encode([
                    'msg' => "Book $id updated",
                    'rows_effected' => $rows_effected
                ]);
                break;
            case 'DELETE':
                $this->manager->delete($id);
                http_response_code(204); // 204 No Content
                break;
            default:
                http_response_code(405);
                header('Allow: GET, PATCH, DELETE'); // 405 Method Not Allowed
                break;
        }
    }

    private function handleCollection($method): void
    {
        switch($method) {
            case 'GET':
                echo json_encode($this->manager->fetchAll());
                break;
            case 'POST':
                $json = file_get_contents("php://input");
                $request_data = json_decode($json, true) ?? array();
                $errors = $this->cleanData($request_data);
                if(count($errors) > 0) {
                    http_response_code(422);
                    echo json_encode(['errors' => $errors]);
                    break;
                }
                $id = $this->manager->create($request_data);
                http_response_code(201);
                echo json_encode(['msg' => 'Book created', 'id' => $id]);
                break;
            default:
                http_response_code(405);
                header('Allow: GET, POST');
        }
    }

    private function cleanData($data, $create=true): array {
        /** 
         * Clean your data inside this function
         * $data will be the assoc array containing book's data
         * $create will be a boolean value indicating whether we are
         * validating POST or PATCH method
         * If it's patch, fields are not required but if they exist they should be validated
         * Here I'm skipping through them
         */
        $errors = array();
        if($create && !isset($data['title'])) {
            $errors['title'] = 'Title is required';
        }

        if ($create && !isset($data['isbn'])) {
            $errors['isbn'] = 'Isbn is required';
        }

        // check for the rest

        return $errors;
    }
}