<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for task
 */
interface AppointmentDaoInterface
{
    /**
     * Show User
     * @return object
    */
    public function get() : object;

    /**
     * Store User
     * @return void
    */
    public function store(array $data) : object;

    /**
     * Return Specific User
     * @return object
    */
    public function edit($id) : object;

    /**
     * Update Workout
     * @return void
    */
    public function update($id , array $data) : void;

     /**
     * Destroy User
     * @return void 
    */
    public function destroy($id) : void;
}