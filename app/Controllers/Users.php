<?php

namespace App\Controllers;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\ActiviteModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

use ReflectionException;
class Users extends BaseController
{
    public function index()
    {
        $model = new PostModel();

        return $this->getResponse(
            [
                'message' => 'Post retrieved successfully',
                'post' => $model->findAll()
            ]
        );
    }
    
    public function store()
    {
        // $rules = [
        //     'image' => 'required',
        //     'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[client.email]',
        //     'retainer_fee' => 'required|max_length[255]'
        // ];

        $input = $this->getRequestInput($this->request);

        // echo json_encode($input);
        $g_title = $input['g_title'];

        $model = new PostModel();
        $model->save($input);
        

        $post = $model->where('g_title', $g_title)->first();
       
       $input['g_id'] = $post['g_id'];

        //  $model->activity($input);

        // $model->PostRequest();

        return $this->getResponse(
            [
                'message' => 'service  added successfully',
                'game' => $post
                
            ]
        );
    }
    public function show($id)
    {
        
        try {

            $model = new PostModel();
            $post = $model->findPostById($id);
            
            return $this->getResponse(
                [
                    'message' => 'Post retrieved successfully',
                    'client' => $post
                ]
            );

        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'message' => 'Could not find client for specified ID'
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
    public function update($id)
    {
        try {

            $model = new PostModel();
            $model->findPostById($id);

          $input = $this->getRequestInput($this->request);
        //   echo "<pre>"; print_r($input);
        //   echo "</pre>";
          

            $model->update1($id ,$input);
        //         echo "<pre>"; print_r($input);
        //   echo "</pre>";
            $post = $model->findPostById($id);

            return $this->getResponse(
                [
                    'message' => 'Client updated successfully',
                    'client' => $post
                ]
            );

        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
    public function post_like($id)
    {
        try {

            $model = new PostModel();
            $predata = $model->findPostById($id);

          $input = $this->getRequestInput($this->request);
        //   echo "<pre>"; print_r($predata['liked']);
        //   echo "</pre>";
        //   die;
          if ($input['like'] == '1') {
            $data['liked'] = $predata['liked']+1;
          }else if ($input['like'] == '0') {
            $data['liked'] = $predata['liked']-1;
          }
            $model->updatelike($id ,$data);
        //         echo "<pre>"; print_r($input);
        //   echo "</pre>";
            $post = $model->findPostById($id);

            return $this->getResponse(
                [
                    'message' => 'post like updated successfully',
                    'post' => $post
                ]
            );

        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
    public function get_drafts()
    {
        try {
            $published = 0;
            
            $model = new PostModel();
            $post = $model->get_drafts($published);
            

            return $this->getResponse(
                [
                    'message' => 'Post Drafts get successfully',
                    'Drafts' => $post
                ]
            );

        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
    public function get_activites()
    {
        try {
            
            $model = new ActiviteModel();
            
            return $this->getResponse(
                [
                    'message' => 'Activites get successfully',
                    'Activites' => $model->findAll()
                ]
            );

        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
    public function g_published($id)
    {
        try {

            $model = new PostModel();
            $model->findPostById($id);

          $input = $this->getRequestInput($this->request);
   

            $model->updatepub($id ,$input);
        //         echo "<pre>"; print_r($input);
        //   echo "</pre>";
            $post = $model->findPostById($id);

            return $this->getResponse(
                [
                    'message' => 'Post Published successfully',
                    'client' => $post
                ]
            );

        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
    public function user_update($id)
    {
        try {

            $model = new UserModel();
            

          $input = $this->getRequestInput($this->request);
   
        //   echo "<pre>"; print_r($input);
        //   echo "</pre>";
        //   die;
            $model->update1($id ,$input);
              
            $post = $model->findUserById($id);

            return $this->getResponse(
                [
                    'message' => 'user updaetd successfully',
                    'client' => $post
                ]
            );

        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
    public function adminuser_update($id)
    {
        try {

            $model = new UserModel();
            

          $input = $this->getRequestInput($this->request);
   
        //   echo "<pre>"; print_r($input);
        //   echo "</pre>";
        //   die;
            $model->admin_update($id ,$input);
              
            $post = $model->findUserById($id);

            return $this->getResponse(
                [
                    'message' => 'user updaetd successfully',
                    'client' => $post
                ]
            );

        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
    public function destroy($id)
    {
        try {

            $model = new PostModel();
            $post = $model->findPostById($id);

            // echo "<pre>"; print_r($post);
            // echo "</pre>";

            $model->deletedata($id);
            // $model->delete($id);

            // echo "<pre>"; print_r($post);
            // echo "</pre>";
            return $this
                ->getResponse(
                    [
                        'message' => 'Post deleted successfully',
                    ]
                );

        } catch (Exception $exception) {                    
            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

}
