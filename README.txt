I can give 5 out of 10 to code quality.

Pros:
Using repository pattern with dependency injection.
Proper naming conventions are used.

Cons:
Repositories should not be implemented without interfaces.
Repositories are violating single responsibility principle.
Controller and repositorty length
The name of the controller is not much relevant to the tasks going on inside controller.
In many functions for examlple:distancefeed method. Code validation and logic inside them are really bad.
In many places try catch blocks are missing,and DB transactions while storing data in multiple tables.
Some methods dont have proper comments.
Return json response should be moved in BaseController to standardized response and reduce redundancy.
Logic in some places is not good as there is a lot of redundancy in code.So many if else conditions. 
Commented lines found in code.
Request validations are missing.
Many functions in repositories can further break into smaller specifc functions and can be reused
