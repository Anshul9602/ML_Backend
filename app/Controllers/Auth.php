<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

use ReflectionException;

class Auth extends BaseController
{
    /**
     * Register a new user
     * @return Response
     * @throws ReflectionException
     */
    public function register()
    {


        // $rules = [
        //     'user_name' => 'required',
        //     'pin' => 'required|min_length[4]'
        // ];
      
       $input = $this->getRequestInput($this->request);
      
        $data =[
            'user_name' => $input['user_name'],
            'user_number' => $input['user_number'],
            'pin' => password_hash($input['pin'], PASSWORD_DEFAULT),
        ];
        echo json_encode($data);

        $userModel = new UserModel();  
        $userModel->save($data);

           return $this->getJWTForNewUser(
               $data['user_number'],
               ResponseInterface::HTTP_CREATED
           );
      
    }
    public function admin_register()
    {


        // $rules = [
        //     'user_name' => 'required',
        //     'pin' => 'required|min_length[4]'
        // ];
      
       $input = $this->getRequestInput($this->request);
      
        $data =[
            
            'user_name' => $input['user_name'],
            'user_number' => $input['user_number'],
            'pin' => password_hash($input['pin'], PASSWORD_DEFAULT),
        ];
        // echo json_encode($data);

        $userModel = new UserModel();  
        $userModel->save1($data);

           return $this->getJWTForNewUser(
               $data['user_number'],
               ResponseInterface::HTTP_CREATED
           );
      
    }
    /**
     * Authenticate Existing User
     * @return Response
     */
    public function login()
    {
      
        $rules = [

            'pin' => 'required|min_length[4]|max_length[4]|validateUser[user_number, pin]'
        ];

        $errors = [
            'pin' => [
                'validateUser' => 'Invalid login credentials provided'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        // echo json_encode($input);
        if($this->validateRequest($input, $rules, $errors)){
            // return $this->getResponse($input);
            return $this->getJWTForUser($input['user_number']);
        }else{
            return $errors;
        }
        
       
       
    }
    public function admin_login()
    {
      
        $rules = [
           
            'pin' => 'required|min_length[4]|max_length[4]|validateUser[user_number, pin]'
        ];

        $errors = [
            'pin' => [
                'validateUser' => 'Invalid login credentials provided'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        // echo json_encode($input);
        if($this->validateRequest1($input, $rules, $errors)){
            // return $this->getResponse($input);
            return $this->getJWTForUser($input['user_number']);
        }else{
            return $errors;
        }
        
       
       
    }

    private function getJWTForUser(
        string $user_Number,
        int $responseCode = ResponseInterface::HTTP_OK
    )
    {
        
        try {
            $model = new UserModel();
            $user = $model->findUserByUserNumber($user_Number);
            // echo json_encode($user);
            unset($user['pin']);

            helper('jwt');

            return $this
                ->getResponse(
                    [
                        'message' => 'User authenticated successfully',
                        'user' => $user,
                        'access_token' => getSignedJWTForUser($user_Number)
                    ]
                );
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => $exception->getMessage(),
                    ],
                    $responseCode
                );
        }
    }
    private function getJWTForNewUser(
        string $user_number,
        int $responseCode = ResponseInterface::HTTP_OK
    )
    {
        
        try {
            $model = new UserModel();
            $user = $model->findUserByUserNumber($user_number);
            echo json_encode($user);
            unset($user['pin']);

            helper('jwt');

            return $this
                ->getResponse(
                    [
                        'message' => 'User Created successfully',
                        
                        'access_token' => getSignedJWTForUser($user_number)
                    ]
                );
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => $exception->getMessage(),
                    ],
                    $responseCode
                );
        }
    }
}
