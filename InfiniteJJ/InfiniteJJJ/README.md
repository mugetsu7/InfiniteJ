# InfiniteJ
Enhanced InfiniteJukebox Transition Detection Game called InfiniteJJJ
Credits and Copyright to Paul Lamere (original creator of [InfiniteJukebox])

## Problem
We want to investigate on how to judge the users on their ability to identify the occurrence of transitions of the song on Infinite Jukebox. 
We also want to implement different ways to improve the entertaining aspect of the game while documenting the records of the game for future researches purposes.

## Process 
InfiniteJJJ would let the user score more points when the user can either consecutively detect actual transition or detect the actual transition fast or both. Moreover, InfiniteJJJ would also take more points away from the user if the user either falsely detect the transition or miss the transition consecutively. Moreover, there would be also an option for the user to download their report for that session as well.   

## Dependencies
To use InfiniteJJJ, you will need:
- Your Echonest's API_KEY for policy file
- Your own directory for uploading song and update it in upload.php
- Update the link directing to your directory in index, upload, and loader file
- The song that you want to play the Transition Detection Game with (possibly uploading your own song)

The user can use the command below to download necessary file for the InfiniteJ to run independently:
```python
wget url . 
```

## Code Explanation
There are four more necessary variables listed below:
- flagD: boolean variable that force the user to only count the detected transition once
- bonusN: counter that counts the transitions that the user missed or falsely detected consecutively
- bonusP: counter that counts the actual transitions that the user detected consecutively 
- continuityN: boolean variable that checked if the user missed or falsely detected a transition in previous move
- continuityN: boolean variable that checked if the user accurately detected a transition in previous move
- totalS: total score of the user that starts with 20 points that is updated everytime the three main variables (false_positiveT, detected_transition, and false_negativeT) get updated.

As mentioned previously, the faster the user can detect the transition, the more points the user get. For every time in the row the user accurately detect a transition, the point of that specific would multiply with the number of consecutive detected transition. 
```python
if(flag)
{
	if(flagD)
	{	
		bonusN = 0;
		if(continuity)
		{
			bonusP++;
		}
		else
		{
			continuity = true;
			bonusP++;
		}
		detected_transition++;
		totalS += (5 - beats_since_branch) * bonusP;
		flagD = false;
	}
	flagN = false;	
}
```
In case of consecutively falsely detecting the transition, it is similar to the previous case but there are higher chances for the user to falsely detect than accurately detect a transition so I came up with this condition:

```python
if(bonusN >= 4)
{		
	totalS -= (bonusN - 2)*(bonusN - 1);
}
else
{
	totalS--;
}
```
It was difficult to figure out how to document the record of the user in that one session to a text file and output a downloadable version of it. 
Inside the html code block of [InfiniteJukebox], I create a text area but not displaying it so the user cannot mess with it. I also create a "Create File" button to output the text area into a downloadable report text file.  
```html
<input type="text" id="mytext" style = "display: none"> 
<button id="create">Create file</button> <a download="info.txt" id="downloadlink" style="display: none">Download</a>
```
Inside the javascript code block of [InfiniteJukebox], I create the variable called elem that has the control over the text area so I can updated just like using console.log to log all the records inside the text area which will be converted into a text file when the user click on the "Create File" button
```python
var elem = document.getElementById("mytext");
```
[Input Field]: http://stackoverflow.com/questions/7609130/set-the-value-of-a-input-field-with-javascript
[InfiniteJukebox]: http://labs.echonest.com/Uploader/index.html

