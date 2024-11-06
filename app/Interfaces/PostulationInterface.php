<?php

namespace App\Interfaces;

interface PostulationInterface
{
    public function index($offre_id);
    public function show($id);
    public function store(array $data);
    public function update(array $data, $id);
    public function delete($id);
}