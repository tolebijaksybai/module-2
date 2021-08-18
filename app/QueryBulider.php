<?php
namespace App;

use Aura\SqlQuery\QueryFactory;
use PDO;
use \Delight\Auth\Auth;

class QueryBulider
{
    private $pdo;
    private $queryFactory;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=rabota', 'root', 'root');
        $this->queryFactory = new QueryFactory('mysql');
        $this->auth = new Auth($this->pdo);
    }

//    public function auth($email,$password)
//    {
//        try {
//            $this->auth->login($email, $password);
//
//            echo 'User is logged in';
//        }
//        catch (\Delight\Auth\InvalidEmailException $e) {
//            die('Wrong email address');
//        }
//        catch (\Delight\Auth\InvalidPasswordException $e) {
//            die('Wrong password');
//        }
//        catch (\Delight\Auth\EmailNotVerifiedException $e) {
//            die('Email not verified');
//        }
//        catch (\Delight\Auth\TooManyRequestsException $e) {
//            die('Too many requests');
//        }
//    }

    public function getOne($table,$id) {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*']);
        $select->from($table) ;
        $select->where('id = :id')->bindValue('id',$id);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());

        $results = $sth->fetch(PDO::FETCH_ASSOC);
        return $results;
    }


    public function getAll($table) {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*']);
        $select->from($table) ;

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());

        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function selectAll($get_page,$table) {
        $get_page = $_GET['page'];

        $select = $this->queryFactory->newSelect();

        $select->cols(['*'])
                ->from($table)
                ->setPaging(3)
                ->page($get_page ?? 1);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());

        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function insert($data,$table){
        $insert = $this->queryFactory->newInsert();

        $insert
            ->into($table)
            ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());

        $sth->execute($insert->getBindValues());
    }

    public function update($data, $id,$table)
    {
        $update = $this->queryFactory->newUpdate();

        $update
            ->table($table)
            ->cols($data)
            ->where('id = :id')
            ->bindValues([                  
                'id' => $id,
            ]);

        $sth = $this->pdo->prepare($update->getStatement());

        $sth->execute($update->getBindValues());
    }

    public function delete($id,$table)
    {
        $delete = $this->queryFactory->newDelete();

        $delete
            ->from($table)
            ->where('id = :id')
            ->bindValues([
                'id' => $id,
            ]);

        $sth = $this->pdo->prepare($delete->getStatement());

        $sth->execute($delete->getBindValues());
    }
}