This is a demo app written in PHP to demonstrate how to read and
respond to USSD requests. This demo app requires PHP 5.2.0 or later.
Here is the expected workflow of the app:

Begin at STEP 1.

STEP 1:
-------
Display the following menu and wait for a response:  
	Welcome to Freebie Service.  
	1. Free Food
	2. Free Drink
	3. Free Airtime
If the user selects option 1, goto STEP 2
If the user selects option 2, goto STEP 4
If the user selects option 3, goto STEP 6
If the selection is none of the above, goto STEP 9

STEP 2:
-------
Display the following menu and wait for a response:
	Are you sure you want free food?
	1. Yes
	2. No
If the user selects option 1, goto STEP 3
If the user selects option 2, goto STEP 8
If the selection is none of the above, goto STEP 9

STEP 3:
-------
Display the following message and release the session:
	Thank you. You will receive your free food shortly.

STEP 4:
-------
Display the following menu and wait for a response:
	Are you sure you want free drink?
	1. Yes
	2. No
If the user selects option 1, goto STEP 5
If the user selects option 2, goto STEP 8
If the selection is none of the above, goto STEP 9

STEP 5:
-------
Display the following message and release the session:
	Thank you. You will receive your free drink shortly.

STEP 6:
-------
Display the following menu and wait for a response:
	Are you sure you want free airtime?
	1. Yes
	2. No
If the user selects option 1, goto STEP 7
If the user selects option 2, goto STEP 8
If the selection is none of the above, goto STEP 9

STEP 7:
-------
Display the following message and release the session:
	Thank you. You will receive your free airtime shortly.

STEP 8:
-------
Display the following message and release the session:
	Order cancelled.

STEP 9:
-------
Display the following message and release the session:
	Invalid selection.
