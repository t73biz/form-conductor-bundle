Form Conductor Usecase
=======================

As a developer, I want to have a service available that allows me to easily integrate
my formstack account with a symfony2 application. The api calls via HTTP Requests
should be exposed so that using the service is easily used. There should be at
most one configuration requirement for this service, the key token provided
by formstack. Each api endpoint should be mapped to a usable function in
the service. The service should handle all of the header creation via
Guzzle and provide a response back to the service for consumption.

---

##Installation

The installation of the service bundle should be a simplified process that is done
through the use of composer and be easy to complete. Often packages will not be
used due to complex setup procedures, lack of documentation for the package.

---

##Configuration

The configuration should be stored and handled within the parameters.yml.dist file.
This will allow the easy distribution of the application codebase for developers
and allow for portability. Documentation should be provided for this portion.

