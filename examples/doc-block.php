<?php
class Test
{   
    /**
     * A quick note about what it does
     * @param  App\User $user
     * @param  App\Appointment $apponitment
     * @return Array
     */
    public function example($user, $appointment)
    {
        return ['user_id' => $user->id];
    }
}