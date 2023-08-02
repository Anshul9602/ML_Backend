<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;
use \Datetime;
class UserModel extends Model
{
    protected $table = 'user_log';
   
    protected $allowedFields = [
        'user_name',
        'pin',
    ];
    protected $updatedField = 'updated_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array
    {
    
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    protected function beforeUpdate(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    private function getUpdatedDataWithHashedPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $plaintextPassword = $data['data']['password'];
            $data['data']['password'] = $this->hashPassword($plaintextPassword);
        }
        return $data;
    }

    private function hashPassword(string $plaintextPassword): string
    {
        return password_hash($plaintextPassword, PASSWORD_BCRYPT);
    }                         
    public function findUserByUserNumber(string $user_number)
    {
        $user = $this
            ->asArray()
            ->where(['user_number' => $user_number])
            ->first();

        if (!$user) 
            throw new Exception('User does not exist for specified user number');

        return $user;
    }
    public function findUserById(string $id)
    {
        $user = $this
            ->asArray()
            ->where(['user_id' => $id])
            ->first();

        if (!$user) 
            throw new Exception('User does not exist for specified user id');

        return $user;
    }
    
    public function save($data): bool
    {
        
    $user_number = $data['user_number'];
    $pin = $data['pin'];
    $status = "1";
    
    $user_name = $data['user_name'];
    $date = new DateTime();
    $date = date_default_timezone_set('Asia/Kolkata');

    $date = date("m/d/Y h:i A");
    $sql = "INSERT INTO `user_log` (`user_id`, `user_number`,`user_name`, `pin`,`status`,`date`) 
    VALUES (NULL, '$user_number','$user_name', '$pin','$status','$date')";
        $post = $this->db->query($sql);
        // echo json_encode($post);
    if (!$post) 
        throw new Exception('Post does not exist for specified id');

    return $post;

       
    }
    public function save1($data)
    {
        // echo json_encode($data);
    $user_name = $data['user_name'];
    $user_number = $data['user_number'];
    $pin = $data['pin'];
    $date = new DateTime();
    $date = date_default_timezone_set('Asia/Kolkata');

    $date = date("m/d/Y h:i A");
    $sql = "INSERT INTO `admin` (`user_id`, `user_name`, `user_number`,`pin`,`date`) VALUES (NULL, '$user_name','$user_number', '$pin','$date')";
    // echo json_encode($sql);
    $post = $this->db->query($sql);
      
    if (!$post) 
        throw new Exception('user not add ');

    return $post;

       
    }
    public function admin_update($id ,$data): bool
    {

      // echo $id;

        if (empty($data)) {
            echo "1";
            return true;
        }

        $pin = $data['pin'];
       
        $sql = "UPDATE `admin` SET  
        pin = '$pin',
          WHERE user_id = $id";
        // echo "<pre>"; print_r($sql);
        // echo "</pre>";
        $post = $this->db->query($sql);
    if (!$post) 
        throw new Exception('Post does not exist for specified id');

    return $post;

       
    }
    public function update1($id ,$data): bool
    {

      // echo $id;

        if (empty($data)) {
            echo "1";
            return true;
        }

        $user_name = $data['user_name'];
      
        $user_number = $data['user_number'];
        $status = $data['status'];
        $sql = "UPDATE `g_users` SET  
        user_name = '$user_name',
        
        user_number = '$user_number',
        status = '$status',
    
          WHERE user_id = $id";
        // echo "<pre>"; print_r($sql);
        // echo "</pre>";
        $post = $this->db->query($sql);
    if (!$post) 
        throw new Exception('Post does not exist for specified id');

    return $post;

       
    }
}
