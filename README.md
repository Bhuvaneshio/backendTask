# backendTask

Hi, This repository is filled with task 2 files
This has two folders with required php files, with a css file for styling

Now for the task, Let me discuss the features in my files :
 BASIC TASKS :
	As asked, I have added a login and sign-up page..
	 The login page is case-sensitive, it requires a username and password
	 The signup page has a form which requires First and Last name, email and a username (which is not of other user's) and a password
    * I have also included the password hashing so that even the database dont save the password as it is, instead it hashes the password which only the server knows to de-hash *

	The login page always prints the current user or previous user, if the user comes to the home page.  

	After logging in, the user is able to view a dashboard with four options..
	 ADD - The user is required to fill the form and add it to their expenses list
	 VIEW - The user is able to view their expenses which they add through add tab and/or the amounts which other user settle with them
	 DELETE - The user can delete the unwanted expenses from their list with the help of the id of the expenses, if only the id exists the expense gets deleted
	
	Also, the user is able to give certain title for each expense and should give a descriptive comment about each expense.

 ADVANCED TASKS :
	After logging in, the user is able to view a dashboard with four options, the fourth of which is..
	 SETTLE - The user is now able to settle their dealing with other user, obviously if the current user enters a valid username and enters the amount, the same amount adds as an expense to the current user and the same amount gets deducted from total expense for other user.

	Now the User is able to sort the view table according to their wish (user has to select the column name and order in which sorting should happen before they can view)

* Further changes gets added here * 
	