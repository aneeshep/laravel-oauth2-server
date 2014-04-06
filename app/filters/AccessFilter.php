<?php 
class AccessFilter 
{

    /**
     * Run the oauth filter
     *
     * @param Route $route the route being called
     * @param Request $request the request object
     * @param string $scope additional filter arguments
     * @return Response|null a bad response in case the request is invalid
     */
    public function filter()
    {

		$ownerId = ResourceServer::getOwnerId();
		$user = Sentry::findUserById($ownerId);

        if (func_num_args() > 2) {
            $args = func_get_args();
            $permissions = array_slice($args, 2);

            foreach ($permissions as $perm) {
                if (! $user->hasAccess($perm)) {
                    return Response::json(array(
                        'status' => 403,
                        'error' => 'forbidden',
                        'error_message' => 'User does not have access to  '.$perm,
                    ), 403);
                }
            }
        }
    }
}