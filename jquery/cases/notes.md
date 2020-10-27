**c2** 
the form serialize() method helps to get the key-value pairs, which is nice.
it seems that on the server side, it lost all of the keys during the transmission.
Anyway, this is a clssical experiment.

**c3**
c3.html submit form data to the server-side, then server side appends some data and sends back.
the format of the data has been in transition of JS string, PHP object, JS object.

**c4**
c4.html tests getJson function, server side sleep for 4 seconds and sends the information.
the info won't appear until 4 seconds

**positionList.html ~ serverFeedback.php**
dynamically adjusted input boxes in client side and form submission to db side
then server side sends feedback 

**dbUpdate.php**
submit multi-rows in one transaction to db
