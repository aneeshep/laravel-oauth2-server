<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		//validate the input
		/*
		 * To be done
		 * Create a Custom Validate helper. Dont make the controller complex
		*/

		try
		{
		    // Create the user
		    $user = Sentry::createUser($input);

		    // Find the group using the group id
		    $adminGroup = Sentry::findGroupByName('admin');

		    // Assign the group to the user
		    $user->addGroup($adminGroup);

		    return Response::json(array(
                'status' => 200,
                'error' => '',
                'message' => 'Signup Success',
            ), 200);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    //echo 'Login field is required.';
		    return Response::json(array(
                'status' => 400,
                'error' => 'MissingRequiredQueryParameter',
                'error_message' => $e->getMessage(),
            ), 400);
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    //echo 'Password field is required.';
		    return Response::json(array(
                'status' => 400,
                'error' => 'MissingRequiredQueryParameter',
                'error_message' => $e->getMessage(),
            ), 400);
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    //echo 'User with this login already exists.';
		    return Response::json(array(
                'status' => 409,
                'error' => 'AccountAlreadyExists',
                'error_message' => $e->getMessage(),
            ), 409);
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    //echo 'Group was not found.';
		    return Response::json(array(
                'status' => 404,
                'error' => 'ResourceNotFound',
                'error_message' => $e->getMessage(),
            ), 404);
		}

		catch(Illuminate\Database\QueryException $e)
		{
			//print_r($e->getCode());

			if($e->getCode() == 23000)
			{
				return Response::json(array(
	                'status' => 409,
	                'error' => 'AccountAlreadyExists',
	                'error_message' => 'Username/Email already exists',
	            ), 409);
			}
			else {

				return Response::json(array(
	                'status' => 500,
	                'error' => 'InternalServerError',
	                'error_message' => 'Oops!. Something went Wrong',
	            ), 500);
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}