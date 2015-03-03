# InfiniteJ
InfiniteJukebox version on student server.
Credits and Copyright to Paul Lamere (original creator of InfiniteJukebox)

## Problem
InfiniteJukebox sparks a lot of conversations and ideas in the field of Music Informatics. Therefore, I want to investigate on how to make Infinite Jukebox on student server so it become accessible to other users in the community to apply and alter it for their own research project.

## Process 
InfiniteJ put any uploaded song in the storage directory in student server while changing it's name then call Echonest for audio analysis request to output the visualization of beat similarity and a music box that play a song infinitely by comparing similar beats.  

## Dependencies:
To use InfiniteJ, you will need:
- Your Echonest's API_KEY for policy file
- Your own directory for uploading song and update it in upload.php
- Update the link directing to your directory in index, upload, and loader file

The user can use the command below to download necessary file for the InfiniteJ to run independently:
```python
wget url . 
```

## Code Explanation
Looking at the code for the InfiniteJukebox at the moment, the option of uploading the song would puts the song in the amazon web services and then call Echonest for the analysis of the song. However, we need to change the storing option to the local folder on the student server. 
For instance: 
```python
<form action="https://s3.amazonaws.com/static.echonest.com" method="post" enctype="multipart/form-data">
	<input id='f-key' type="hidden" name="AWSAccessKeyId" value="YOUR_AWS_ACCESS_KEY">
	<input type="hidden" name="success_action_redirect" value="http://labs.echonest.com/Uploader/index.html">
	<input id='f-policy' type="hidden" name="policy" value="YOUR_POLICY_DOCUMENT_BASE64_ENCODED">
	<input id='f-signature' type="hidden" name="signature" value="YOUR_CALCULATED_SIGNATURE"> 
```
The code makes a form to Amazon web services with AWSAccessKeyId and other variables that are not in my possession. Therefore, it would be updated with my own upload form in php to upload mp3 and storage space directing to my directory for mp3 file to:
```python
<form enctype="multipart/form-data" action="upload.php" method="POST">
	<input type="hidden" name="success_action_redirect" value= "http://student.cs.appstate.edu/~tuhq/infiniteJ/index.html">
```
Moreover, I updated the Echonest's API_KEY to my Echonest's API_KEY instead of abusing their API_Key. 
I called fetchSignature() as a first thing in init() function to fetch in the API_KEY before analyzeAudio get called so Echonest can look at the file. However, there was a problem initially with fetchSignature() fetching the signature slower due to one of the aspects of .getJSON so analyzeAudio ran before API_KEY got fetched to my API_KEY so I updated fetchSignature() function by using the function .ajax instead that force fetchSignature to fetch my API_KEY variable first before doing anything else.
Specifically:
```python
$.getJSON(url, {}, function(data) {
```
is updated to
```python
$.ajax({url:url , dataType:'json', async : false, data:{}, success:function(data)
```

Moreover, the directory is missing the javascript file Underscore. Therefore, I downloaded it from http://underscorejs.org/ and put it in my directory while call it in index.html
```python
<script src="underscore.js" type="text/javascript"></script>
```

