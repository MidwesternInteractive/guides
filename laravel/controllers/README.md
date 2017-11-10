Like a doorway at your house, controllers are merely the entry point into the system, all they do is deliver requests and return responses. They shouldn't handle much logic. You wouldn't invite your friends to your house, then eat dinner in the doorway. 

I mean you could, but it'd be weird, and people would start avoiding you.

You're only allowed to use the following methods inside of your controllers: 

- index
- create
- store
- show
- edit
- update
- destroy

When you're creating a route to a controller method, the action you want to perform should dictate which of the methods, listed above, you use.

If you're trying to use an existing controller, and the method you'd like to use is taken, it's time to make a new controller. You can never have to many controllers.

### Naming controllers
If it's a CRUD controller a general use name is acceptable (e.g. UsersController).

If you're making a controller for a specific purpose, like storing a customer appointment, use a name that specifies the purpose of the controller (e.g. StoreCustomerAppointmentController) 

### When to pass the request to a service / when to use a controller method

If you're simply returning data to a view, or performing a simple delete action use the controller method;

```php
    namespace App\Http\Controllers;

    use App\Orders;

    use App\Analytics;

    use App\TeamMembers;

    class UserController extends Controller
    {

        /*
         * Show a user's dashboard
         * @param App\User
         */
        public function index(User $user)
        {

            $dashboardInfo = [

                'orders' => Orders::where('customer_id', $user->id);

                'analytics' => Analytics::where('customer_id', $user->id);

                'teamMembers' => TeamMembers::where('team_id', $user->team_id);

            ];

            return view('users.dashboard', compact('dashboardInfo'));
        }
        
        /*
         * Delete a user
         * @param integer
         */
        public function destroy($id)
        {

            User::find($id)->destory();

        }
    }
    
```

If you need to do more than fetch some data and return a view, use a [service](https://github.com/MidwesternInteractive/guides/tree/master/laravel/services).

```php
    namespace App\Http\Controllers;
    
    use App\Services\StoreUser;

    class UserController extends Controller
    {

        /*
         * Store a user
         * @param Illuminate\Http\Request
         */
        public function store(Request $request)
        {

            (new StoreUser($request))->store();

            return redirect()->route('dashboard');
            
        }
    }
    
```

