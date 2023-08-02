<?php

namespace App\Controllers;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\ActiviteModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

use ReflectionException;
class Cart extends BaseController
{
    public function index()
    {
        $model = new CartModel();

        return $this->getResponse(
            [
                'message' => 'Post retrieved successfully',
                'post' => $model->findAll()
            ]
        );
    }
    
    public function store()
    {
        $input = $this->getRequestInput($this->request);
        $model = new CartModel();
        // echo json_encode($input);
        $user_id = $input['user_id'];
        if ( $model->findWById1($user_id)) {
            $total_am1 =$model->where('user_id', $user_id)->first();
            if($input['t_type'] == 0){
            $total_am = $total_am1['total_amount'] - $input['$total_am'];
            $model->update_am($user_id ,$total_am);
           }else if($input['t_type'] == 1){
            $total_am = $total_am1['total_amount'] + $input['$total_am'];
            $model->update_am($user_id ,$total_am);
           }
          }else {
            $model->save($input);
          }
       
        
        

        $post = $model->where('user_id', $user_id)->first();
       
       $input['w_id'] = $post['wallet_id'];

        $model->activity($input);

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
       // user_id pass
        try {

            $model = new CartModel();
            $post = $model->findWById($id);
            
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
    public function t_all($id)
    {
        $model = new CartModel();
        $post = $model->findWById($id);
        $w_id = $post['wallet_id'];
        try {

            $model1 = new TransactionModel();

            $post = $model1->findTById($w_id);
            
            return $this->getResponse(
                [
                    'message' => 'Transaction retrieved successfully',
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

            $model = new CartModel();
            $model->findWById($id);

          $input = $this->getRequestInput($this->request);
        //   echo "<pre>"; print_r($input);
        //   echo "</pre>";
          

            $model->update1($id ,$input);
        //         echo "<pre>"; print_r($input);
        //   echo "</pre>";
            $post = $model->findWById($id);

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

            $model = new CartModel();
            $predata = $model->findWById($id);

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
            $post = $model->findWById($id);

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
            
            $model = new CartModel();
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

            $model = new CartModel();
            $model->findWById($id);

          $input = $this->getRequestInput($this->request);
   

            $model->updatepub($id ,$input);
        //         echo "<pre>"; print_r($input);
        //   echo "</pre>";
            $post = $model->findWById($id);

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

            $model = new CartModel();
            $post = $model->findWById($id);

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
