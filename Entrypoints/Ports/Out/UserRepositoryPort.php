<?php

interface UserRepositoryPort {
    public function save(UserModel $user);
    public function findAll();
    public function findById($id);
    public function update(UserModel $user);
    public function delete($id);
}