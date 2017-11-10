Services are what handle much of the heavy lifting in the application.

Services should be small classes that are responsible for one job. As a general rule, if you were to state the purpose of the class, and you had to use a conjunction (and, but, or, etc.), odds are the class is doing too much.

Let's say a customer created a new appointment, and we passed the request object from the controller to the StoreCustomerAppointment service. 

We might need to: 
- Store the appointment
- send a notification email to the system admin 
- send out a confirmation text to the customer

```php
    namespace App\Http\Services;

    use Auth;
    use App\Appointment;
    use Illuminate\Http\Request;

    class StoreCustomerAppointment
    {   
        private $request;

        public function (Request $request)
        {
            $this->request = $request;
        }

        public function createNewAppointment()
        {
            $appointment = Appointment::create($this->request->input());

            if ($this->userAllowsTextMessages()) {
                (new SendConfirmationText($appointment))->send();
            }

            (new SendConfirmationEmail($appointment))->send();
        }

        private function userAllowsTextMessages()
        {
            if (Auth::user()->allows_texts) {
                return true;
            }
            return false;
        }
    }
    
``` 
