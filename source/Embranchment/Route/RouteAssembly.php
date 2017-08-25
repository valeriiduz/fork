<?php

namespace Embranchment\Route;

trait RouteAssembly {

    # Create object Controller (depending on the request)
    #
    public static function Controller($Class) {

	# Convert custom class(controller) name
	# to class(controller) namespace
	#
	$Controller = sprintf('\\Controllers\\%s',$Class);

	# Return object controller
	#
	return new $Controller();
    }

    # Call methods of an existing controller object
    #
    public static function Method($Controller, $Method) {

	try {

	    # Generate Token
	    #
	    session_start();
	    $_SESSION['Token'] = hash('sha512',rand());
	    
	    # Call custom method
	    #
	    $Return = $Controller->$Method();
	    
	    if ($Return == null){

		# If method not returned nothing
		# create exception
		#
		throw new \Exception('Controller undefined returned');
	    }

	} catch (\Exception $Info) {

	    # Insert exception info in
	    # fork exception template
	    #
	    \Embranchment\Exception\ForkException::ExceptionView($Info);
	}
    }
}
