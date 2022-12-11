<?php

namespace Libs\Database;

use PDOException;

class UsersTable {
    private $db;

    public function __construct(MySQL $db) 
    {
        $this->db = $db->connect();
    }

    public function getAll() {
        try {
            $result = $this->db->query("SELECT users.*, roles.name AS role, roles.value 
            FROM users LEFT JOIN roles 
            ON users.role_id = roles.id
            ");

            return $result->fetchAll();

        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function insert($data) 
    {

        $data['password'] = password_hash($data['password'],
        PASSWORD_DEFAULT);

        try {
            $statement = $this->db->prepare("
            INSERT INTO users(name,email,phone,address,password, created_at) VALUES (:name, :email, :phone, :address, :password, NOW())");

            $statement->execute($data);
            return $this->db->lastInsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function findByEmailAndPassword($email, $password)
    {
        try {
            $statement = $this->db->prepare("
            SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE users.email = :email 
            ");

            $statement->execute([":email" => $email ]);
            $user = $statement->fetch();
            if($user) {
                if(password_verify($password,
                $user->password)) {
                    return $user;
                }

                return false; //incorrect password
            }

            return false; //incorrect email
            
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function updatePhoto ($id, $name)
    {
        $statement = $this->db->prepare("UPDATE users SET photo=:name WHERE id = :id");
        $statement->execute([':name' => $name, 'id' => $id]);

        return $statement->rowCount();
    }

    public function suspend($id)
    {
        $statement = $this->db->prepare("
            UPDATE users SET suspended=1 WHERE id = :id
        ");

        $statement->execute([':id' => $id]);

        return $statement->rowCount();
    }

    public function unsuspend($id)
    {
        $statement = $this->db->prepare("
            UPDATE users SET suspended=0 WHERE id = :id
    ");
        $statement->execute([ ':id' => $id ]);
        return $statement->rowCount();
    }

    public function changeRole($id, $role)
    {
        $statement = $this->db->prepare("
            UPDATE users SET role_id = :role WHERE id = :id
        ");

        $statement->execute([':id' =>$id, ':role' => $role]);

        return $statement->rowCount();
    }

    public function delete($id)
    {
        $statement = $this->db->prepare("
            DELETE FROM users WHERE id = :id
    ");

        $statement->execute([ ':id' => $id ]);
        
        return $statement->rowCount();
    }
}