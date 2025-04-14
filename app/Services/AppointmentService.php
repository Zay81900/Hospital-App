<?php

namespace App\Services;

use App\Contracts\Dao\AppointmentDaoInterface;
use App\Contracts\Services\AppointmentServiceInterface;

class AppointmentService implements AppointmentServiceInterface
{
    /**
     * user Dao
     */
    private $appointmentDao;

    /**
     * Class Constructor
     * @param appointmentDaoInterface
     * @return void
     */
    public function __construct(AppointmentDaoInterface $appointmentDao)
    {
        $this->appointmentDao = $appointmentDao;
    }

    /**
     * Show User
     * @return object
    */
    public function get() : object
    {
        return $this->appointmentDao->get();
    }

    /**
     * Store User
     * @return void
    */
    public function store() : void
    {
        $this->appointmentDao->store();
    }

    /**
     * Return Specific User
     * @return object
    */
    public function edit($id) : object
    {
        return $this->appointmentDao->edit($id);
    }

    /**
     * Update Workout
     * @return void
    */
    public function update($id , array $data) : void
    {
        $this->appointmentDao->update($id , $data);
    }

     /**
     * Destroy User
     * @return void 
    */
    public function destroy($id) : void
    {
        $this->appointmentDao->destroy($id);
    }

}